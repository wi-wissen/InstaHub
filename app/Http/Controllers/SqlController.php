<?php

namespace App\Http\Controllers;

use App\Facades\RequestHub;
use Illuminate\Routing\Controllers\HasMiddleware;

class SqlController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

    public function sql()
    {
        return view('admin.sql');
    }

    public function selectGui()
    {
        if (RequestHub::query_level() != 'gui' && RequestHub::query_level() != 'ai') {
            abort(403);
        }

        return view('admin.select');
    }

    public function sqlAi()
    {
        if (RequestHub::query_level() != 'ai') {
            abort(403);
        }

        return view('admin.ai');
    }
}
