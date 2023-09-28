<?php

namespace App\Http\Controllers;

use App\Models\clientCategory;
use App\Models\clientInfo;
use App\Models\offices;
use App\Models\studentInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

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

            return view('ClientSide.citizenCharter');
        } else {
            return abort(404);
        }
    }
    public function showClientSurvey()
    {

        if (View::exists('ClientSide.clientSurvey')) {
            $clientTypes = clientCategory::all();
            $officeTypes = offices::all();
            return view('ClientSide.clientSurvey', compact('clientTypes', 'officeTypes'));
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
        $validateClientType = DB::table('tbl_css_category')->pluck('idCategory')->toArray();
        $validateOffices = DB::table('tbloffices')->pluck('idOffices')->toArray();


        $validateData = $request->validate([
            'name_of_client' => 'required',
            'gender_of_client' => ['required', Rule::in(['male', 'female'])],
            'age_of_client' => 'required',
            'client_type' => ['required', Rule::in($validateClientType)],
            'date_of_transaction' => 'required|date',
            'offices' => ['required', Rule::in($validateOffices)],
            'service_availed' => 'required',
            'email_of_client' => ''

        ]);

        //store the data in the database
        $UserData = [
            'name' => $validateData['name_of_client'],
            'sex' => $validateData['gender_of_client'],
            'age' => $validateData['age_of_client'],
            'idCategoryFk' => $validateData['client_type'],
            'dateOfTransaction' => $validateData['date_of_transaction'],
            'idOfficeOrigin' => $validateData['offices'],
            'purpose' => $validateData['service_availed'],
            'emailAdd' => $validateData['email_of_client'],
        ];
        clientInfo::create($UserData);
        return redirect('/home/clientSurvey');
    }

    public function surveySecurity()
    {
        if (View::exists('ClientSide.clientSurveySecurity')) {

            return view('ClientSide.clientSurveySecurity',);
        } else {
            return abort(404);
        }
    }
}
