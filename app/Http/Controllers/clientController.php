<?php

namespace App\Http\Controllers;

use App\Models\Cc_Instruction;
use App\Models\Cc_Questions;
use App\Models\Classification;
use App\Models\clientCategory;
use App\Models\clientInfo;
use App\Models\offices;
use App\Models\studentInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use App\Models\clientCode;
use App\Models\service1;
use App\Models\service2;
use App\Models\SurveyComment;
use App\Models\SurveyInstruction;
use App\Models\SurveyQuestion;
use App\Models\transactionType;
use App\Models\Who_avail;
//use App\Http\Middleware\CheckSurveyCode;

class clientController extends Controller
{

    public function showWelcomePage()
    {
        if (View::exists('ClientSide.index')) {
            return view('ClientSide.index');
        } else {
            return abort(404);
        }
    }
    public function showHomePage()
    {
        if (View::exists('ClientSide.home')) {
            return view('ClientSide.home');
        } else {
            return abort(404);
        }
    }
    public function showCitizenCharter()
    {
        if (View::exists('ClientSide.citizenCharter')) {
            $office = offices::all();
            // $offices = $office->idOffices;
            $services = service1::paginate(5);

            return view('ClientSide.citizenCharter', compact('services', 'office'));
        } else {
            return abort(404);
        }
    }
    public function search(Request $request)
    {
        $searchTerm = $request->query('search');

        // Perform your search logic here
        $data = service1::where('serviceTitle', 'LIKE', "%$searchTerm%")
            ->orWhere('serviceCode', 'LIKE', "%$searchTerm%")
            ->get();

        return response()->json($data);
    }

    public function selectService(Request $request)
    {
        $selectedOfficeId = $request->office_id;

        if ($selectedOfficeId) {
            $data = service1::where('idOffice', $selectedOfficeId)->get();
        } else {
            $data = service1::all(); // If no office is selected, retrieve all services.
        }

        return response()->json($data);
    }
    public function citizenDocument($id)
    {
        // Retrieve the main service1 record
        $service1 = Service1::find($id);
        $checklistRequirements1 = $service1->checklistRequirements1;
        $checklistRequirements2 = $service1->checklistRequirements2;


        $officeTypes = offices::all();
        $classification = Classification::all();
        $transactionType = transactionType::all();
        // $clientCategory = clientCategory::all();
        $whoAvail = Who_avail::all();

        $service1 = Service1::with('checklistRequirements1', 'checklistRequirements2')->find($id);
        if (View::exists('ClientSide.citizenDocument')) {
            return view('ClientSide.citizenDocument', compact('service1', 'officeTypes', 'classification', 'transactionType', 'whoAvail'));
        } else {
            return abort(404);
        }
    }
    public function clientButtons()
    {
        if (View::exists('ClientSide.clientButton')) {

            return view('ClientSide.clientButton',);
        } else {
            return abort(404);
        }
    }
    // public function checkSecurity(Request $request)
    // {

    //     $validatedData = $request->validate([
    //         'srvy_keycode' => 'required'
    //     ]);

    //     // Access the validated data
    //     $code = $validatedData['srvy_keycode'];

    //     // Check if the code exists in the database
    //     $temporaryCode = service1::where('serviceCode', $code)->first();
    //     $tempCode = $temporaryCode->serviceCode;


    //     // Additional checks, if needed
    //     if ($tempCode == null) {
    //         return back()->with('message', 'Code not found');
    //     } else if ($tempCode === $code) {
    //         return redirect('home/clientSurvey/' . $code);
    //     } else {
    //         return back()->with('message', 'Code not found');
    //     }
    // }

    public function checkSecurity(Request $request)
    {
        $validatedData = $request->validate([
            'srvy_keycode' => 'required'
        ]);

        // Access the validated data
        $code = $validatedData['srvy_keycode'];

        // Check if the code exists in the database
        $temporaryCode = service1::where('serviceCode', $code)->first();

        // Use a boolean variable to check if the code is valid
        $isValidCode = $temporaryCode && $temporaryCode->serviceCode === $code;

        // Additional checks, if needed
        if ($isValidCode) {
            return redirect('home/clientSurvey/' . $code);
        } else {
            return back()->with('message', 'Code not found');
        }
    }



