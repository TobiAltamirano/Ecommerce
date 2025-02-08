<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function showServices()
    {
        $comprasPorJuego = DB::table('users_has_services')
            ->join('services', 'users_has_services.service_id', '=', 'services.id')
            ->select('services.title', DB::raw('count(*) as total'))
            ->groupBy('services.title')
            ->get();

        return view('abm.dashboardServices', compact('comprasPorJuego'));
    }

    public function showUsers()
    {
        // Obtenemos la cantidad de compras por usuario
        $comprasPorUsuario = DB::table('users_has_services')
            ->join('users', 'users_has_services.user_id', '=', 'users.id')
            ->select('users.name', DB::raw('count(*) as total_compras'))
            ->groupBy('users.name')
            ->get();

        return view('abm.dashboardUsers', compact('comprasPorUsuario'));
    }
}