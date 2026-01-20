<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use App\Models\Kategori;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics and recent documentation
     */
    public function index(): View
    {
        // Hitung total tempat
        $totalTempat = Tempat::count();

        // Hitung total kategori
        $totalKategori = Kategori::count();

        // Ambil 6 dokumentasi terbaru dengan foto
        $recentFoto = Tempat::with('kategori')
                            ->whereNotNull('foto')
                            ->latest()
                            ->take(6)
                            ->get();

        return view('dashboard.index', compact('totalTempat', 'totalKategori', 'recentFoto'));
    }
}