    public function surveySecurity()
    {
        if (View::exists('ClientSide.clientSurveySecurity')) {

            return view('ClientSide.clientSurveySecurity',);
        } else {
            return abort(404);
        }
    }
    public function showClientSurvey($serviceCode)
    {

        if (!empty($serviceCode)) {
            $clientTypes = clientCategory::all();
            $officeTypes = offices::all();
            $ccInstruction = Cc_Instruction::all();
            $ccQuestions = Cc_Questions::with('CcOption')->get();
            $SrvyInstruction = SurveyInstruction::all();
            $SrvyQuestion = SurveyQuestion::all();
            $SrvyComment = SurveyComment::all();
            $Service = service1::all();
            $ServiceCode = $serviceCode;
            return view('ClientSide.clientSurvey', compact('clientTypes', 'officeTypes', 'ccInstruction', 'ccQuestions', 'SrvyInstruction', 'SrvyQuestion', 'SrvyComment', 'Service', 'ServiceCode'));
        } else {
            return abort(404);
        }
    }



    //fetch the data from the database using user's query
    // public function fetchData(Request $request)
    // {
    //     $searchId = $request->input('searchId');
    //     $client = studentInformation::where('idClientInfo', $searchId)->first();
    //     if ($client) {
    //         return response()->json([
    //             'name' => $client->name,
    //             'gender' => $client->sex,
    //             'age' => $client->age,
    //             'category' => $client->category
    //             // Add more fields as needed
    //         ]);
    //     } else {
    //         return response()->json(['error' => 'Client not found'], 404);
    //     }
    // }



    //store the survey data
    public function storeSurveyData(Request $request)
    {

        //dd($request);
        $validateClientType = DB::table('tbl_css_category')->pluck('idCategory')->toArray();
        $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();
        $services = DB::table('table_service1_1')->pluck('idServiceSpecification')->toArray();
        // $serviceCode = DB::table('table_service1_1')->pluck('serviceCode')->toArray();

        $serviceCode = service1::where('idServiceSpecification', $request->service_availed)->first();
        $service = $serviceCode->serviceCode;

        $validateData = $request->validate([
            'name_of_client' => 'required',
            'gender_of_client' => ['required', Rule::in(['male', 'female'])],
            'age_of_client' => 'required',
            'client_type' => ['required', Rule::in($validateClientType)],
            'date_of_transaction' => 'required|date',
            'offices' => ['required', Rule::in($validateOffices)],
            'service_availed' => ['required', Rule::in($services)],
            // 'ServiceCode' => ['required', Rule::in($serviceCode)],
            'purpose' => 'required',
            'email_of_client' => '',

            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question-S2-Q1' => 'required',
            'question-S2-Q2' => 'required',
            'question-S2-Q3' => 'required',
            'question-S2-Q4' => 'required',
            'question-S2-Q5' => 'required',
            'question-S2-Q6' => 'required',
            'question-S2-Q7' => 'required',
            'question-S2-Q8' => 'required',
            'question-S2-Q9' => 'required',
            'suggestion_for_client' => '',


        ]);
        //store the data in the database
        $UserData = [
            'name' => $validateData['name_of_client'],
            'sex' => $validateData['gender_of_client'],
            'age' => $validateData['age_of_client'],
            'idCategoryFk' => $validateData['client_type'],
            'dateOfTransaction' => $validateData['date_of_transaction'],
            'idOfficeOrigin' => $validateData['offices'],
            'service_avail' => $validateData['service_availed'],
            'purpose' => $validateData['purpose'],
            'emailAdd' => $validateData['email_of_client'],
            'serviceCode' =>    $service,
            'cc1' => $validateData['question1'],
            'cc2' => $validateData['question2'],
            'cc3' => $validateData['question3'],
            'sqd1' => $validateData['question-S2-Q1'],
            'sqd2' => $validateData['question-S2-Q2'],
            'sqd3' => $validateData['question-S2-Q3'],
            'sqd4' => $validateData['question-S2-Q4'],
            'sqd5' => $validateData['question-S2-Q5'],
            'sqd6' => $validateData['question-S2-Q6'],
            'sqd7' => $validateData['question-S2-Q7'],
            'sqd8' => $validateData['question-S2-Q8'],
            'sqd9' => $validateData['question-S2-Q9'],
            'comment' => $validateData['suggestion_for_client']
        ];
        clientInfo::create($UserData);
        return redirect('/thankyou/' . $validateData['name_of_client']);
    }

