<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function exportPlanning()
    {
        $data = [];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('_tabler.pdf.planning_pdf', $data);

        // return PDF::loadView('posts.show', compact('post'))
        //     ->setPaper('a4', 'landscape')
        //     ->setWarnings(false)
        //     ->save(public_path("storage/documents/fichier.pdf"))
        //     ->stream();

        return $pdf->stream('Planning.pdf');
        // return $pdf->download('invoice.pdf');
    }
}
