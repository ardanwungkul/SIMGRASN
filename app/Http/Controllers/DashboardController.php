<?php

namespace App\Http\Controllers;

use App\Models\Config;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $config = Config::where('thnbln', session('thnbln'))->first();
        return view('dashboard', compact('config'));
    }
}
