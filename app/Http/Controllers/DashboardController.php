<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use App\Models\Kategori;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTempat   = Tempat::count();
        $totalKategori = Kategori::count();

        $recentFoto = Tempat::whereNotNull('foto')
                            ->latest()
                            ->take(6)
                            ->get();

        return view('dashboard.index', compact('totalTempat', 'totalKategori', 'recentFoto'));
    }
}
