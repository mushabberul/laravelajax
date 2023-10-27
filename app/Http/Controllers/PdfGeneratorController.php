<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfGeneratorController extends Controller
{
    public function pdfGenerator()
    {
        $data = 'Testing PDF';
        $pdf = Pdf::loadView('invoice.invoice', compact('data'));
        return $pdf->stream('invoice.pdf');
    }
}
