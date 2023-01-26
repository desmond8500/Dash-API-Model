<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
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
            'pays' => $this->pays,
            'ville' => $this->ville,
            'debut' => $this->debut,
            'fin' => $this->fin,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'entreprise' => $this->entreprise
        ];
    }
}
