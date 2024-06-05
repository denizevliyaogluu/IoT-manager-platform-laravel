<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Devices;

class DashboardController extends Controller
{

    public function index()
    {
        $devices = Devices::all();
        $devices = Devices::withCount('deviceData')->latest()->take(5)->get();
        return view('index', compact('devices'));
    }

   
}
