<?php

namespace App\Http\Controllers;

use App\Models\Cc_Instruction;
use App\Models\Cc_Questions;
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
use App\Models\SurveyComment;
use App\Models\SurveyInstruction;
use App\Models\SurveyQuestion;

class clientController extends Controller
{
    //
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
            $service = service1::all();
            return view('ClientSide.citizenCharter', ['services' => $service]);
        } else {
            return abort(404);
        }
    }
    public function citizenDocument($id)
    {
        // Retrieve the main service1 record
        $service1 = Service1::find($id);
        $checklistRequirements1 = $service1->checklistRequirements1;
        $checklistRequirements2 = $service1->checklistRequirements2;

        $officeTypes = offices::all();

        $service1 = Service1::with('checklistRequirements1', 'checklistRequirements2')->find($id);
        if (View::exists('ClientSide.citizenDocument')) {
            return view('ClientSide.citizenDocument', compact('service1', 'officeTypes'));
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
    //     $temporaryCode = ClientCode::where('code', $code)->first();

    //     // Additional checks, if needed
    //     if ($temporaryCode) {
    //         return redirect()->route('ClientSurvey');
    //     }

    //     return back()->with('message', 'Error');
    // }
    public function checkSecurity(Request $request)
    {
        if ($request->has('srvy_keycode') && $this->isValidCode($request->input('srvy_keycode'))) {
            return redirect()->route('ClientSurvey');
        }

        return back()->with('message', 'Error');
    }
    public function isValidCode($code)
    {

        // Check if the code exists in the database
        $temporaryCode = ClientCode::where('code', $code)->first();
        // Additional checks, if needed
        if ($temporaryCode) {
            return true;
        }
        return false; // Code is invalid
    }
    public function showClientSurvey()
    {

        if (View::exists('ClientSide.clientSurvey')) {
            $clientTypes = clientCategory::all();
            $officeTypes = offices::all();
            $ccInstruction = Cc_Instruction::all();
            $ccQuestions = Cc_Questions::with('CcOption')->get();
            $SrvyInstruction = SurveyInstruction::all();
            $SrvyQuestion = SurveyQuestion::all();
            $SrvyComment = SurveyComment::all();
            $Service = service1::all();
            return view('ClientSide.clientSurvey', compact('clientTypes', 'officeTypes', 'ccInstruction', 'ccQuestions', 'SrvyInstruction', 'SrvyQuestion', 'SrvyComment', 'Service'));
        } else {
            return abort(404);
        }
    }
    //fetch the data from the database using user's query
    public function fetchData(Request $request)
    {
        $searchId = $request->input('searchId');
        $client = studentInformation::where('idClientInfo', $searchId)->first();
        if ($client) {
            return response()->json([
                'name' => $client->name,
                'gender' => $client->sex,
                'age' => $client->age,
                'category' => $client->category
                // Add more fields as needed
            ]);
        } else {
            return response()->json(['error' => 'Client not found'], 404);
        }
    }
    //store the survey data
    public function storeSurveyData(Request $request)
    {

        //dd($request);
        $validateClientType = DB::table('tbl_css_category')->pluck('idCategory')->toArray();
        $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();
        $services = DB::table('table_services1')->pluck('service_Title')->toArray();

        $validateData = $request->validate([
            'name_of_client' => 'required',
            'gender_of_client' => ['required', Rule::in(['male', 'female'])],
            'age_of_client' => 'required',
            'client_type' => ['required', Rule::in($validateClientType)],
            'date_of_transaction' => 'required|date',
            'offices' => ['required', Rule::in($validateOffices)],
            'service_availed' => ['required', Rule::in($services)],
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
            'suggestion_for_client' => ''

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
            'cc1' => $validateData['question1'],
            'cc2' => $validateData['question2'],
            'cc3' => $validateData['question3'],
            'sqd0' => $validateData['question-S2-Q1'],
            'sqd1' => $validateData['question-S2-Q2'],
            'sqd2' => $validateData['question-S2-Q3'],
            'sqd3' => $validateData['question-S2-Q4'],
            'sqd4' => $validateData['question-S2-Q5'],
            'sqd5' => $validateData['question-S2-Q6'],
            'sqd6' => $validateData['question-S2-Q7'],
            'sqd7' => $validateData['question-S2-Q8'],
            'sqd8' => $validateData['question-S2-Q9'],
            'comment' => $validateData['suggestion_for_client']
        ];
        clientInfo::create($UserData);
        return redirect('/home')->with('message', 'Thank you for your time :) ');
    }

    public function surveySecurity()
    {
        if (View::exists('ClientSide.clientSurveySecurity')) {

            return view('ClientSide.clientSurveySecurity',);
        } else {
            return abort(404);
        }
    }

    public function example()
    {
        if (View::exists('example.example1')) {

            return view('example.example1',);
        } else {
            return abort(404);
        }
    }
}
