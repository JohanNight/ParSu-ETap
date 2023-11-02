<?php

namespace App\Http\Controllers;

use App\Models\clientInfo;
use App\Models\service1;
use Illuminate\Http\Request;

class SumOfDatasController extends Controller
{
    //

    public function getTotalAnswerePerService()
    {
        $surveyData = clientInfo::all(); // retrieve all survey data
        $services = service1::all();
    }
}
