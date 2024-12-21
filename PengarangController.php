<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class pengarangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_pen = DB::table('pengarang') //join tabel dengan Query Builder Laravel
        // ->join('buku', 'buku.id', '=', 'pengarang.idbuku')
        // ->join('penerbit', 'penerbit.id', '=', 'pengarang.idpenerbit')
        // ->join('kategori', 'kategori.id', '=', 'pengarang.idkategori')
        ->select('pengarang.*')
        ->get();
        return view('pengarang.index',compact('ar_pen'));     
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengarang.c');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate(
            [
            'nama'=>'required',
            'email'=>'required|max:50|regex:/(.+)@(.+)\.(.+)/i',
            'hp'=>'required|numeric',
            'foto'=>'required'
            ],
            [
                'nama.required'=>'Nama Wajib di Isi',
                'email.required'=>'Email Wajib di Isi',
                'email.regex'=>'Harus berformat email',
                'hp.required'=>'Harus Berupa Angka',
                'foto.required'=>'Gambar harus Berupa JPG.,PNG.,SVG.'
            ],  
            );
        DB::table('pengarang')->insert(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                'foto'=>$request->foto
            ]
            );
            //landing page
            return redirect()->route('pengarang.index')->with('success','Data pengarang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ar_pen = DB::table('pengarang') //join tabel dengan Query Builder Laravel
        ->select('pengarang.*')
        ->where('pengarang.id','=',$id)
        ->get();
        return view('pengarang.d',compact('ar_pen')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         //mengarahkan ke halaman form edit buku
          $data = DB::table('pengarang')
          ->where('id','=',$id)->get();
          return view('pengarang.e',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        DB::table('pengarang')->where('id','=',$id)->update(
            [
                'nama'=>$request->nama,
                'email'=>$request->email,
                'hp'=>$request->hp,
                'foto'=>$request->foto,
            ]
            );
            //landing page
            return redirect('/pengarang'.'/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //menghapus data
        DB::table('pengarang')->where('id',$id)->delete();
        return redirect('/pengarang');
    }
}
