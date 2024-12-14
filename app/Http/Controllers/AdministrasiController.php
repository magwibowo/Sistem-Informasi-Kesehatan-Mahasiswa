<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'dokter') {
            //tampilkan administrasi sesuai dokter yang login
            $data['administrasi'] = \App\Models\Administrasi::where('dokter_id', auth()->user()->dokter->id)
                ->paginate(50);
        } else {
            $data['administrasi'] = \App\Models\Administrasi::orderBy('tanggal', 'desc')->paginate(50);
        }

        $data['judul'] = 'Data Administrasi';
        return view('administrasi_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasiData = $request->validate([
            'tanggal' => 'required',
            'keluhan' => 'required',
        ]);
        $kodeAdm = \App\Models\Administrasi::orderBy('id', 'desc')->first();
        $kode = 'ADM0001';
        if ($kodeAdm) {
            $kode = 'ADM' . sprintf('%04d', $kodeAdm->id + 1);
        }
        $adm = new \App\Models\Administrasi();
        $adm->kode_administrasi = $kode;
        $adm->tanggal = $request->tanggal;
        $adm->keluhan = strip_tags($request->keluhan);
        $adm->save();
        flash('Data sudah disimpan')->success();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['administrasi'] = \App\Models\Administrasi::findOrfail($id);
        $data['list_dokter'] = \App\Models\Dokter::selectRaw("id, concat(kode_dokter, ' - ', nama_dokter) as tampil")->pluck('tampil', 'id');
        return view('administrasi_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasiData = $request->validate([
            'diagnosis' => 'required',
        ]);
        $administrasi = \App\Models\Administrasi::findOrfail($id);
        $administrasi->diagnosis = strip_tags($request->diagnosis);
        $administrasi->status = 'selesai';
        $administrasi->save();
        flash('Data sudah disimpan')->success();
        return redirect('/administrasi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $administrasi = \App\Models\Administrasi::findOrfail($id);
        $administrasi->delete();
        flash('Data sudah dihapus')->success();
        return back();
    }
}