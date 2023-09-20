<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

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
            return view('ClientSide.clientSurvey');
        } else {
            return abort(404);
        }
    }
}
