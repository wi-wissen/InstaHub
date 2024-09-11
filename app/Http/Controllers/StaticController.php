<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use Illuminate\Http\Request;

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

    public function redirectDocumentation(Request $request, $generation)
    {
        $url = config('hub.generations.'.$generation.'.url');
        
        if(! RequestHub::isHub() && config('hub.generations.'.$generation.'.secret')) {
            // add hash if a teacher and secret given
            $secret = config('hub.generations.'.$generation.'.secret');
            $timestamp = time();
            $hash = hash_hmac('sha256', $timestamp, $secret);
            $url .= '?timestamp=' . $timestamp . '&hash=' . $hash;
        }

        $returnUrl = $request->input('return_url', false);
        if ($returnUrl) {
            $url .= '&return_url=' . urlencode($returnUrl);
        }
                
        return redirect($url);
    }
}
