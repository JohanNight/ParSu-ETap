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
use App\Models\ServiceType;
use App\Models\ServiceCode;
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
use Illuminate\Support\Facades\Password;
use App\Mail\ForgetPassword;
use App\Console\Commands\DeleteExpiredTokens; // Import the command
use Illuminate\Support\Facades\Artisan; // Import Artisan facade


use App\Charts\TotalClientSatisfaction;
use App\Http\Controllers\SumOfAllData; // Import the controller
use App\Models\clientInfo;
use App\Models\transactionType;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Mail as FacadesMail;

class adminController extends Controller
{
    //

    public function index()
    {
        $totalDataPerServices = new TotalClientSatisfaction;
        $totalClientSatisfaction = new TotalClientSatisfaction;
        $totalClientUser = new TotalClientSatisfaction;
        $sumOfDatasController = new SumOfDatasController(); //import a controller

        $user = Auth::user();
        $userOffice = $user->idOfficeOrigin;

        // Call the calculatePerService method to get the total of surveyed per offices
        $TotalDataPerServices = $sumOfDatasController->getAnswerePerService($userOffice);
        $totalDataPerServices->labels(array_keys($TotalDataPerServices));
        $totalDataPerServices->dataset('Number Of Services Surveyed', 'bar', array_values($TotalDataPerServices))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        $services = service1::where('idOffice', $userOffice)
            ->where('archive', 1)
            ->paginate('5');

        if (View::exists('AdminSide.index')) {
            return view('AdminSide.index', compact('totalDataPerServices', 'services'));
        } else {
            return abort(404);
        }
    }
    public function index2()
    {
        $totalDataPerServices = new TotalClientSatisfaction;
        $sumOfDatasController = new SumOfDatasController(); //import a controller

        $user = Auth::user();
        $userOffice = $user->idOfficeOrigin;

        // Call the calculatePerOfficeSurveyed method to get the total of surveyed per offices
        $TotalDataPerServices = $sumOfDatasController->getAnswerePerService($userOffice);
        $totalDataPerServices->labels(array_keys($TotalDataPerServices));
        $totalDataPerServices->dataset('Number Of Services Surveyed', 'bar', array_values($TotalDataPerServices))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);



        $services = service1::where('idOffice', $userOffice)
            ->where('archive', 1)
            ->paginate('5');

