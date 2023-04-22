<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FicheZoneResource extends JsonResource
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
            'fiche_id' => $this->fiche_id,
            'zone' => $this->zone,
            'equipement' => $this->equipement,
            'local' => $this->local,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
