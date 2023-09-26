<?php

namespace App\Http\Controllers;

use App\Models\clientCategory;
use App\Models\offices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Intervention\Image\Facades\Image;

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
            $request->session()->regenerate();
            return redirect('/indexAdmin')->with('message', 'Welcome Admin');
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
            return view('AdminSide.addServiceFunction');
        } else {
            return abort(404);
        }
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
    public function createThumbnail($path, $width, $height)
    {
        $img = Image::make($path)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $img->save($path);
    }
    public function update(Request $request)
    {
        // dd($request);
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $validated = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email'],
        ]);
        if ($request->hasFile('user_image')) {
            $request->validate([
                'user_image' => ['image', 'mimes:jpeg,jpg,png,webp,bmp,tiff', 'max:6000']
            ]);
            $filenameWithExtention = $request->file('user_image');

            //Making the image unique
            $filename = pathinfo($filenameWithExtention, PATHINFO_FILENAME); //removing the extension,get the filename

            $extension = $request->file('user_image')->getClientOriginalExtension(); //getting the extension

            $filenameToStore = $filename . '_' . time() . '.' . $extension;

            $smallThumbnail = $filename . '_' . time() . '.' . $extension;

            $request->file('user_image')->storeAs('public/UserImage', $filenameToStore);



            $request->file('user_image')->storeAs('public/UserImage/Thumbnail', $filenameToStore);
        }


        // $user->fill([
        //     'name' => $validated['name'],
        //     'email' => $validated['email'],
        // ]);
        // $user->save();



        // return back()->with('message', 'Saved Successfully');
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
    public function reportPage()
    {
        if (View::exists('AdminSide.reportFunction')) {
            return view('AdminSide.reportFunction');
        } else {
            return abort(404);
        }
    }
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
}
