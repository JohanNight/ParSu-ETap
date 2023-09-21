<?php

namespace App\Http\Controllers;

use App\Models\offices;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

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
    public function addServicePagreport()
    {
        if (View::exists('AdminSide.addServiceFunction')) {
            return view('AdminSide.addServiceFunction');
        } else {
            return abort(404);
        }
    }
    public function accountPage()
    {
        if (View::exists('AdminSide.accountFunction')) {
            return view('AdminSide.accountFunction');
        } else {
            return abort(404);
        }
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
}
