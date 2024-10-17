<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class SqlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function sql()
    {
        return view('admin.sql');
    }

    public function selectGui()
    {
        if(RequestHub::query_level() != 'gui' && RequestHub::query_level() != 'ai') {
            abort(403);
        }

        return view('admin.select');
    }

    public function sqlAi()
    {
        if(RequestHub::query_level() != 'ai') {
            abort(403);
        }

        return view('admin.ai');
    }
}