    public function showClientSurvey2()
    {

        if (View::exists('WalkInSurvey.WalkInSurvey')) {
            $clientTypes = clientCategory::all();
            $officeTypes = offices::all();
            $ccInstruction = Cc_Instruction::all();
            $ccQuestions = Cc_Questions::with('CcOption')->get();
            $SrvyInstruction = SurveyInstruction::all();
            $SrvyQuestion = SurveyQuestion::all();
            $SrvyComment = SurveyComment::all();
            $Service = service1::all();
            return view('WalkInSurvey.WalkInSurvey', compact('clientTypes', 'officeTypes', 'ccInstruction', 'ccQuestions', 'SrvyInstruction', 'SrvyQuestion', 'SrvyComment', 'Service',));
        } else {
            return abort(404);
        }
    }

    public function walkInSurvey()
    {
        $clientTypes = clientCategory::all();
        $officeTypes = offices::all();

        $Service = service1::all();
        return view('WalkInSurvey.WalkinSurveyStep1', compact('clientTypes', 'officeTypes', 'Service',));
    }

    public function processWalkInSurvey(Request $request)
    {

        $validateClientType = DB::table('tbl_css_category')->pluck('idCategory')->toArray();
        $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();
        $services = DB::table('table_service1_1')->pluck('idServiceSpecification')->toArray();

        $serviceCode = service1::where('idServiceSpecification', $request->service_availed)->first();
        $service = $serviceCode->serviceCode;
        // dd($service);

        $validateData = $request->validate([
            'name_of_client' => 'required',
            'gender_of_client' => ['required', Rule::in(['male', 'female'])],
            'age_of_client' => 'required',
            'client_type' => ['required', Rule::in($validateClientType)],
            'date_of_transaction' => 'required|date',
            'offices' => ['required', Rule::in($validateOffices)],
            'service_availed' => ['required', Rule::in($services)],
            'purpose' => 'required',
            // 'ServiceCode' => '',
            'email_of_client' => '',

        ]);

        $request->session()->put('step1', ['data' => $validateData, 'service' => $service]);

        return redirect('/home/WalkIn-clientSurvey2');
    }

    public function walkInSurvey2()
    {
        if (!$data = session('step1')) {
            return redirect('/home/WalkIn-clientSurvey');
        }
        $ccInstruction = Cc_Instruction::all();
        $ccQuestions = Cc_Questions::with('CcOption')->get();
        $SrvyInstruction = SurveyInstruction::all();
        $SrvyQuestion = SurveyQuestion::all();
        $SrvyComment = SurveyComment::all();

        return view('WalkInSurvey.WalkinSurveyStep2', compact('ccInstruction', 'ccQuestions', 'SrvyInstruction', 'SrvyQuestion', 'SrvyComment', 'data'));
    }
    public function processWalkInSurvey2(Request $request)
    {
        $step1Data = $request->session()->get('step1');


        if (!$step1Data) {
            return redirect('/home/WalkIn-clientSurvey');
        }
        $validateData = $request->validate([
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question-S2-Q1' => 'required',
            'question-S2-Q2' => 'required',
            'question-S2-Q3' => 'required',
            'question-S2-Q4' => 'required',
            'question-S2-Q5' => 'required',
            'question-S2-Q6' => 'required',
            'question-S2-Q7' => 'required',
            'question-S2-Q8' => 'required',
            'question-S2-Q9' => 'required',
            'suggestion_for_client' => ''

        ]);


        $UserData = [
            'name' => $step1Data['data']['name_of_client'],
            'sex' => $step1Data['data']['gender_of_client'],
            'age' =>  $step1Data['data']['age_of_client'],
            'idCategoryFk' =>  $step1Data['data']['client_type'],
            'dateOfTransaction' =>  $step1Data['data']['date_of_transaction'],
            'idOfficeOrigin' =>  $step1Data['data']['offices'],
            'service_avail' =>  $step1Data['data']['service_availed'],
            'purpose' =>  $step1Data['data']['purpose'],
            'serviceCode' => $step1Data['service'],
            'emailAdd' => $step1Data['data']['email_of_client'],
            'cc1' => $validateData['question1'],
            'cc2' => $validateData['question2'],
            'cc3' => $validateData['question3'],
            'sqd1' => $validateData['question-S2-Q1'],
            'sqd2' => $validateData['question-S2-Q2'],
            'sqd3' => $validateData['question-S2-Q3'],
            'sqd4' => $validateData['question-S2-Q4'],
            'sqd5' => $validateData['question-S2-Q5'],
            'sqd6' => $validateData['question-S2-Q6'],
            'sqd7' => $validateData['question-S2-Q7'],
            'sqd8' => $validateData['question-S2-Q8'],
            'sqd9' => $validateData['question-S2-Q9'],
            'comment' => $validateData['suggestion_for_client']
        ];
        clientInfo::create($UserData);
        // Clear the session data
        $request->session()->forget('step1');
        return redirect('/thankyou/' . $step1Data['data']['name_of_client']);
    }