        if (View::exists('AdminSide.index')) {
            return view('AdminSide.index', compact('totalDataPerServices', 'services'));
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
            $routeRedirect = $user->idOfficeOrigin === 3 ? 'Admin' : 'index';
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

    public function forgotPasswordPage()
    {
        if (View::exists('auth.passwordsReset')) {
            return view('auth.passwordsReset');
        } else {
            return abort(404);
        }
    }

    public function getPasword(Request $request)
    {
        // dd($request);
        $request->validate(['email' => 'required|email']);

        $user = User::getEmailCheck($request->email);

        if (!empty($user)) {
            $user->remember_token = Str::random(30);
            $user->save();
            FacadesMail::to($user->email)->send(new ForgetPassword($user));
            return redirect()->back()->with('message', "We now send you the link in your email to change your password");
        } else {
            return redirect()->back()->with('error', "Email not found in the Database");
        }
    }

    public function emailResetPassword($remember_token)
    {
        $user = User::getTokenSingle($remember_token);
        if (!empty($user)) {
            // $data['user'] = $user;
            return view('auth.confirmPassword', ['data' => $user]);
        } else {
            return abort(404);
        }
    }

    public function confirmResetPassword(Request $request, $remember_token)
    {
        $validated = $request->validate(
            [
                'password' => 'required|confirmed|min:6'
            ]
        );
        // if ($request->password == $request->password_confirmation) {
        //     $user = User::getTokenSingle($remember_token);
        //     $user->password = Hash::make($validated['password']);
        //     $user->save();
        //     return redirect('/login')->with('message', "Password Succesfully Change");
        // }
        if ($request->password == $request->password_confirmation) {
            $user = User::getTokenSingle($remember_token);

            if ($user) {
                $user->password = Hash::make($validated['password']);
                // $user->remember_token = null; // Set the token to null

                // Save the user's changes
                $user->save();

                // Delete expired tokens using the command
                Artisan::call('tokens:delete-expired');

                return redirect('/login')->with('message', "Password Successfully Changed");
            }
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
            'idOfficeOrigin' => $validated['offices'],
            'email' => $validated['email'],
            'password' => $validated['password'] = Hash::make($validated['password']),
        ];
        $user = User::create($Admindata);
        Auth::login($user);
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
    public function addServicePage()
    {
        if (View::exists('AdminSide.addServiceFunction')) {
            $officeTypes = offices::all();
            $whoAvail = Who_avail::all();
            $classifications = Classification::all();
            $ServiceType = ServiceType::all();
            $transactionType = transactionType::all();
            $user = Auth::user();
            return view('AdminSide.addServiceFunction', compact('officeTypes', 'whoAvail', 'classifications', 'ServiceType', 'transactionType', 'user'));
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
        $user = Auth::user();

        //dd($request);
        $this->validate($request, [
            'service_Title' => 'required|string|max:255',
            'description_service' => 'required|string',
            'serviceType' => 'required',
            'office_service' => 'required',
            'classification_service' => 'required',
            'transaction_type' => 'required',
            'who_avail' => 'required',
            'table_Rqr_Whr_data' => 'array', // Combined array of rqr_inpt and whr_inpt
            'table_data' => 'array',
        ]);

        $setArchive = 1;
        $newCode = $this->createServiceCode($user->idOfficeOrigin, $request->serviceType, $request->transaction_type);
        //dd($newCode);

        $service1 = new Service1;
        $service1->serviceCode = $newCode;
        $service1->serviceTitle = $request->service_Title;
        $service1->serviceDescription = $request->description_service;
        $service1->idService = $request->serviceType;
        $service1->idOffice = $request->office_service;
        $service1->idClassificationServices = $request->classification_service;
        $service1->idtransactionType = $request->transaction_type;
        $service1->idWhoAvail = $request->who_avail;
        $service1->archive = $setArchive;
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

    public function createServiceCode($officeId, $typeService, $transactionType)
    {
        //ACADEMIC COLLEGES
        if ($typeService == 1 && in_array($officeId, ['23', '24', '25', '26'])) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ACAD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'ACAD001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 4);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'ACAD' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && in_array($officeId, ['23', '24', '25', '26'])) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ACAD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'ACAD001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 4);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'ACAD' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'ACAD001';
        }
        // UNIVERSITY REGISTRAR
        if ($typeService == 1 && $officeId == 29) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ACAD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'URO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'URO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 29) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ACAD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'URO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'URO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'UROD001';
        }

        // Assessment Office
        if ($typeService == 1 && $officeId == 7) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ASSSESSMENT[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'ASSESSMENT001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 10);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'ASSESSMENT' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 7) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ASSESSMENT[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'ASSESSMENT001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 10);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'ASSESSMENT' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'ASSESSMENT001';
        }

        // Procurement/ Bids and Awards Comittee
        if ($typeService == 1 && $officeId == 17) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^BAC[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'BAC001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'BAC' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 17) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^BAC[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'BAC001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'BAC' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'BAC001';
        }

