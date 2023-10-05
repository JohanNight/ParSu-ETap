<?php

namespace App\Http\Controllers;

use App\Models\clientCategory;
use App\Models\clientCode;
use App\Models\offices;
use App\Models\service1;
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
    public function rulesOfServices($services)
    {
        return $services = $services->validate([
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
    }
    public function storeService(Request $request)
    {

        $this->rulesOfServices($request);
        dd($request);
        $service1 = new service1;
        $service1->code_Title = $request->code_Title;
        $service1->service_Title = $request->service_Title;
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
