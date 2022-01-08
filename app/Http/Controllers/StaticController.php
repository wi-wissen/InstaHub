<?php

namespace App\Http\Controllers;

class StaticController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function landing()
    {
        return view('landing');
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
