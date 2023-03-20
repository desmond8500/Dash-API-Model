<?php

namespace App\Http\Controllers;

use App\Models\Building;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function exportPlanning(Request $request)
    {
        $carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);

        $semaine =  array(
            'debut' => $carbon->startOfWeek()->dayName . ' ' . $carbon->startOfWeek()->day . ' ' . $carbon->startOfWeek()->monthName . ' ' . $carbon->startOfWeek()->year,
            'fin' => $carbon->endOfWeek()->dayName . ' ' . $carbon->endOfWeek()->day . ' ' . $carbon->endOfWeek()->monthName . ' ' . $carbon->endOfWeek()->year,
        );

        $data = [
            'buildings' => Building::where('projet_id', $request->projet_id)->get(),
            'carbon' => $carbon,
            'semaine' => $semaine,
            'company' => 'Building Comfort Senegal',
            'projet' => 'DDSC',
        ];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('_tabler.pdf.planning_pdf', $data);

        return $pdf->stream('Planning.pdf');
    }
}
