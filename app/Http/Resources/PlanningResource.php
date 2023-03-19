<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PlanningResource extends JsonResource
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
            'batiment_id' => $this->batiment_id,
            'system_id' => $this->system_id,
            'tache' => $this->tache,
            'date' => $this->date,
            'Etat' => $this->Etat,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
