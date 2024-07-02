<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function welcome()
    {
        return view('welcome');
    }

    public function noad()
    {
        return view('errors.no_ad');
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
