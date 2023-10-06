<?php

namespace App\Http\Controllers;

use App\Models\clientCategory;
use App\Models\clientCode;
use App\Models\offices;
use App\Models\service1;
use App\Models\service1_2;
use App\Models\service1_3;
use App\Models\User;
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
            return view('AdminSide.addServiceFunction', compact('officeTypes'));
        } else {
            return abort(404);
        }
    }
    public function storeService(Request $request)
    {
        //dd($request);
        // Retrieve the "requirements" array from the request
        $requirements = $request->input('requirements');

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
            // 'rqr_inpt' => 'array',
            // 'whr_inpt' => 'array',
            'rqr_whr_inpt' => 'array', // Combined array of rqr_inpt and whr_inpt
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

        if (isset($requirements) && is_array($requirements)) {
            foreach ($requirements as $requirement) {
                // Create and associate checklist requirements
                $checklistRequirement = new Service1_2;
                $checklistRequirement->requirement_description = $requirement['rqr_inpt'];
                $checklistRequirement->where_to_secure = $requirement['whr_inpt'];
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

        // Create and associate checklist requirements of type 1 (rqr_inpt)
        // foreach ($request->rqr_inpt as $requirement) {
        //     $checklistRequirement1 = new Service1_2;
        //     $checklistRequirement1->requirement_description = $requirement;
        //     $service1->checklistRequirements1()->save($checklistRequirement1);
        // }

        // Create and associate checklist requirements of type 2 (whr_inpt)
        // foreach ($request->whr_inpt as $requirement) {
        //     $checklistRequirement2 = new Service1_2;
        //     $checklistRequirement2->where_to_secure = $requirement;
        //     $service1->checklistRequirements1()->save($checklistRequirement2);
        // }

        // Create and associate checklist requirements of type 3 (client_steps, agency_action, fees_to_paid, processing_time, person_responsible)
        // foreach ($request->client_steps as $clientStep) {
        //     $checklistRequirement3 = new Service1_3;
        //     $checklistRequirement3->client_steps = $clientStep;
        //     // Set other attributes as well
        //     $service1->checklistRequirements3()->save($checklistRequirement3);
        // }

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
            return view('AdminSide.storageServiceFunction');
        } else {
            return abort(404);
        }
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
    public function editQuestion()
    {
        if (View::exists('AdminSide.editQuestion')) {
            $clientTypes = clientCategory::all();
            $officeTypes = offices::all();
            return view('AdminSide.editQuestion', compact('clientTypes', 'officeTypes'));
        } else {
            return abort(404);
        }
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
}
