<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;    

public function generatePDF()
{
    $data = [
        // Data yang ingin Anda tampilkan di PDF
    ];

    $pdf = PDF::loadView('surat', $data);

    return $pdf->download('surat_bebas_pustaka.pdf');
}