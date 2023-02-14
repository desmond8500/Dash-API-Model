<?php

namespace App\Http\Livewire\Tabler\Erp;

use App\Models\Fichier;
use App\Models\Room as ModelsRoom;
use App\Models\RoomFile;
use App\Models\Task;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Room extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';

    public $room, $breadcrumbs, $projet_id;
    public $room_id, $name, $order, $description;
    public $form = false, $files;

    protected $listeners = ['reload' => 'render'];

    public function mount($room_id)
    {
        $this->room_id = $room_id;
        $this->room = ModelsRoom::find($room_id);
        $this->projet_id = $this->room->stage->building->projet->id;

        $this->breadcrumbs = array(
            array('name' => 'Clients', 'route' => route('tabler.clients')),
            array('name' => $this->room->stage->building->projet->client->name, 'route' => route('tabler.client', ['client_id' => $this->room->stage->building->projet->client->id])),
            array('name' => $this->room->stage->building->projet->name, 'route' => route('tabler.projet', ['projet_id' => $this->room->stage->building->projet->id])),
            array('name' => $this->room->stage->building->name, 'route' => route('tabler.building', ['building_id' => $this->room->stage->building->id])),
            array('name' => $this->room->name, 'route' => route('tabler.room', ['room_id' => $this->room->id])),
        );
    }
    public function render()
    {
        return view('livewire.tabler.erp.room',[
            'room' => $this->room,
            'taches' => Task::where('room_id', $this->room_id)->where('status_id', [1, 2, 3])->orderBy('priority_id','DESC')->paginate(7),
            'termines' => Task::where('room_id', $this->room_id)->where('status_id', [4,5])->orderBy('priority_id','DESC')->paginate(7),
            'fichiers' => Fichier::all(),
            ])->extends('app.layout')->section('content');
    }

    public $test;

    public function Ajouter()
    {
        if ($this->files) {
            $id = Fichier::count();
            $dir = "files/";
            foreach ($this->files as $key => $file) {
                $id++;
                $name = $file->getClientOriginalName();
                $file->storeAS("public/$dir/$id", $name);

                $fichier = Fichier::firstOrCreate([
                    'name' => $name,
                    'folder' => "storage/$dir/$id/$name",
                    'type' => 'image'
                ]);
                RoomFile::firstOrCreate([
                    'room_id'=> $this->room_id,
                    'fichier_id'=> $fichier->id,
                ]);

                $path = pathinfo($fichier->folder);
                if ($path['extension']=='pdf') {
                    $fichier->type = 'pdf';
                }
                elseif($path['extension'] == 'png' || $path['extension' == 'jpg'] || $path['extension'] == 'jepg' || $path['extension'] == 'webm' ) {
                    $fichier->type = 'image';
                }
                elseif($path['extension'] == 'xls' || $path['extension'] == 'xlsx' || $path['extension'] == 'csv') {
                    $fichier->type = 'excel';
                }
                elseif($path['extension'] == 'doc' || $path['extension'] == 'docx' ) {
                    $fichier->type = 'word';
                }
                $fichier->save();

            }
            }
        $this->form = false;
    }
}
