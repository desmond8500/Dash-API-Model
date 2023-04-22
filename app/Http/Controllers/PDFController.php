<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Entreprise;
use App\Models\Fiche;
use App\Models\Report;
use App\Models\ReportSection;
use App\Models\System;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function exportPlanning(Request $request)
    {
        $carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);
        $carbon2 = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);

        $semaine =  array(
            'debut' => $carbon->startOfWeek()->dayName . ' ' . $carbon->startOfWeek()->day . ' ' . $carbon->startOfWeek()->monthName . ' ' . $carbon->startOfWeek()->year,
            'fin' => $carbon->endOfWeek()->subDay(2)->dayName . ' ' . $carbon->endOfWeek()->subDay(2)->day . ' ' . $carbon->endOfWeek()->subDay(2)->monthName . ' ' . $carbon->endOfWeek()->subDay(2)->year,
        );

        $start = $carbon->startOfWeek()->subWeek();
        $end = $carbon2->startOfWeek()->addWeek()->subDay();

        $data = [
            'buildings' => Building::where('projet_id', $request->projet_id)->get(),
            'carbon' => $carbon,
            'semaine' => $semaine,
            'company' => 'Building Comfort Senegal',
            'projet' => 'DDSC',
            "period" => CarbonPeriod::create($start, '1 days', $end),
        ];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('_tabler.pdf.planning_pdf', $data);

        return $pdf->stream('Planning.pdf');
    }

    public function export_report(Request $request)
    {
        $carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);

        $report = Report::find($request->report_id);

        $data = [
            'doc_title' => "Planning Général BCS",
            // 'doc_title' => $report->type(),
            'report' => $report,
            'logo' => 'img/BMW_logo_(gray).svg.png',
            'carbon' => $carbon,
            'entreprise' => Entreprise::first(),
            'company' => 'Building Comfort Senegal',
            'sections' => ReportSection::where('report_id', $request->report_id)->orderBy('order')->get(),
        ];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('_tabler.pdf.report_pdf', $data);

        return $pdf->stream($report->type()." - ".$report->projet->name." - ". $report->projet->client->name);
    }

    public function export_avancements(Request $request)
    {
        $carbon = Carbon::now()->settings([
            'locale' => 'fr_FR',
            'timezone' => 'Africa/Dakar',
        ]);

        $semaine =  array(
            'debut' => $carbon->startOfWeek()->dayName . ' ' . $carbon->startOfWeek()->day . ' ' . $carbon->startOfWeek()->monthName . ' ' . $carbon->startOfWeek()->year,
            'fin' => $carbon->endOfWeek()->subDay(2)->dayName . ' ' . $carbon->endOfWeek()->subDay(2)->day . ' ' . $carbon->endOfWeek()->subDay(2)->monthName . ' ' . $carbon->endOfWeek()->subDay(2)->year,
        );

        $data = [
            'logo' => 'img/BMW_logo_(gray).svg.png',
            'doc_title' => "Planning BCS (SSI-SE-GRMS-BMS) V4",
            'carbon' => $carbon,
            'semaine' => $semaine,
            'buildings' => Building::where('projet_id', $request->projet_id)->get(),
            'systems' => System::where('projet_id', $request->projet_id)->get(),
        ];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('_tabler.pdf.export_avancements', $data);

        return $pdf->stream("Avancement.pdf");
    }

    public function export_fiche_travaux()
    {
        # code...
    }
    public function export_fiche_installation()
    {
        # code...
    }
    public function export_fiche_livraison()
    {
        # code...
    }
    public function export_pdf_galaxy(Request $request)
    {
        $data = [
            'fiche' => Fiche::find($request->fiche_id),
            'societe' => Entreprise::first(),
        ];
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('_tabler.pdf.export_pdf_galaxy', $data);

        return $pdf->stream("Avancement.pdf");
    }
}
