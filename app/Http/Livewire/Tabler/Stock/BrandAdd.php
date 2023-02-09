<?php

namespace App\Http\Livewire\Tabler\Stock;

use App\Models\Brand;
use Livewire\Component;

class BrandAdd extends Component
{
    public $name, $description;

    public function render()
    {
        return view('livewire.tabler.stock.brand-add');
    }

    public function brandAdd()
    {
        Brand::firstOrCreate([
            'name' => $this->name,
            'description' => $this->description,
        ]);
        $this->reset('name', 'description');
        $this->emit('reload');
    }
}
