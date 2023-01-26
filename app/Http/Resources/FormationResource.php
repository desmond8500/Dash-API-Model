<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FormationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'personne_id' => $this->personne_id,
            'ecole' => $this->ecole,
            'diplome' => $this->diplome,
            'debut' => $this->debut,
            'pays' => $this->pays,
            'fin' => $this->fin,
            'ville' => $this->ville,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
