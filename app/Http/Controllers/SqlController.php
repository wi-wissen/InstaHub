<?php

namespace App\Http\Controllers;

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
        return view('admin.select');
    }
}
