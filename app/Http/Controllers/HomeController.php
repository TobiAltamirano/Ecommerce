<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function service() {
        
        $services = Service::all();

        return view('home', ['services' => $services]);
    }
}