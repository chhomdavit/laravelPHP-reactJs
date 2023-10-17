<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