        // Budget Comittee
        if ($typeService == 1 && $officeId == 8) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^BUD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'BUD001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'BUD' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 8) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^BUD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'BUD001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'BUD' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'BUD001';
        }

        // Business Affairs Office
        if ($typeService == 1 && $officeId == 9) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^BA0[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'BAO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'BAO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 9) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^BAO[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'BAO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'BAO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'BAO001';
        }

        // Cashier Office
        if ($typeService == 1 && $officeId == 10) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^CSH[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'CSH001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'CSH' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 10) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^CSH[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'CSH001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'CSH' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'CSH001';
        }
        // Information and Communication Technology Management Office
        if ($typeService == 1 && $officeId == 14) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ICTMO[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'ICTMO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 5);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'ICTMO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 14) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^ICTMO[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'ICTMO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 5);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'ICTMO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'ICTMO001';
        }

        // Document Control Office
        if ($typeService == 1 && $officeId == 11) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^DCO[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'DCO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'DCO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 11) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^DCO[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'DCO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'DCO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'DCO001';
        }

        // MAIN Campus Library
        if ($typeService == 1 && $officeId == 30) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^LIB[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'LIB001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'LIB' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 30) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^LIB[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'LIB001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'LIB' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'LIB001';
        }

        // Main Campus Clinic
        if ($typeService == 1 && $officeId == 32) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^CLI[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'CLI001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'CLI' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 32) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^CLI[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'CLI001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'CLI' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'CLI001';
        }

        // Main Campus OSAS
        if ($typeService == 1 && $officeId == 28) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^OSAS[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'OSAS001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 4);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'OSAS' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 28) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^OSAS[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'OSAS001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 4);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'OSAS' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'OSAS001';
        }

        // Main Campus Physical Plant and Facilities
        if ($typeService == 1 && $officeId == 15) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^PPF[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'PPF001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'PPF' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 15) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^PPF[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'PPF001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'PPF' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'PPF001';
        }

        // Procurement/ Bids and Awards Comittee
        if ($typeService == 1 && $officeId == 17 && $transactionType == 2) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^PRO[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'PRO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'PRO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 17 && $transactionType == 2) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^PRO[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'PRO001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'PRO' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'PRO001';
        }

        //Safety and Security
        if ($typeService == 1 && $officeId == 19) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^SSS[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'SSS001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'SSS' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && $officeId == 19) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^SSS[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'SSS001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 3);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'SSS' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'SSS001';
        }

        //CAMPUSES ACADEMIC COLLEGES
        if ($typeService == 1 && in_array($officeId, ['37', '49', '62', '74', '86', '98'])) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^CMPSACAD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            if ($latestServiceCode->isEmpty()) {
                return 'CMPSACAD001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 8);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'CMPSACAD' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } elseif ($typeService == 2 && in_array($officeId, ['37', '49', '62', '74', '86', '98'])) {
            $latestServiceCode = service1::where('serviceCode', 'REGEXP', '^CMPSACAD[0-9]+$')
                ->where('idService', $typeService)
                ->where('idOffice', $officeId)
                ->get(); // Retrieve all service codes that match the pattern.
            //dd($latestServiceCode);
            if ($latestServiceCode->isEmpty()) {
                return 'CMPSACAD001'; // No existing service codes, start with 'ACAD001'.
            } else {
                // Find the highest numeric part among existing service codes.
                $maxNumericPart = $latestServiceCode->max(function ($code) {
                    return (int)substr($code->serviceCode, 8);
                });
                $newNumericPart = $maxNumericPart + 1;
                $newCode = 'CMPSACAD' . str_pad($newNumericPart, 3, '0', STR_PAD_LEFT);
                return $newCode;
            }
        } else {
            return 'CMPSACAD001';
        }
    }



    // public function createThumbnail($path, $width, $height)
    // {
    //     $img = Image::make($path)->resize($width, $height, function ($constraint) {
    //         $constraint->aspectRatio();
    //     });
    //     $img->save($path);
    // }

    public function storagePage()
    {
        $user = Auth::user();

        if (View::exists('AdminSide.storageServiceFunction')) {
            $officeId = $user->idOfficeOrigin;
            if ($officeId) {
                $services = Service1::where('idOffice', $officeId)
                    ->where('archive', 1)
                    ->paginate(10);
                return view('AdminSide.storageServiceFunction', ['services' => $services]);
            }
        } else {
            return abort(404);
        }
    }

    public function editService($idServiceSpecification)
    {
        // Retrieve the main service1 record
        $service1 = Service1::findOrFail($idServiceSpecification);
        $checklistRequirements1 = $service1->checklistRequirements1;
        $checklistRequirements2 = $service1->checklistRequirements2;

        $officeTypes = offices::all();
        $whoAvail = Who_avail::all();
        $classifications = Classification::all();
        $ServiceType = ServiceType::all();
        $transactionType = transactionType::all();

        $service1 = Service1::with('checklistRequirements1', 'checklistRequirements2')->find($idServiceSpecification);
        //dd($service1);
        if (!$service1) {
            return abort(404); // Handle the case when the record is not found.
        }

        return view('AdminSide.editService', compact('service1', 'officeTypes', 'whoAvail', 'classifications', 'ServiceType', 'transactionType'));
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
            'serviceType' => 'required',
            'office_service' => 'required',
            'classification_service' => 'required',
            'transaction_type' => 'required',
            'who_avail' => 'required',
            'table_Rqr_Whr_data' => 'array', // Combined array of rqr_inpt and whr_inpt
            'table_data' => 'array',
        ]);

        // Update the service attributes based on user input
        $service->update([
            'serviceCode' => $request->code_Title,
            'serviceTitle' => $request->service_Title,
            'serviceDescription' => $request->description_service,
            'idService' => $request->serviceType,
            'idOffice' => $request->office_service,
            'idClassificationServices' => $request->classification_service,
            'idtransactionType' => $request->transaction_type,
            'idWhoAvail' => $request->who_avail,
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
    public function archiveService(Request $request, $serviceId)
    {
        $service = service1::find($serviceId);
        $service->archive = 0;
        $service->save();
        return view('AdminSide.storageServiceFunction');
    }
    public function codeGeneratorPage()
    {

        $user = Auth::user();
        $superAdmin = $user->idOfficeOrigin;

        if ($superAdmin !== 3) {
            $userOffice = $user->idOfficeOrigin;
            $services = service1::where('idOffice', $userOffice)->get();
            return view('AdminSide.generateCodeFunction', ['services' => $services]);
        } elseif ($superAdmin === 3) {
            $services = service1::all();
            return view('AdminSide.generateCodeFunction', ['services' => $services]);
        } else {
            return abort(404);
        }
    }
    // public function createCode(Request $request)
    // {
    //     $searchCode = $request->input('service_code');
    //     $user = Auth::user();
    //     $superAdmin = $user->idOfficeOrigin;

    //     if ($superAdmin == 3) {
    //         $serviceCode = service1::where('serviceCode',  $searchCode)->first();
    //         $code = $serviceCode->serviceCode;
    //         return response()->json(['code' => $code]);
    //     } else {
    //         $userOffice = $user->idOfficeOrigin;
    //         $serviceCode = service1::where('serviceCode',  $searchCode)
    //             ->where('idOffice', $userOffice)->first();
    //         $code = $serviceCode->serviceCode;
    //         return response()->json(['code' => $code]);
    //     }
    // }

    public function createCode(Request $request)
    {
        $searchCode = $request->input('service_code');
        $user = Auth::user();
        $superAdmin = $user->idOfficeOrigin;
        $setFlag = 1;

        if ($superAdmin == 3) {
            $serviceCode = service1::where('serviceCode',  $searchCode)->first();
            $code = $serviceCode->serviceCode . $this->generateRandomCode();

            $setCode = new ServiceCode;
            $setCode->code =  $code;
            $setCode->flag =  $setFlag;
            $setCode->save();

            return response()->json(['code' => $code]);
        } else {
            $userOffice = $user->idOfficeOrigin;
            $serviceCode = service1::where('serviceCode',  $searchCode)
                ->where('idOffice', $userOffice)->first();
            $code = $serviceCode->serviceCode . $this->generateRandomCode();

            $setCode = new ServiceCode;
            $setCode->code =  $code;
            $setCode->flag =  $setFlag;
            $setCode->save();

            return response()->json(['code' => $code]);
        }
    }

    private function generateRandomCode($length = 3)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomCode = '';

        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }

        return $randomCode;
    }


    public function report2()
    {
        $totalDataPerServices = new TotalClientSatisfaction;
        // $totalClientSatisfaction = new TotalClientSatisfaction;
        $totalClientUser = new TotalClientSatisfaction;
        // $totalCcOptions = new TotalClientSatisfaction;
        $sumOfDatasController = new SumOfDatasController(); //import a controller

        $user = Auth::user();
        $userOffice = $user->idOfficeOrigin;

        // Call the calculatePerOfficeSurveyed method to get the total of surveyed per offices
        $TotalDataPerServices = $sumOfDatasController->getAnswerePerService($userOffice);
        $totalDataPerServices->labels(array_keys($TotalDataPerServices));
        $totalDataPerServices->dataset('Number Of Services Surveyed', 'bar', array_values($TotalDataPerServices))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);



        // Call the calculateClientCategory method to get the total of client category
        $TotalClientUser = $sumOfDatasController->getClientCategory($userOffice);
        $totalClientUser->labels(array_keys($TotalClientUser));
        $totalClientUser->dataset('Number Of Clients By Category', 'bar', array_values($TotalClientUser))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);


        $totalClient = $sumOfDatasController->getTotalClient($userOffice);

        if (View::exists('AdminSide.reportFunction2')) {
            return view('AdminSide.reportFunction2', compact('totalDataPerServices',  'totalClientUser', 'totalClient',));
        } else {
            return abort(404);
        }
    }
    public function filterResult(Request $request)
    {
        //dd($request);
        $request->validate([
            'date_from' => 'required|date',
            'to_date' => 'required|date|after_or_equal:date_from',
        ]);
        $sumOfDatasController = new SumOfDatasController(); //import a controller
        $totalDataPerServices = new TotalClientSatisfaction;
        $totalClientUser = new TotalClientSatisfaction;

        $user = Auth::user();
        $userOffice = $user->idOfficeOrigin;

        // Call the calculatePerOfficeSurveyed method to get the total of surveyed per offices
        $GetTotalAnswerePerService = $sumOfDatasController->getTotalAnswerePerService($request, $userOffice);
        $totalDataPerServices->labels(array_keys($GetTotalAnswerePerService));
        $totalDataPerServices->dataset('Number Of Services Surveyed', 'bar', array_values($GetTotalAnswerePerService))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // Call the calculateClientCategory method to get the total of client category
        $GetTotalClientUser = $sumOfDatasController->getTotalClientCategory($request, $userOffice);
        $totalClientUser->labels(array_keys($GetTotalClientUser));
        $totalClientUser->dataset('Number Of Clients By Category', 'bar', array_values($GetTotalClientUser))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        $totalClient = $sumOfDatasController->getOverAllClient($request, $userOffice);


        if (View::exists('AdminSide.reportFunction2')) {
            return view('AdminSide.reportFunction2', compact('totalDataPerServices', 'totalClientUser', 'totalClient'));
        } else {
            return abort(404);
        }
    }
    public function assessmentResult(Request $request)
    {
        //dd($request);
        $request->validate([
            'Assess_From_date' => 'required|date',
            'Assess_date_To' => 'required|date|after_or_equal:Assess_From_date',
        ]);


        $sumOfDatasController = new SumOfDatasController();

        $user = Auth::user();
        $userOffice = $user->idOfficeOrigin;
        $offices = offices::all();

        $getTotalPerService = $sumOfDatasController->getCalculateAnswerePerService($request, $userOffice);
        $getTotalNumberPerService = $sumOfDatasController->TotalAnswerePerService($request, $userOffice);
        $CsmReport =  $sumOfDatasController->getCalculatePerCcRecord($request, $userOffice);
        $SqdResult =  $sumOfDatasController->getAllSQDResult($request, $userOffice);
        // dd($getTotalPerService);


        $cc1Report = $CsmReport['cc1Data'];
        $cc2Report = $CsmReport['cc2Data'];
        $cc3Report = $CsmReport['cc3Data'];
        $totalResponses = $CsmReport['totalResponses'];


        $pdf = FacadePdf::loadView('pdf.result', compact('getTotalPerService', 'getTotalNumberPerService', 'userOffice', 'offices', 'cc1Report', 'cc2Report', 'cc3Report', 'totalResponses', 'SqdResult'));
        return $pdf->stream('Result.pdf');
    }








    //Super Administrator

    public function indexAdmin()
    {
        $sumOfAllDataController = new SumOfAllData(); //import a controller
        $chart = new TotalClientSatisfaction; // this is a chart php
        $totalOffices = new TotalClientSatisfaction;


        // Call the calculateClientSatisfaction method to get the satisfaction data
        $satisfactionData = $sumOfAllDataController->calculateClientSatisfaction();
        $chart->labels(array_keys($satisfactionData));
        $chart->dataset('Total Client Satisfaction', 'pie', array_values($satisfactionData))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00', '#ED1C24', '#020100']);
        $TotalUser = $sumOfAllDataController->calculateClientCategory();

        // Call the calculatePerOfficeSurveyed method to get the total of surveyed per offices
        $TotalOfficesSurveyed = $sumOfAllDataController->calculatePerOfficeSurveyed();
        $totalOffices->labels(array_keys($TotalOfficesSurveyed));
        $totalOffices->dataset('Number Of Offices', 'bar', array_values($TotalOfficesSurveyed))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        $totalStudents =   $sumOfAllDataController->calculateTotalStudent();
        $totalClients =   $sumOfAllDataController->calculateTotalClient();
        $totalPersonnels =   $sumOfAllDataController->calculateTotalPersonelAndNonPersonnel();
        $totalVisitors =   $sumOfAllDataController->calculateTotalVisitors();

        $services = service1::orderBy('created_at', 'desc')->paginate(10);
        $offices = offices::all();


        if (View::exists('SuperAdmin.index')) {
            return view('SuperAdmin.index', compact('chart', 'totalOffices', 'totalStudents', 'totalClients', 'totalPersonnels', 'totalVisitors', 'services', 'offices'));
        } else {
            return abort(404);
        }
    }

    public function storageOfAllService()
    {
        if (View::exists('SuperAdmin.storageOfAllService')) {
            $offices = offices::all();
            $services = Service1::where('archive', 1)
                ->paginate(10);
            return view('SuperAdmin.storageOfAllService', compact('services', 'offices'));
        } else {
            return abort(404);
        }
    }

    public function deleteService(Request $request, $serviceId)
    {
        // Find the CcQuestion by its ID
        $service = service1::find($serviceId);

        // Disable foreign key checks temporarily
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        try {
            // Delete the services and its associated requirements
            $service->delete();

            // You can also delete its associated Services
            $service->checklistRequirements1()->delete();
            $service->checklistRequirements2()->delete();


            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            return redirect()->route('Admin')->with('message', 'Citizen Charter Question successfully deleted :) .');
        } catch (\Exception $e) {
            // Handle any exceptions, e.g., log the error
            return redirect()->route('Admin')->with('message', 'Error deleting Citizen Charter Question.');
        }
    }
    public function reportAdmin()
    {
        // Create an instance of the SumOfAllData controller
        $sumOfAllDataController = new SumOfAllData(); //import a controller
        $chart = new TotalClientSatisfaction; // this is a chart php
        $totalUsers = new TotalClientSatisfaction;
        $totalOffices = new TotalClientSatisfaction;
        $totalExternalService = new TotalClientSatisfaction;
        $totalInternalService = new TotalClientSatisfaction;
        // $totalServiceAvail = new TotalClientSatisfaction;

        // Call the calculateClientSatisfaction method to get the satisfaction data
        $satisfactionData = $sumOfAllDataController->calculateClientSatisfaction();
        $chart->labels(array_keys($satisfactionData));
        $chart->dataset('Total Client Satisfaction', 'pie', array_values($satisfactionData))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00', '#ED1C24', '#020100']);


        // Call the calculateClientCategory method to get the total of client category
        $TotalUser = $sumOfAllDataController->calculateClientCategory();
        $totalUsers->labels(array_keys($TotalUser));
        $totalUsers->dataset('Number Of Clients By Category', 'bar', array_values($TotalUser))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // Call the calculatePerOfficeSurveyed method to get the total of surveyed per offices
        $TotalOfficesSurveyed = $sumOfAllDataController->calculatePerOfficeSurveyed();
        $totalOffices->labels(array_keys($TotalOfficesSurveyed));
        $totalOffices->dataset('Number Of Offices', 'bar', array_values($TotalOfficesSurveyed))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // Call the calculateExternalSerivices method to get the total of client category
        $TotalExternalService = $sumOfAllDataController->calculateExternalSerivices();
        $totalExternalService->labels(array_keys($TotalExternalService));
        $totalExternalService->dataset('External Services', 'bar', array_values($TotalExternalService))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // Call the calculateInternalSerivices method to get the total of client category
        $TotalInternalService = $sumOfAllDataController->calculateInternalSerivices();
        $totalInternalService->labels(array_keys($TotalInternalService));
        $totalInternalService->dataset('Internal Services', 'bar', array_values($TotalInternalService))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // $TotalServiceAvail = $sumOfAllDataController->calculatePerOfficeServiceSurveyed();


        if (View::exists('SuperAdmin.reportAdmin')) {
            return view('SuperAdmin.reportAdmin', compact('chart', 'totalUsers', 'totalOffices', 'totalExternalService', 'totalInternalService'));
        } else {
            return abort(404);
        }
    }
    public function filterReport(Request $request)
    {
        // dd($request);

        $request->validate([
            'date_from' => 'required|date',
            'date_to' => 'required|date|after_or_equal:date_from',
        ]);

        $sumOfAllDataController = new SumOfAllData(); //import a controller
        $totalOffices = new TotalClientSatisfaction;
        $totalUsers = new TotalClientSatisfaction;
        $chart = new TotalClientSatisfaction; // this is a chart php
        $totalExternalService = new TotalClientSatisfaction;
        $totalInternalService = new TotalClientSatisfaction;

        // Call the getCalculateClientSatisfaction method to get the satisfaction data
        $satisfactionData = $sumOfAllDataController->getCalculateClientSatisfaction($request);
        $chart->labels(array_keys($satisfactionData));
        $chart->dataset('Total Client Satisfaction', 'pie', array_values($satisfactionData))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00', '#ED1C24', '#020100']);

        // Call the getCalculateClientCategory method to get the total of client category
        $TotalUser = $sumOfAllDataController->getCalculateClientCategory($request);
        $totalUsers->labels(array_keys($TotalUser));
        $totalUsers->dataset('Number Of Clients By Category', 'bar', array_values($TotalUser))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // Call the getCalculatePerOfficeSurveyed method to get the total of surveyed per offices
        $getTotalOfficeSurveyed = $sumOfAllDataController->getCalculatePerOfficeSurveyed($request);
        $totalOffices->labels(array_keys($getTotalOfficeSurveyed));
        $totalOffices->dataset('Number Of Offices', 'bar', array_values($getTotalOfficeSurveyed))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // Call the calculateExternalSerivices method to get the total of client category
        $TotalExternalService = $sumOfAllDataController->getCalculateExternalSerivices($request);
        $totalExternalService->labels(array_keys($TotalExternalService));
        $totalExternalService->dataset('External Services', 'bar', array_values($TotalExternalService))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);

        // Call the calculateExternalSerivices method to get the total of client category
        $TotalInternalService = $sumOfAllDataController->getCalculateInternalSerivices($request);
        $totalInternalService->labels(array_keys($TotalExternalService));
        $totalInternalService->dataset('Internal Services', 'bar', array_values($TotalExternalService))
            ->backgroundColor(['#FEC500', '#F2A359', '#8B8B8D', '#FC2F00']);



        // $TotalServiceAvail = $sumOfAllDataController->calculatePerOfficeServiceSurveyed($request);



        if (View::exists('SuperAdmin.reportAdmin')) {
            return view('SuperAdmin.reportAdmin', compact('chart', 'totalUsers', 'totalOffices', 'totalExternalService', 'totalInternalService'));
        } else {
            return abort(404);
        }
    }

    public function assessReport(Request $request)
    {
        //dd($request);
        $request->validate([
            'date_From' => 'required|date',
            'date_To' => 'required|date|after_or_equal:date_From',
        ]);
        $sumOfAllDataController = new SumOfAllData();
        $result = $sumOfAllDataController->getAllTotalServiceResult($request);
        $CsmReport = $sumOfAllDataController->getAllTheCcResult($request);
        $SqdResult = $sumOfAllDataController->getAllSQDResult($request);
        $ServiceRate = $sumOfAllDataController->totalServicesRate($request);

        //dd($ServiceRate);
        $totalServices = $result['totalServices'];
        $totalServiceTransaction = $result['totalServiceTransaction'];
        $multiplyByHundred = $result['multiplyByHundred'];
        // $serviceDataWithCode = $result['serviceDataWithCode'];
        $servicesData = $result['servicesData'];



        $cc1Report = $CsmReport['cc1Data'];
        $cc2Report = $CsmReport['cc2Data'];
        $cc3Report = $CsmReport['cc3Data'];

        $cc1Percentage = $CsmReport['cc1Percentage'];
        $cc2Percentage = $CsmReport['cc2Percentage'];
        $cc3Percentage = $CsmReport['cc3Percentage'];



        $pdf = FacadePdf::loadView('pdf.totalResult', compact('servicesData',  'totalServices', 'totalServiceTransaction', 'multiplyByHundred', 'cc1Report', 'cc2Report', 'cc3Report', 'cc1Percentage', 'cc2Percentage', 'cc3Percentage', 'SqdResult', 'ServiceRate'));
        return $pdf->stream('Result.pdf');
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
            'instruction' => '',
            'cc_questions' => '',
        ]);
        try {
            // Store the instruction
            Cc_Instruction::create([
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

    public function EditingCcQuestionsPage()
    {
        $ccInstruction = Cc_Instruction::all();
        $ccQuestion = Cc_Questions::all();
        $SrvyInstruction = SurveyInstruction::all();
        $SrvyComment = SurveyComment::all();
        $SrvyQuestion = SurveyQuestion::all();


        if (View::exists('SetSurvey.CcAndCssStorage')) {
            return view('SetSurvey.CcAndCssStorage', compact('ccInstruction', 'ccQuestion', 'SrvyInstruction', 'SrvyComment', 'SrvyQuestion'));
        } else {
            return abort(404);
        }
    }

    public function EditingCcInstruction($id)
    {
        $ccInstruction = Cc_Instruction::find($id);

        if (View::exists('SetSurvey.editingCcInstruction')) {
            return view('SetSurvey.editingCcInstruction', ['ccInstruction' => $ccInstruction]);
        } else {
            return abort(404);
        }
    }
    public function saveCcInstruction(Request $request, $id)
    {
        $ccInstruction = Cc_Instruction::findOrFail($id);
        $this->validate($request, [
            'instruction' => 'required|string',
        ]);

        $ccInstruction->update([
            'instruction' => $request->instruction,
        ]);

        return redirect()->route('CcAndCssPage')->with('message', 'Service updated successfully.');
    }
    public function deleteInstructionCc(Request $request, $id)
    {
        //dd($request);
        $IdDelete = Cc_Questions::find($id);
        $IdDelete->delete();
        return redirect()->route('CcAndCssPage')->with('message', 'Citizen Charter Instruction successfully deleted :) .');
    }

    public function EditingCcQuestion($id)
    {
        $ccQuestion = Cc_Questions::find($id);
        $ccQuestion = Cc_Questions::with('CcOption')->find($id);

        if (View::exists('SetSurvey.editingCcQuestion')) {
            return view('SetSurvey.editingCcQuestion', ['ccQuestion' => $ccQuestion]);
        } else {
            return abort(404);
        }
    }

    public function updateCcQuestion(Request $request, $id)
    {
        $ccQuestion = Cc_Questions::find($id);

        // Validate the request data
        $this->validate($request, [
            'cc_questions' => '',
            'cc_questions.' . $id . '.question' => 'required|string', // Validate the question
            'cc_questions.' . $id . '.options' => 'array', // Validate options array
        ]);

        // Update the question's description
        $ccQuestion->update([
            'description' => $request->input('cc_questions')[$id]['question'],
        ]);

        // Get the existing options associated with the question
        $existingOptions = $ccQuestion->CcOption;

        // Get the options data from the request
        $optionsData = $request->input('cc_questions')[$id]['options'];

        // Check if existingOptions is not null
        if ($existingOptions) {
            // Loop through the existing options and update them
            foreach ($existingOptions as $index => $option) {
                if (isset($optionsData[$index])) {
                    $option->update(['option_text' => $optionsData[$index]]);
                }
            }
        }
        return redirect()->route('CcAndCssPage')->with('message', 'Citizen Charter Question and Options updated successfully.');
    }

    public function deleteCcQuestion(Request $request, $id)
    {
        // Find the CcQuestion by its ID
        $ccQuestion = Cc_Questions::find($id);

        // Disable foreign key checks temporarily
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        try {
            // Delete the CcQuestion and its associated CcOptions
            $ccQuestion->delete();

            // You can also delete its associated CcOptions
            $ccQuestion->CcOption()->delete();


            // Re-enable foreign key checks
            DB::statement('SET FOREIGN_KEY_CHECKS=1');

            return redirect()->route('CcAndCssPage')->with('message', 'Citizen Charter Question successfully deleted :) .');
        } catch (\Exception $e) {
            // Handle any exceptions, e.g., log the error
            return redirect()->route('CcAndCssPage')->with('message', 'Error deleting Citizen Charter Question.');
        }
    }
    public function editCcQuestion()
    {
        $ccInstruction = Cc_Instruction::all();
        $ccQuestions = Cc_Questions::with('CcOption')->get();
        if (View::exists('SetSurvey.editCcQuestion')) {
            return view('SetSurvey.editCcQuestion', compact('ccInstruction', 'ccQuestions'));
        } else {
            return abort(404);
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
            'srvy_qstn' => '',
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

    public function editPageSrvyInstruction($id)
    {

        $SrvyInstruction = SurveyInstruction::find($id);

        if (View::exists('SetSurvey.editingCssInstruction')) {
            return view('SetSurvey.editingCssInstruction', compact('SrvyInstruction'));
        } else {
            return abort(404);
        }
    }
    public function saveSrvyInstruction(Request $request, $id)
    {
        $SrvyInstruction = SurveyInstruction::find($id);

        $this->validate($request, [
            'instruction_SQstn' => ['required'],
        ]);
        $SrvyInstruction->update([
            'instruction' => $request->input('instruction_SQstn')
        ]);
        return redirect()->route('CcAndCssPage')->with('message', 'Client Satisafaction Survey Instruction successfully updated :) .');
    }
    public function deleteSrvyInstruction(Request $request, $id)
    {
        //dd($id);
        $IdDelete = SurveyInstruction::find($id);
        $IdDelete->delete();
        return redirect()->route('CcAndCssPage')->with('message', 'Client Satisafaction Survey  Instruction successfully deleted :) .');
    }

    public function editPageSrvyQuestion($id)
    {
        $SrvyQuestion = SurveyQuestion::find($id);

        if (View::exists('SetSurvey.editingCssQuestion')) {
            return view('SetSurvey.editingCssQuestion', compact('SrvyQuestion'));
        } else {
            return abort(404);
        }
    }
    public function saveSrvyQuestion(Request $request, $id)
    {
        $SrvyQuestion = SurveyQuestion::find($id);

        $this->validate($request, [
            'srvy_qstn' => 'required',
        ]);
        $SrvyQuestion->update([
            'questions' => $request->input('srvy_qstn')
        ]);
        return redirect()->route('CcAndCssPage')->with('message', 'Client Satisafaction Survey Question successfully updated :) .');
    }
    public function deleteSrvyQuestion(Request $request, $id)
    {
        //dd($id);
        $IdDelete = SurveyQuestion::find($id);
        $IdDelete->delete();
        return redirect()->route('CcAndCssPage')->with('message', 'Client Satisafaction Survey  Question successfully deleted :) .');
    }

    public function editPageSrvyComment($id)
    {
        $SrvyComment = SurveyComment::find($id);

        if (View::exists('SetSurvey.editingCssComment')) {
            return view('SetSurvey.editingCssComment', compact('SrvyComment'));
        } else {
            return abort(404);
        }
    }
    public function saveSrvyComment(Request $request, $id)
    {
        $SrvyComment = SurveyComment::find($id);

        $this->validate($request, [
            'comment' => 'required',
        ]);
        $SrvyComment->update([
            'comment' => $request->input('comment')
        ]);
        return redirect()->route('CcAndCssPage')->with('message', 'Client Satisafaction Survey Comment successfully updated :) .');
    }
    public function deleteSrvyComment(Request $request, $id)
    {
        dd($id);
        $IdDelete = SurveyComment::find($id);
        $IdDelete->delete();
        return redirect()->route('CcAndCssPage')->with('message', 'Client Satisafaction Survey  Comment successfully deleted :) .');
    }
}
