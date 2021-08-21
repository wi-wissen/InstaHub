<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Schema;

use Auth;

class StaticController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function landingHub()
    {
        if(Auth::check()){
            return redirect('/home');
        }
        else{
            return view('welcome');
        }
    }

    public function landingMain()
    {
        if(Auth::check()){
            return redirect('/home');
        }
        else{
            return view('landing');
        }  
    }

    public function noad()
    {
        return view('errors.noad');   
    }

    /**
     * Show the business dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function business()
    {
        return view('business');
    }
}