    public function storeSurveyData2(Request $request)
    {

        //dd($request);
        $validateClientType = DB::table('tbl_css_category')->pluck('idCategory')->toArray();
        $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();
        $services = DB::table('table_service1_1')->pluck('idServiceSpecification')->toArray();

        $serviceCode = service1::where('idServiceSpecification', $request->service_availed)->first();

        $validateData = $request->validate([
            'name_of_client' => 'required',
            'gender_of_client' => ['required', Rule::in(['male', 'female'])],
            'age_of_client' => 'required',
            'client_type' => ['required', Rule::in($validateClientType)],
            'date_of_transaction' => 'required|date',
            'offices' => ['required', Rule::in($validateOffices)],
            'service_availed' => ['required', Rule::in($services)],
            'purpose' => 'required',
            // 'ServiceCode' => '',
            'email_of_client' => '',

            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question-S2-Q1' => 'required',
            'question-S2-Q2' => 'required',
            'question-S2-Q3' => 'required',
            'question-S2-Q4' => 'required',
            'question-S2-Q5' => 'required',
            'question-S2-Q6' => 'required',
            'question-S2-Q7' => 'required',
            'question-S2-Q8' => 'required',
            'question-S2-Q9' => 'required',
            'suggestion_for_client' => ''

        ]);

        $service = $serviceCode->serviceCode;
        //store the data in the database
        $UserData = [
            'name' => $validateData['name_of_client'],
            'sex' => $validateData['gender_of_client'],
            'age' => $validateData['age_of_client'],
            'idCategoryFk' => $validateData['client_type'],
            'dateOfTransaction' => $validateData['date_of_transaction'],
            'idOfficeOrigin' => $validateData['offices'],
            'service_avail' => $validateData['service_availed'],
            'purpose' => $validateData['purpose'],
            'serviceCode' =>  $service,
            'emailAdd' => $validateData['email_of_client'],
            'cc1' => $validateData['question1'],
            'cc2' => $validateData['question2'],
            'cc3' => $validateData['question3'],
            'sqd1' => $validateData['question-S2-Q1'],
            'sqd2' => $validateData['question-S2-Q2'],
            'sqd3' => $validateData['question-S2-Q3'],
            'sqd4' => $validateData['question-S2-Q4'],
            'sqd5' => $validateData['question-S2-Q5'],
            'sqd6' => $validateData['question-S2-Q6'],
            'sqd7' => $validateData['question-S2-Q7'],
            'sqd8' => $validateData['question-S2-Q8'],
            'sqd9' => $validateData['question-S2-Q9'],
            'comment' => $validateData['suggestion_for_client']
        ];
        clientInfo::create($UserData);
        return redirect('/thankyou/' . $validateData['name_of_client']);
    }

    public function thankYouPage($name)
    {
        $names = $name;
        return view('ClientSide.thankYouPage', compact('names'));
    }

    public function example()
    {
        return view('example.example');
    }
    public function exampleStep1()
    {
        $clientTypes = clientCategory::all();
        $officeTypes = offices::all();

        $Service = service1::all();
        return view('example.exampleStep1', compact('clientTypes', 'officeTypes', 'Service',));
    }
    // public function exampleStep1()
    // {
    //     $clientTypes = clientCategory::all();
    //     $officeTypes = offices::all();

    //     $Service = service1::all();

    //     // Retrieve form data from session and pass it to the view
    //     $formData = session('step1.data', []);
    //     $selectedService = session('step1.service', null);

    //     return view('example.exampleStep1', compact('clientTypes', 'officeTypes', 'Service', 'formData', 'selectedService'));
    // }


