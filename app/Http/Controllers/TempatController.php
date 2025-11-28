<?php

namespace App\Http\Controllers;

use App\Models\Tempat;
use App\Models\Kategori;
use Illuminate\Http\Request;

class TempatController extends Controller
{
    // Menampilkan daftar tempat dengan filter dan search
    public function index(Request $request)
    {
        $kategori = Kategori::all(); // Ambil semua kategori untuk dropdown filter

        $query = Tempat::with('kategori')->latest();

        // Filter berdasarkan nama
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        // Filter berdasarkan kategori
        if ($request->kategori) {
            $query->where('kategori_id', $request->kategori);
        }

        $tempats = $query->get();

        return view('tempat.index', compact('tempats', 'kategori'));
    }

    // Form tambah tempat
    public function create()
    {
        $kategoris = Kategori::all();
        return view('tempat.create', compact('kategoris'));
    }

    // Simpan tempat baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'required|image|max:2048',
            'judul' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        $fotoPath = $request->file('foto')->store('foto', 'public');

        Tempat::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kategori_id' => $request->kategori_id,
            'foto' => $fotoPath,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tempat.index')->with('success', 'Data Tempat berhasil ditambahkan.');
    }

    // Form edit tempat
    public function edit(Tempat $tempat)
    {
        $kategoris = Kategori::all();
        return view('tempat.edit', compact('tempat','kategoris'));
    }

    // Update data tempat
    public function update(Request $request, Tempat $tempat)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'kategori_id' => 'required|exists:kategoris,id',
            'foto' => 'nullable|image|max:2048',
            'judul' => 'nullable|string',
            'keterangan' => 'nullable|string',
        ]);

        // Jika ada foto baru
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('foto', 'public');
            $tempat->foto = $fotoPath;
        }

        $tempat->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('tempat.index')->with('success', 'Data Tempat berhasil diupdate.');
    }

    // Hapus tempat
    public function destroy(Tempat $tempat)
    {
        if($tempat->foto){
            // Hapus file foto lama
            \Storage::disk('public')->delete($tempat->foto);
        }

        $tempat->delete();
        return redirect()->route('tempat.index')->with('success', 'Data Tempat berhasil dihapus.');
    }
}
