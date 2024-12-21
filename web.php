<?php

use Illuminate\Support\Facades\Route;

//memanggil santri controller
use App\Http\Controllers\SantriController;

//memanggil pegawai controller
use App\Http\Controllers\PegawaiController;

//memanggil anggota controller
use App\Http\Controllers\anggotacontroller;

//memanggil controller perpustakaan
use App\Http\Controllers\pengarangcontroller;
use App\Http\Controllers\penerbitcontroller;
use App\Http\Controllers\kategoricontroller;
use App\Http\Controllers\bukucontroller;

//memanggil controller 
use App\Http\Controllers\dosencontroller;
use App\Http\Controllers\jurusancontroller;
use App\Http\Controllers\mahasantricontroller;
use App\Http\Controllers\matkulcontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/salam', function () {
    return "Assalamu'alaikum, Selamat Belajar Laravel Di PeTIK Jombang Angkatan III";
});

//routing parameter
Route::get('/pegawai/{nama}/{divisi}', function ($nama,$divisi) {
    return "Nama Pegawai : ".$nama."<br>Depatemen : ".$divisi;
});

//tambahkan routes baru di routes/web.php
Route::get('/kabar', function () {
    return view('kondisi');
});

Route::get('/santri',
[SantriController::class, 'datasantri']
);

//route hello (pertemuan 4)
Route::get('/hello', function () {
    return view('hello',['name'=>'inaya']);
});

Route::get('/nilai', function () {
    return view('nilai');
});

Route::get('/daftarnilai', function () {
    return view('daftar_nilai');
});

Route::get('/templating', function ()
{ return view('layouts.index');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/pegawai',
    [PegawaiController::class, 'index']
    )->name('pegawai.index');

Route::get('/pegawai/create',
    [PegawaiController::class, 'create']
    )->name('pegawai.create');

Route::post('/pegawai',
    [PegawaiController::class, 'store']
    )->name('pegawai.store');

Route::get('/anggota',
    [anggotacontroller::class, 'index']
    )->name('anggota.index');

Route::get('/anggota/create',
    [anggotacontroller::class, 'create']
    )->name('anggota.create');

Route::post('/anggota',
    [anggotacontroller::class, 'store']
    )->name('anggota.store');
    
Route::resource('pegawai', PegawaiController::class);

Route::resource('pengarang', pengarangcontroller::class);
Route::resource('penerbit', penerbitcontroller::class);
Route::resource('kategori', kategoricontroller::class);
Route::resource('buku', bukucontroller::class);

Route::resource('dosen', dosencontroller::class);
Route::resource('jurusan', jurusancontroller::class);
Route::resource('mahasantri', mahasantricontroller::class);
Route::resource('matkul', matkulcontroller::class);



Route::get('bukupdf',[BukuController::class, 'bukuPDF']);