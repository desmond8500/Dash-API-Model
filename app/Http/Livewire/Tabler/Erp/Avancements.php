<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Avancement;
use App\Models\AvancementCategorie;
use App\Models\AvancementRow;
use App\Models\AvancementSubRow;
use App\Models\Building;
use App\Models\System;
use Carbon\Carbon;
use Livewire\Component;

class Avancements extends Component
{
    public $projet_id;
    public $search ='';
    public function mount($projet_id)
    {
        $this->projet_id = $projet_id;
    }
    public function render()
    {
        return view('livewire.tabler.erp.avancements',[
            'buildings' => Building::where('projet_id',$this->projet_id)->get(),
            'systems' => System::where('projet_id',$this->projet_id)->get(),
            'avancements' => Avancement::where('projet_id',$this->projet_id)->get(),
        ]);
    }

    // Avancement
    public $avancement_id, $name, $system, $building_id;

    protected $rules = [
        'system' => 'required',
    ];

    public function setAvancement($building_id, $categorie_id)
    {
        $this->building_id = $building_id;
        $this->avancement_categorie_id = $categorie_id;
    }

    public function add_avancement()
    {
        $this->validate($this->rules);
        $sys = System::find($this->system);

        Avancement::create([
            'building_id' => $this->building_id,
            'avancement_categorie_id' => $this->avancement_categorie_id ,
            'name' => $this->name ?? $sys->name,
            'system' => $this->system,
        ]);
        $this->reset('system', 'name','building_id');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_avancement($avancement_id)
    {
        $this->avancement_id = $avancement_id;
        $model = Avancement::find($avancement_id);
        $this->building_id = $model->building_id;
        $this->name = $model->name;
        $this->system = $model->system;
        $this->avancement_categorie_id  = $model->avancement_categorie_id;
    }

    public function update_avancement()
    {
        $this->validate($this->rules);
        $model = Avancement::find($this->avancement_id);
        $model->building_id = $this->building_id;
        $model->name = $this->name ?? $sys->name;
        $model->system = $this->system;
        $model->save();
        $this->reset('avancement_id', 'system','name', 'building_id');
        $this->render();
    }

    public function delete_avancement()
    {
        $model = Avancement::find($this->avancement_id);

        $model->delete();
        $this->render();
    }

    // AvancementRow
    public $section_id, $comment, $system_id;

    protected $section_rules = [
        'name' => 'required',
        'comment' => 'required',
    ];

    public function add_section()
    {
        $this->validate($this->section_rules);
        AvancementRow::create([
            'avancement_id' => $this->system,
            'name' => ucfirst($this->name),
            'comment' => $this->comment,
            'carbon' => new Carbon(),
        ]);
        $this->reset('name', 'comment');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_section($section_id)
    {
        $this->section_id = $section_id;
        $section = AvancementRow::find($section_id);
        $this->name = $section->name;
        // $this->system = $section->system;
        $this->comment = $section->comment;
    }

    public function update_section()
    {
        $this->validate($this->section_rules);
        $section = AvancementRow::find($this->section_id);
        $section->name = ucfirst($this->name);
        $section->comment = $this->comment;
        // $section->system = $this->system;
        $section->save();
        $this->reset('section_id','name', 'comment');
        $this->render();
    }
    public function delete_section()
    {
        $section = AvancementRow::find($this->section_id);

        $section->delete();
        $this->render();
    }

    // Row
    public $row_id, $start, $end, $progress=0, $avancement_row_id, $order;

    protected $row_rules = [
        'name' => 'required',
        'start' => ['required','date'],
        'end' => ['required','date',"after_or_equal:start"],
        'progress' => ['required', 'numeric'],
        'comment' => 'required',
    ];

    public function add_row()
    {
        $this->validate($this->row_rules);
        AvancementSubRow::create([
            'avancement_row_id' => $this->avancement_row_id,
            'name' => $this->name,
            'start' => $this->start,
            'end' => $this->end,
            'progress' => $this->progress,
            'comment' => $this->comment,
            'order' => AvancementSubRow::count()+1,
        ]);
        $this->reset('name', 'start', 'end','progress', 'comment', 'order');
        $this->dispatchBrowserEvent('close-modal');
    }

    public function edit_row($row_id)
    {
        $this->row_id = $row_id;
        $row = AvancementSubRow::find($row_id);
        $this->name = $row->name;
        $this->start = date_format($row->start, ('Y-m-d'));
        $this->end = date_format($row->end, ('Y-m-d'));
        $this->progress = $row->progress;
        $this->comment = $row->comment;
        $this->order = $row->order;
    }

    public function update_row()
    {
        $row = AvancementSubRow::find($this->row_id);
        $row->name = $this->name;
        $row->start = $this->start;
        $row->end = $this->end;
        $row->progress = $this->progress;
        $row->order = $this->order;
        $row->save();
        $this->reset('row_id','name', 'start', 'end', 'progress', 'comment', 'order');
        $this->render();
    }
    public function delete_row()
    {
        $row = AvancementSubRow::find($this->row_id);

        $row->delete();
        $this->render();
    }

    // Category
    public $category_id, $category_name, $category_building_id, $avancement_categorie_id ;

    protected $category_rules = [
        'category_name' => 'required',
    ];

    public function add_category()
    {
        $this->validate($this->category_rules);
        AvancementCategorie::create([
            'name' => ucfirst($this->category_name),
            'building_id' => $this->category_building_id,
        ]);
        $this->reset();
        $this->dispatchBrowserEvent('close-modal');
        $this->reset('category_name');
    }

    public function edit_category($category_id)
    {
        $this->category_id = $category_id;
        $category = AvancementCategorie::find($category_id);
        $this->category_name = $category->name;
    }

    public function update_category()
    {
        $this->validate($this->category_rules);
        $category = AvancementCategorie::find($this->category_id);
        $category->name = $this->category_name;
        $category->save();
        $this->reset('category_id', 'category_name');
    }
    public function delete_category()
    {
        $category = AvancementCategorie::find($this->category_id);

        $category->delete();
        $this->render();
    }
}
