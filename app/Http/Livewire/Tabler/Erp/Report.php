<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Report as ModelsReport;
use App\Models\ReportSection;
use Livewire\Component;
use Livewire\WithFileUploads;

class Report extends Component
{
    public $rerport, $report_id, $report_form=false, $breadcrumbs;
    public $objet, $description = '', $date, $type = 1;

    use WithFileUploads;
    protected $listeners = ['reload'=> 'render'];

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='';

    public function mount($report_id)
    {
        $this->report_id = $report_id;
        $this->report = ModelsReport::find($report_id);
        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->report->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->report->projet->client->id])),
            array('name' => $this->report->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->report->projet->id])),
            array('name' => 'Rapport', 'route' => route('tabler.report', ['report_id' => $this->report->id])),
        );

        $this->section_order = ReportSection::where('report_id',$this->report_id)->count()+1;
    }

    public function render()
    {
        return view('livewire.tabler.erp.report',[
            'report' => $this->report,
            'sections' => ReportSection::where('report_id', $this->report_id)->get(),
            'titles' => $this->titles,
        ])->extends('app.layout')->section('content');
    }

    public function report_edit()
    {
        $this->report_form = true;
        // $this->projet_id = $this->report->projet_id;
        $this->objet = $this->report->objet;
        $this->description = $this->report->description;
        $this->date = date_format($this->report->date, ('Y-m-d'));
        $this->type = $this->report->type;
    }

    public function report_update()
    {
        // $this->report->projet_id = $this->projet_id;
        $this->report->objet = $this->objet;
        $this->report->description = $this->description;
        $this->report->date = $this->date;
        $this->report->type = $this->type;
        $this->report->save();
        $this->report_form = false;
        $this->render();
    }

    // Section
    public $section_id, $section_title, $section_description, $section_order;

    protected $section_rules =[
        'section_title'=> 'required',
        'section_description'=> 'required',
        'section_order'=> ['required', 'integer'],
    ];

    public function add_section()
    {
        $this->validate($this->section_rules);
        ReportSection::create([
            'report_id' => $this->report_id,
            'title' => ucfirst($this->section_title),
            'description' => ucfirst($this->section_description),
            'order' => $this->section_order,
        ]);
        $this->section_order++;
        $this->dispatchBrowserEvent('close-modal');

    }

    public function edit_section($section_id)
    {
        $this->section_id = $section_id;
        $section = ReportSection::find($section_id);
        $this->section_title = $section->title;
        $this->section_description = $section->description;
        $this->section_order = $section->order;
    }

    public function update_section()
    {
        $section = ReportSection::find($this->section_id);
        $section->title = $this->section_title;
        $section->description = $this->section_description;
        $section->order = $this->section_order;
        $section->save();
        $this->reset('section_id');
        $this->render();
    }
    public function delete_section()
    {
        $section = ReportSection::find($this->section_id);

        $section->delete();
        $this->render();
    }

    // Generer
    public $titles = array( 'Contexte', "Bilan de l'existant", "Besoin du client", "Proposition technique", "Travaux effectués", "Travaux restants");

    public function set_section_title($title)
    {
        $this->section_title = $title;
    }
}
