<?php

use App\Http\Controllers\Administrator\UsersController;
use App\Http\Controllers\Administrator\PengajuanController as AdministratorPengajuanController;
use App\Http\Controllers\Administrator\PrintController;
use App\Http\Controllers\Administrator\RekapController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Pustakawan\BiodataController;
use App\Http\Controllers\Pustakawan\PengajuanController;
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

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfilController::class, 'profil']);
    Route::put('/profil/info/update', [ProfilController::class, 'profil_info_update']);
    Route::put('/profil/password/update', [ProfilController::class, 'profil_password_update']);
});

require __DIR__ . '/auth.php';

Route::middleware('auth', 'cekRole:Administrator')->group(function () {
    Route::auto('/administrator/users', UsersController::class);
    Route::auto('/administrator/pengajuan', AdministratorPengajuanController::class);
    Route::auto('/administrator/rekap', RekapController::class);
    Route::auto('/administrator/print', PrintController::class);

    Route::get('/administrator/cek/print', function () {
        return view('administrator.file.print');
    });
});

Route::middleware('auth', 'cekRole:Pustakawan')->group(function () {
    Route::auto('pustakawan/biodata', BiodataController::class);
    Route::auto('pustakawan/pengajuan', PengajuanController::class);
    Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
    Route::get('pustakawan/suratPDF/{id}', [PengajuanController::class, 'suratPDF']);


    // Route::get('/generate-pdf', 'PdfController@generatePDF');
    // Route::post('/send-data-to-admin', 'PengajuanController@sendDataToAdmin')->middleware('auth')->name('send-data-to-admin');

});
