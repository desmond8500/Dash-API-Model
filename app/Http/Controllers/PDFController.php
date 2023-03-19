<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function exportPlanning()
    {
        $data = [];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('_tabler.pdf.planning_pdf', $data);

        return $pdf->stream('Planning.pdf');
    }
}
