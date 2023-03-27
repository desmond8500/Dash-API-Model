<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Invoice;
use App\Models\Report as ModelsReport;
use App\Models\ReportFiles;
use App\Models\ReportLink;
use App\Models\ReportModalite;
use App\Models\ReportSection;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class Report extends Component
{
    public $report, $report_id, $report_form=false, $breadcrumbs;
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
            'sections' => ReportSection::where('report_id', $this->report_id)->orderBy('order')->get(),
            'titles' => ModelsReport::titles(),
            'types' => ModelsReport::types(),
            'invoices' => Invoice::where('projet_id', $this->report->projet->id)->get(),
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

    // Modalités

    public $modalite_id, $selected_section_id, $duree = 1, $technicien = 1, $ouvrier = 0, $complexite = 0, $risque= 0;

    protected $modalite_rules = [
        'duree' => 'required',
        'technicien' => 'required',
        'ouvrier' => 'required',
        'complexite' => 'required',
        'risque' => 'required',
    ];

    public function select_section($section_id)
    {
        $this->selected_section_id = $section_id;
    }

    public function add_modalite()
    {
        $this->validate($this->modalite_rules);
        ReportModalite::create([
            'section_id' => $this->selected_section_id,
            'duree' => $this->duree,
            'technicien' => $this->technicien,
            'ouvrier' => $this->ouvrier,
            'complexite' => $this->complexite,
            'risque' => $this->risque,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_modalite($modal_id)
    {
        $this->modalite_id = $modal_id;
        $modalite = ReportModalite::find($modal_id);
        $this->duree = $modalite->duree;
        $this->technicien = $modalite->technicien;
        $this->ouvrier = $modalite->ouvrier;
        $this->complexite = $modalite->complexite;
        $this->risque = $modalite->risque;
    }

    public function update_modalite()
    {
        $modalite = ReportModalite::find($this->modalite_id);
        $modalite->duree = $this->duree;
        $modalite->technicien = $this->technicien;
        $modalite->ouvrier = $this->ouvrier;
        $modalite->complexite = $this->complexite;
        $modalite->risque = $this->risque;
        $modalite->save();
        $this->reset('modalite_id');
        $this->render();
    }
    public function delete_modalite()
    {
        $modalite = ReportModalite::find($this->modalite_id);

        $modalite->delete();
        $this->render();
    }

    // Photos
    public $photos, $photo_id, $name, $folder;

    protected $photo_rules = [
        'name' => 'required',
    ];

    public function add_photo()
    {
        $this->validate($this->photo_rules);

        if ($this->photos) {
            $dir = "erp/reports/".$this->report->id."/".$this->selected_section_id."/files";

            foreach ($this->photos as $key => $photo) {
                $name = $photo->getClientOriginalName();
                $photo->storeAS("public/$dir/", $name);

                ReportFiles::firstOrCreate([
                    'report_id' => $this->selected_section_id,
                    'section_id' => $this->selected_section_id,
                    'name' => $this->name,
                    'folder' => "storage/$dir/$name",
                    'extension' => "img",
                ]);
            }
        }
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_photo($photo)
    {
        $this->photo_id = $photo;
        $model = ReportFiles::find($photo);
        $this->name = $model->name;
        $this->folder = $model->folder;
        $this->attr3 = $model->attr3;
    }

    public function update_photo()
    {
        $model = ReportFiles::find($this->photo_id);
        $model->name = $this->name;
        $model->folder = $this->folder;
        $model->attr3 = $this->attr3;
        $model->save();
        $this->reset('photo_id');
        $this->render();
    }
    public function delete_photo()
    {
        $model = ReportFiles::find($this->photo_id);

        $model->delete();
        $this->render();
    }

    // Link

    // Model
    public $link_id, $link_name, $link;

    protected $link_rules = [
        'link_name' => 'required',
        'link' => ['required','url'],
    ];

    public function add_link()
    {
        $this->validate($this->link_rules);
        ReportLink::create([
            'section_id' => $this->selected_section_id,
            'name' => $this->link_name,
            'link' => $this->link,
        ]);
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_link($link_id)
    {
        $this->link_id = $link_id;
        $model = ReportLink::find($link_id);
        $this->link_name = $model->link_name;
        $this->link = $model->link;
    }

    public function update_link()
    {
        $model = ReportLink::find($this->link_id);
        $model->link_name = $this->link_name;
        $model->link = $this->link;
        $model->save();
        $this->reset('link_id');
        $this->render();
    }
    public function delete_link($id)
    {
        $model = ReportLink::find($id);

        $model->delete();
        $this->render();
    }

    // Generer
    public $titles = array( 'Contexte', "Bilan de l'existant", "Besoin du client", "Proposition technique", "Travaux effectués", "Travaux restants");

    public function set_section_title($title)
    {
        $this->section_title = $title;
    }
}
