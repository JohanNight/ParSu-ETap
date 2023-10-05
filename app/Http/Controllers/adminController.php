<?php

namespace App\Http\Controllers;

use App\Models\clientCategory;
use App\Models\clientCode;
use App\Models\offices;
use App\Models\service1;
use App\Models\service2;
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
        dd($request);
        $this->validate($request, [
            'code_Title' => 'required|string|max:255',
            'service_Title' => 'required|string|max:255',
            'description_service' => 'required|string',
            'office_service' => 'required|string',
            'classification_service' => 'required|string',
            'transaction_type' => 'required|string',
            'who_avail' => 'required|string',
            'rqr_inpt' => 'array',
            'whr_inpt' => 'array',
            'client_steps' => 'array',
            'agency_action' => 'array',
            'fees_to_paid' => 'array',
            'processing_time' => 'array',
            'person_responsible' => 'array',
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

        //  checklist requirements
        foreach ($request->rqr_inpt as $requirement) {
            $checklistRequirement = new service2;
            $checklistRequirement->requirement_description = $requirement;
            $service1->checklistRequirements()->save($checklistRequirement);
        }
        //where to secure
        foreach ($request->whr_inpt as $requirement) {
            $checklistRequirement = new service2;
            $checklistRequirement->where_to_secure = $requirement;
            $service1->checklistRequirements()->save($checklistRequirement);
        }
        //client steps
        foreach ($request->client_steps as $requirement) {
            $checklistRequirement = new service2;
            $checklistRequirement->client_steps = $requirement;
            $service1->checklistRequirements()->save($checklistRequirement);
        }
        //agency action
        foreach ($request->agency_action as $requirement) {
            $checklistRequirement = new service2;
            $checklistRequirement->agency_action = $requirement;
            $service1->checklistRequirements()->save($checklistRequirement);
        }
        //fees to be paid
        foreach ($request->fees_to_paid as $requirement) {
            $checklistRequirement = new service2;
            $checklistRequirement->fees_to_be_paid = $requirement;
            $service1->checklistRequirements()->save($checklistRequirement);
        }
        //processing time
        foreach ($request->processing_time as $requirement) {
            $checklistRequirement = new service2;
            $checklistRequirement->processing_time = $requirement;
            $service1->checklistRequirements()->save($checklistRequirement);
        }
        //person responsible
        foreach ($request->person_responsible as $requirement) {
            $checklistRequirement = new service2;
            $checklistRequirement->person_responsible = $requirement;
            $service1->checklistRequirements()->save($checklistRequirement);
        }

        // Repeat the above process for other related data

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
