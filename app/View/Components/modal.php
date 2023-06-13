<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modal extends Component
{
    public $id;
    public $submit = 'Ajouter';
    public $method = 'Ajouter';
    public $button_name = 'Ajouter';
    public $title;
    public $teste;

    public function __construct($id=null)
    {
        if ($id) {
            $this->id = $id;
        } else {
            $this->id = 'exampleModal';
        }

    }

    public function render()
    {
        return view('components.modal',[
            'test' => $this->teste
        ]);
    }

    public function close(){
        $this->teste = "dsfdf";
    }

    public function delete(){

    }
}
