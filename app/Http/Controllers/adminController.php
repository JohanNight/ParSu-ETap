<?php

namespace App\Http\Controllers;

use App\Models\Cc_Instruction;
use App\Models\Cc_Questions;
use App\Models\Cc_Options;
use App\Models\clientCategory;
use App\Models\clientCode;
use App\Models\offices;
use App\Models\service1;
use App\Models\service1_2;
use App\Models\service1_3;
use App\Models\User;
use App\Models\Who_avail;
use App\Models\Classification;
use App\Models\SurveyInstruction;
use App\Models\SurveyQuestion;
use App\Models\SurveyComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class adminController extends Controller
{
    //

    public function index()
    {
        if (View::exists('AdminSide.index')) {
            return view('AdminSide.index');
        } else {
            return abort(404);
        }
    }
    public function login()
    {
        if (View::exists('AdminSide.login')) {
            return view('AdminSide.login');
        } else {
            return abort(404);
        }
    }
    public function process(Request $request)
    {
        $validated = $request->validate(
            [
                'email' => ['required', 'email'],
                'password' => 'required'
            ]
        );
        if (Auth::attempt($validated)) {
            $user = Auth::user();
            $routeRedirect = $user->idOfficeOriginFK === 3 ? 'Admin' : 'index';
            $request->session()->regenerate();
            return redirect()->route($routeRedirect)->with('message', 'Welcome Admin');
        } else {
            return back()->withErrors(['email' => 'Login Failed'])->onlyInput('email');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Log Out Successfully');
    }

    public function register()
    {
        if (View::exists('AdminSide.register')) {
            $officeTypes = offices::all();
            return view('AdminSide.register', compact('officeTypes'));
        } else {
            return abort(404);
        }
    }
    public function storeUserData(Request $request)
    {
        $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();
        $validated = $request->validate(
            [
                'name' => ['required', 'min:4'],
                'email' => ['required', 'email', Rule::unique('users', 'email')],
                'offices' => ['required', Rule::in($validateOffices)],
                'password' => 'required|confirmed|min:6'
            ]
        );
        $Admindata = [
            'name' => $validated['name'],
            'idOfficeOriginFK' => $validated['offices'],
            'email' => $validated['email'],
            'password' => $validated['password'] = Hash::make($validated['password']),
        ];
        $user = User::create($Admindata);
        Auth::login($user);
    }
    public function addServicePage()
    {
        if (View::exists('AdminSide.addServiceFunction')) {
            $officeTypes = offices::all();
            $whoAvail = Who_avail::all();
            $classifications = Classification::all();
            return view('AdminSide.addServiceFunction', compact('officeTypes', 'whoAvail', 'classifications'));
        } else {
            return abort(404);
        }
    }
    public function storeService(Request $request)
    {
        //dd($request);
        // Retrieve the "requirements" array from the request
        $Requirements = $request->input('Rqr_Whr');

        // Retrieve the "table" array from the request
        $tables = $request->input('table');

        $this->validate($request, [
            'code_Title' => 'required|string|max:255',
            'service_Title' => 'required|string|max:255',
            'description_service' => 'required|string',
            'office_service' => 'required|string',
            'classification_service' => 'required|string',
            'transaction_type' => 'required|string',
            'who_avail' => 'required|string',
            'table_Rqr_Whr_data' => 'array', // Combined array of rqr_inpt and whr_inpt
            'table_data' => 'array',
        ]);



        $service1 = new Service1;
        $service1->code_Title = $request->code_Title;
        $service1->service_Title = $request->service_Title;
        $service1->description_service = $request->description_service;
        $service1->office_service = $request->office_service;
        $service1->classification_service = $request->classification_service;
        $service1->transaction_type = $request->transaction_type;
        $service1->who_avail = $request->who_avail;
        // Set other attributes as well
        $service1->save();

        if (isset($Requirements) && is_array($Requirements)) {
            foreach ($Requirements as $requirement) {
                // Create and associate checklist requirements
                $checklistRequirement = new Service1_2;
                $checklistRequirement->requirement_description = $requirement['checklist_of_requirement'];
                $checklistRequirement->where_to_secure = $requirement['where_to_secure'];
                $service1->checklistRequirements1()->save($checklistRequirement);
            }
        }

        if (isset($tables) && is_array($tables)) {
            foreach ($tables as $table) {
                // Create and associate checklist requirements
                $checklistRequirement = new service1_3;
                $checklistRequirement->client_steps = $table['client_steps'];
                $checklistRequirement->agency_action = $table['agency_action'];
                $checklistRequirement->fees_to_be_paid = $table['fees_to_paid'];
                $checklistRequirement->processing_time = $table['processing_time'];
                $checklistRequirement->person_responsible = $table['person_responsible'];
                $service1->checklistRequirements2()->save($checklistRequirement);
            }
        }


        // Other related data can be handled similarly

        return redirect()->route('AddService')->with('message', 'Service created successfully.');
    }



    public function showAccountPage()
    {
        $user = Auth::user();
        if (View::exists('AdminSide.accountFunction')) {
            return view('AdminSide.accountFunction', compact('user'));
        } else {
            return abort(404);
        }
    }
    // public function createThumbnail($path, $width, $height)
    // {
    //     $img = Image::make($path)->resize($width, $height, function ($constraint) {
    //         $constraint->aspectRatio();
    //     });
    //     $img->save($path);
    // }
    public function update(Request $request)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        $validated = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email'],
            'user_image' => ['nullable', 'image'],
            'bio' => ['nullable', 'min:1', 'max:255'],
        ]);

        // Check if 'user_image' exists in the request; if not, set it to the current user's image
        if (!$request->hasFile('user_image')) {
            $validated['user_image'] = $user->user_image;
        } else {
            // If a new image is uploaded, store it and delete the old image if it exists
            $imagePath = $request->file('user_image')->store('profile', 'public');
            $validated['user_image'] = $imagePath;

            if ($user->user_image) {
                Storage::disk('public')->delete($user->user_image);
            }
        }

        $user->fill([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'user_image' => $validated['user_image'],
            'bio' => $validated['bio']
        ]);

        $user->save();

        return back()->with('message', 'Saved Successfully');
    }

    public function storagePage()
    {
        if (View::exists('AdminSide.storageServiceFunction')) {
            $service = service1::all();
            return view('AdminSide.storageServiceFunction', ['services' => $service]);
        } else {
            return abort(404);
        }
    }
    public function editService($id)
    {
        // Retrieve the main service1 record
        $service1 = Service1::find($id);
        $checklistRequirements1 = $service1->checklistRequirements1;
        $checklistRequirements2 = $service1->checklistRequirements2;

        $officeTypes = offices::all();
        $whoAvail = Who_avail::all();
        $classifications = Classification::all();

        $service1 = Service1::with('checklistRequirements1', 'checklistRequirements2')->find($id);
        //dd($service1);
        if (!$service1) {
            return abort(404); // Handle the case when the record is not found.
        }

        return view('AdminSide.editService', compact('service1', 'officeTypes', 'whoAvail', 'classifications'));
    }
    public function saveEditService(Request $request, $serviceId)
    {
        //dd($request);
        // Validate the input
        $service = service1::findOrFail($serviceId);
        $this->validate($request, [
            'code_Title' => 'required|string|max:255',
            'service_Title' => 'required|string|max:255',
            'description_service' => 'required|string',
            'office_service' => 'required|string',
            'classification_service' => 'required|string',
            'transaction_type' => 'required|string',
            'who_avail' => 'required|string',
            'table_Rqr_Whr_data' => 'array', // Combined array of rqr_inpt and whr_inpt
            'table_data' => 'array',
        ]);

        // Update the service attributes based on user input
        $service->update([
            'code_Title' => $request->code_Title,
            'service_Title' => $request->service_Title,
            'description_service' => $request->description_service,
            'office_service' => $request->office_service,
            'classification_service' => $request->classification_service,
            'transaction_type' => $request->transaction_type,
            'who_avail' => $request->who_avail,
        ]);


        // Retrieve the "requirements" array from the request
        $Requirements = $request->input('Rqr_Whr');
        $existingRequirements = $service->checklistRequirements1;

        // Update existing requirements and add new ones as needed
        foreach ($Requirements as $index => $requirementData) {
            if (isset($existingRequirements[$index])) {
                // Update existing requirement
                $existingRequirement = $existingRequirements[$index];
                $existingRequirement->update([
                    'requirement_description' => $requirementData['checklist_of_requirement'],
                    'where_to_secure' => $requirementData['where_to_secure'],
                ]);
            } else {
                // Create and associate a new requirement
                $newRequirement = new Service1_2([
                    'requirement_description' => $requirementData['checklist_of_requirement'],
                    'where_to_secure' => $requirementData['where_to_secure'],
                ]);
                $service->checklistRequirements1()->save($newRequirement);
            }
        }

        // Retrieve the "table" array from the request
        $tables = $request->input('table');
        $existingTable = $service->checklistRequirements2;

        foreach ($tables as $index => $table) {
            if (isset($existingTable[$index])) {
                // Update existing requirement
                $existingRequirement = $existingTable[$index]; // Use a different variable name
                $existingRequirement->update([
                    'client_steps' => $table['client_steps'],
                    'agency_action' => $table['agency_action'],
                    'fees_to_be_paid' => $table['fees_to_paid'],
                    'processing_time' => $table['processing_time'],
                    'person_responsible' => $table['person_responsible'],
                ]);
            } else {
                // Create and associate a new requirement
                $newRequirement = new service1_3([
                    'client_steps' => $table['client_steps'],
                    'agency_action' => $table['agency_action'],
                    'fees_to_be_paid' => $table['fees_to_paid'],
                    'processing_time' => $table['processing_time'],
                    'person_responsible' => $table['person_responsible'],
                ]);
                $service->checklistRequirements2()->save($newRequirement);
            }
        }


        return redirect()->route('Storage')->with('message', 'Service updated successfully.');
    }

    public function draftPage()
    {
        if (View::exists('AdminSide.draftServiceFunction')) {
            return view('AdminSide.draftServiceFunction');
        } else {
            return abort(404);
        }
    }
    public function codeGeneratorPage()
    {
        if (View::exists('AdminSide.generateCodeFunction')) {
            return view('AdminSide.generateCodeFunction');
        } else {
            return abort(404);
        }
    }
    public function createCode(Request $request)
    {
        $validated = $request->validate([
            'client_name' => 'required'
        ]);
        $code = Str::random(6);
        clientCode::create([
            'name' => $validated['client_name'],
            'code' => $code
        ]);
        return response()->json(['code' => $code]);;
    }
    // public function reportPage()
    // {
    //     if (View::exists('AdminSide.reportFunction')) {
    //         return view('AdminSide.reportFunction');
    //     } else {
    //         return abort(404);
    //     }
    // }
    public function report()
    {
        if (View::exists('Report.serviceReport')) {
            return view('Report.serviceReport');
        } else {
            return abort(404);
        }
    }
    public function createQuestion()
    {
        if (View::exists('AdminSide.createQuestionnaireFunction')) {
            return view('AdminSide.createQuestionnaireFunction',);
        } else {
            return abort(404);
        }
    }
    public function saveQuestion(Request $request)
    {
        dd($request);

        $this->validate($request, [
            'instruction' => 'required|string',
            'cc_question' => 'array',
            'option' => 'array',
            'comment' => 'required|string',
        ]);
    }

    public function report2()
    {
        if (View::exists('AdminSide.reportFunction2')) {
            return view('AdminSide.reportFunction2');
        } else {
            return abort(404);
        }
    }







    //Super Administrator

    public function indexAdmin()
    {
        if (View::exists('SuperAdmin.index')) {
            return view('SuperAdmin.index');
        } else {
            return abort(404);
        }
    }
    public function reportAdmin()
    {
        if (View::exists('SuperAdmin.reportAdmin')) {
            return view('SuperAdmin.reportAdmin');
        } else {
            return abort(404);
        }
    }

    public function createCcQuestion()
    {
        if (View::exists('SetSurvey.citizenCharterSurvey')) {
            return view('SetSurvey.citizenCharterSurvey');
        } else {
            return abort(404);
        }
    }
    public function saveCcQuestion(Request $request)
    {
        //dd($request);
        // Validate the incoming data
        $request->validate([
            'instruction' => 'required',
            'cc_questions' => 'array',
        ]);

        // try {
        //     // Store the instruction
        //     $instruction = Cc_Instruction::create([
        //         'instruction' => $request->input('instruction'),
        //     ]);

        //     if ($request->has('cc_question') && is_array($request->input('cc_question'))) {
        //         foreach ($request->input('cc_question') as $index => $questionData) {
        //             // Ensure the array structure is as expected
        //             if (is_array($questionData) && array_key_exists(0, $questionData)) {
        //                 $description = $questionData[0]; // Assuming the description is at index 0
        //                 $question = Cc_Questions::create([
        //                     'description' => $description,
        //                     'table_cc_instruction_id' => $instruction->id,
        //                 ]);

        //                 // Check if "option" array exists and is not empty
        //                 if ($request->has('option') && is_array($request->input('option'))) {
        //                     foreach ($request->input('option') as $outerIndex => $outerOptions) {
        //                         foreach ($outerOptions as $innerIndex => $innerOptions) {
        //                             // Ensure $innerOptions is an array, and if it's not, set it as an empty array
        //                             if (!is_array($innerOptions)) {
        //                                 $innerOptions = [$innerOptions];
        //                             }

        //                             foreach ($innerOptions as $optionText) {
        //                                 // Create a new option related to the question
        //                                 Cc_Options::create([
        //                                     'option_text' => $optionText,
        //                                     'table_cc_question_id' => $question->id,
        //                                 ]);
        //                             }
        //                         }
        //                     }
        //                 }
        //             }
        //         }
        //     }

        //     // // Check if "cc_question" array exists and is not empty
        //     // if ($request->has('cc_question') && is_array($request->input('cc_question'))) {
        //     //     foreach ($request->input('cc_question') as $index => $questionData) {
        //     //         // Create a new question related to the instruction
        //     //         $description = is_array($questionData) && count($questionData) > 0 ? $questionData[0] : null;

        //     //         if ($description) {
        //     //             $question = Cc_Questions::create([
        //     //                 'description' => $description,
        //     //                 'table_cc_instruction_id' => $instruction->id,
        //     //             ]);
        //     //         }

        //     //         // Check if "option" array exists and is not empty
        //     //         if ($request->has('option') && is_array($request->input('option'))) {
        //     //             if (isset($request->input('option')[$index])) {
        //     //                 $options = $request->input('option')[$index];

        //     //                 if (is_array($options)) {
        //     //                     foreach ($options as $optionText) {
        //     //                         // Create a new option related to the question
        //     //                         Cc_Options::create([
        //     //                             'option_text' => $optionText,
        //     //                             'table_cc_question_id' => $question->id,
        //     //                         ]);
        //     //                     }
        //     //                 }
        //     //             }
        //     //         }
        //     //     }
        //     // }

        //     // Return a success response
        //     return redirect()->route('CreateCcSurvey')->with('message', 'Service updated successfully.');
        // } catch (\Exception $e) {
        //     // Handle exceptions (e.g., log, display an error message)
        //     return back()->withInput()->withErrors(['error' => 'An error occurred while saving the survey.']);
        // }

        try {
            // Store the instruction
            $instruction = Cc_Instruction::create([
                'instruction' => $request->input('instruction'),
            ]);

            // Check if "cc_questions" array exists and is not empty
            if ($request->has('cc_questions') && is_array($request->input('cc_questions'))) {
                foreach ($request->input('cc_questions') as $questionData) {
                    // Ensure the array structure is as expected
                    if (is_array($questionData) && isset($questionData['question']) && isset($questionData['options'])) {
                        $description = $questionData['question'];

                        // Create a new question related to the instruction
                        $question = Cc_Questions::create([
                            'description' => $description,
                            'table_cc_instruction_id' => $instruction->id,
                        ]);

                        // Check if "options" array exists and is not empty
                        if (is_array($questionData['options']) && count($questionData['options']) > 0) {
                            foreach ($questionData['options'] as $optionText) {
                                // Create a new option related to the question
                                Cc_Options::create([
                                    'option_text' => $optionText,
                                    'table_cc_question_id' => $question->id,
                                ]);
                            }
                        }
                    }
                }
            }

            // Return a success response
            return redirect()->route('CreateCcSurvey')->with('message', 'Service updated successfully.');
        } catch (\Exception $e) {
            // Handle exceptions (e.g., log, display an error message)
            return back()->withInput()->withErrors(['error' => 'An error occurred while saving the survey.']);
        }
    }

    public function createSurveyQuestion()
    {
        if (View::exists('SetSurvey.SurveyAndComment')) {
            return view('SetSurvey.SurveyAndComment');
        } else {
            return abort(404);
        }
    }

    public function saveSurveyQuestion(Request $request)
    {
        //dd($request);

        $request->validate([
            'instruction_SQstn' => '',
            'srvy_qstn' => 'array',
            'comment' => '',
        ]);

        // Create an Instruction record
        SurveyInstruction::create([
            'instruction' => $request->input('instruction_SQstn'),
        ]);

        // Get the survey questions array
        $surveyQuestions = $request->input('srvy_qstn');
        // Create SurveyQuestion records for non-null values
        foreach ($surveyQuestions as $question) {
            if (!is_null($question)) {
                SurveyQuestion::create([
                    'questions' => $question,
                ]);
            }
        }

        // Create a Comment record
        SurveyComment::create([
            'comment' => $request->input('comment'),
        ]);

        return redirect()->route('CreateClientSurvey')->with('message', 'Survey Question successfully created.');
    }
}
