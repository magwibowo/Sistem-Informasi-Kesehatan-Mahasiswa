<?php

namespace App\Http\Controllers;

use App\Models\PanduanKesehatan;

class PanduanKesehatanController extends Controller
{


    public function index()
    {
        // Ambil semua data panduan
        $panduan = PanduanKesehatan::all();


        // Kirim data ke view 'medilab.medilab'
        return view('layouts.medilab', compact('panduan'));
    }
}
