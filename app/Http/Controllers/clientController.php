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
}
