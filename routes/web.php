<?php

use App\Http\Controllers\LogoutController;
use App\Livewire\Admin\DaftarAnak;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\InputNilai;
use App\Livewire\Auth\Login;
use App\Livewire\Home;
use App\Livewire\Perkembangan;
use App\Livewire\ProfilAnanda;
use App\Models\Anak;
use Illuminate\Support\Facades\Route;

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

Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)->name('login');
});

Route::get('/', Home::class)->name('/');

Route::middleware('auth')->group(function () {
    Route::get('jejak-ananda', Perkembangan::class)->name('perkembangan-ananda');
    Route::get('profil-ananda', ProfilAnanda::class)->name('profil-ananda');
});

Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

// ADMIN
Route::middleware('admin')->group(function () {
    Route::get('dashboard', Dashboard::class)->name('dashboard');

    // CRUD ANAK
    Route::prefix('anak')->group(function () {
        Route::get('daftar-anak', \App\Livewire\Admin\Anak\DaftarAnak::class)->name('daftar-anak');
        Route::get('create-anak', \App\Livewire\Admin\Anak\CreateAnak::class)->name('create-anak');
        Route::get('edit/{nama_lengkap}', \App\Livewire\Admin\Anak\UpdateAnak::class)->name('edit');
        Route::get('detail/{nama_lengkap}', \App\Livewire\Admin\Anak\DetailAnak::class)->name('detail');
        Route::get('orang-tua', \App\Livewire\Admin\OrangTua::class)->name('orang-tua');
    });

    // CRUD NILAI
    Route::prefix('nilai')->group(function () {
        Route::get('daftar-nilai', \App\Livewire\Admin\Nilai\DaftarNilai::class)->name('daftar-nilai');
        Route::get('detail-nilai', \App\Livewire\Admin\Nilai\DetailNilaiAnak::class)->name('detail-nilai');
        Route::get('input-nilai', \App\Livewire\Admin\Nilai\InputNilai::class)->name('input-nilai');
        Route::get('update-nilai', \App\Livewire\Admin\Nilai\UpdateNilaiAnak::class)->name('update-nilai');
    });
});
