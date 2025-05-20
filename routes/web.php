<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KriteriaPenilaianController;

Route::get('/kriteria-penilaian/pdf', [KriteriaPenilaianController::class, 'downloadPdf'])->name('kriteria.penilaian.pdf');

Route::get('/', function () {
    return redirect('/admin');
});
