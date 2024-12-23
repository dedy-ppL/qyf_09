<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; //tambahan

class mahasantricontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_mahasantri = DB::table('mahasantri') //join tabel dengan Query Builder Laravel
        ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
        ->join('matkul', 'matkul.id', '=', 'dosen.matakuliah_id')
        ->select('mahasantri.*', 'dosen.nama AS dos', 'jurusan.nama AS pen','matkul.nama AS mt')
        ->get();
        return view('mahasantri.index',compact('ar_mahasantri'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mahasantri.c');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        DB::table('mahasantri')->insert(
            [
                'nama'=>$request->nama,
                'nim'=>$request->nim,
                'jurusan_id'=>$request->jurusan_id,
                'dosen_id'=>$request->dosen_id,
            ]
            );
            //landing page
            return redirect()->route('mahasantri.index')->with('success','Data mahasantri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_mahasantri = DB::table('mahasantri') //join tabel dengan Query Builder Laravel
        ->join('dosen', 'dosen.id', '=', 'mahasantri.dosen_id')
        ->join('jurusan', 'jurusan.id', '=', 'mahasantri.jurusan_id')
        ->join('matkul', 'matkul.id', '=', 'dosen.matakuliah_id')
        ->select('mahasantri.*', 'dosen.nama AS dos', 'jurusan.nama AS pen','matkul.nama AS mt')
        ->where('mahasantri.id','=',$id)
        ->get();
        return view('mahasantri.detail',compact('ar_mahasantri'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