    public function processStep1(Request $request)
    {

        $validateClientType = DB::table('tbl_css_category')->pluck('idCategory')->toArray();
        $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();
        $services = DB::table('table_service1_1')->pluck('idServiceSpecification')->toArray();

        $serviceCode = service1::where('idServiceSpecification', $request->service_availed)->first();
        $service = $serviceCode->serviceCode;
        // dd($service);

        $validateData = $request->validate([
            'name_of_client' => 'required',
            'gender_of_client' => ['required', Rule::in(['male', 'female'])],
            'age_of_client' => 'required',
            'client_type' => ['required', Rule::in($validateClientType)],
            'date_of_transaction' => 'required|date',
            'offices' => ['required', Rule::in($validateOffices)],
            'service_availed' => ['required', Rule::in($services)],
            'purpose' => 'required',
            // 'ServiceCode' => '',
            'email_of_client' => '',

        ]);

        $request->session()->put('step1', ['data' => $validateData, 'service' => $service]);

        return redirect('/exampleStep2');
    }
    // public function processStep1(Request $request)
    // {
    //     $validateClientType = DB::table('tbl_css_category')->pluck('idCategory')->toArray();
    //     $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();
    //     $services = DB::table('table_service1_1')->pluck('idServiceSpecification')->toArray();

    //     $serviceCode = service1::where('idServiceSpecification', $request->service_availed)->first();
    //     $service = $serviceCode->serviceCode;

    //     $validateData = $request->validate([
    //         'name_of_client' => 'required',
    //         'gender_of_client' => ['required', Rule::in(['male', 'female'])],
    //         'age_of_client' => 'required',
    //         'client_type' => ['required', Rule::in($validateClientType)],
    //         'date_of_transaction' => 'required|date',
    //         'offices' => ['required', Rule::in($validateOffices)],
    //         'service_availed' => ['required', Rule::in($services)],
    //         'purpose' => 'required',
    //         'email_of_client' => '',
    //     ]);

    //     $request->session()->put('step1', ['data' => $validateData, 'service' => $service]);

    //     return redirect('/exampleStep2');
    // }


    public function exampleStep2()
    {
        if (!$data = session('step1')) {
            return redirect('/exampleStep1');
        }
        $ccInstruction = Cc_Instruction::all();
        $ccQuestions = Cc_Questions::with('CcOption')->get();
        $SrvyInstruction = SurveyInstruction::all();
        $SrvyQuestion = SurveyQuestion::all();
        $SrvyComment = SurveyComment::all();

        return view('example.exampleStep2', compact('ccInstruction', 'ccQuestions', 'SrvyInstruction', 'SrvyQuestion', 'SrvyComment', 'data'));
    }

    public function processStep2Complete(Request $request)
    {
        $step1Data = $request->session()->get('step1');


        if (!$step1Data) {
            return redirect('/exampleStep1');
        }
        $validateData = $request->validate([
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question-S2-Q1' => 'required',
            'question-S2-Q2' => 'required',
            'question-S2-Q3' => 'required',
            'question-S2-Q4' => 'required',
            'question-S2-Q5' => 'required',
            'question-S2-Q6' => 'required',
            'question-S2-Q7' => 'required',
            'question-S2-Q8' => 'required',
            'question-S2-Q9' => 'required',
            'suggestion_for_client' => ''

        ]);


        $UserData = [
            'name' => $step1Data['data']['name_of_client'],
            'sex' => $step1Data['data']['gender_of_client'],
            'age' =>  $step1Data['data']['age_of_client'],
            'idCategoryFk' =>  $step1Data['data']['client_type'],
            'dateOfTransaction' =>  $step1Data['data']['date_of_transaction'],
            'idOfficeOrigin' =>  $step1Data['data']['offices'],
            'service_avail' =>  $step1Data['data']['service_availed'],
            'purpose' =>  $step1Data['data']['purpose'],
            'serviceCode' => $step1Data['service'],
            'emailAdd' => $step1Data['data']['email_of_client'],
            'cc1' => $validateData['question1'],
            'cc2' => $validateData['question2'],
            'cc3' => $validateData['question3'],
            'sqd1' => $validateData['question-S2-Q1'],
            'sqd2' => $validateData['question-S2-Q2'],
            'sqd3' => $validateData['question-S2-Q3'],
            'sqd4' => $validateData['question-S2-Q4'],
            'sqd5' => $validateData['question-S2-Q5'],
            'sqd6' => $validateData['question-S2-Q6'],
            'sqd7' => $validateData['question-S2-Q7'],
            'sqd8' => $validateData['question-S2-Q8'],
            'sqd9' => $validateData['question-S2-Q9'],
            'comment' => $validateData['suggestion_for_client']
        ];
        clientInfo::create($UserData);
        // Clear the session data
        $request->session()->forget('step1');
        return redirect('/thankyou/' . $step1Data['data']['name_of_client']);
    }
}
