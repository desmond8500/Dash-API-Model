<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Invoice;
use App\Models\Report;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class RapportListCard extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['reload'=> 'render'];
    protected $rules = [
        'objet' => 'required',
        'description' => 'required',
        'date' => 'required',
        'type' => 'required',
    ];

    public function updatingSearch() {
        $this->resetPage();
    }

    public $search ='', $projet_id, $report_form=false;
    public $objet, $description='', $date, $type=1;
    public $report, $editform=false;

    public function mount($projet_id)
    {
       $this->projet_id = $projet_id;
    }

    public function render()
    {

        return view('livewire.tabler.erp.rapport-list-card',[
            'reports' => Report::where('projet_id', $this->projet_id)->get(),
            'types' => Report::types(),
            'titles' => Report::titles(),

        ]);
    }

    public function report_add()
    {
        $this->validate($this->rules);
        Report::create([
            'projet_id' => $this->projet_id,
            'objet' => $this->objet,
            'description' => $this->description,
            'date' => $this->date,
            'type' => $this->type,
        ]);
        $this->report_form=false;
        $this->dispatchBrowserEvent('close-modal');
    }

    public function selectReport($report_id)
    {
        $this->report = Report::find($report_id);
    }

    public function report_edit()
    {
        $this->editform = true;
        $this->projet_id = $this->report->projet_id;
        $this->objet = $this->report->objet;
        $this->description = $this->report->description;
        $this->date = date_format($this->report->date, 'Y-m-d');
        $this->type = $this->report->type;
    }

    public function report_update()
    {
        $this->report->projet_id = $this->projet_id;
        $this->report->objet = $this->objet;
        $this->report->description = $this->description;
        $this->report->date = $this->date;
        $this->report->type = $this->type;
        $this->report->save() ;
        $this->editform = false;
        $this->render();
    }

    public $files;

    public function addFile()
    {
        # code...
    }


}
