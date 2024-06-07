<?php

namespace App\Http\Controllers\Timetrax;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('timetrax/dashboard');
    }
}
