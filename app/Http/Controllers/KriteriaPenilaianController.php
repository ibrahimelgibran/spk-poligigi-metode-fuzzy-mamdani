<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KriteriaPenilaian;
use Barryvdh\DomPDF\Facade\Pdf;

class KriteriaPenilaianController extends Controller
{
    public function downloadPdf()
    {
        $data = KriteriaPenilaian::orderBy('nilai_akhir', 'desc')->get();

        $pdf = Pdf::loadView('kriteria_penilaian_pdf', compact('data'));
        return $pdf->download('kriteria_penilaian.pdf');
    }
}
