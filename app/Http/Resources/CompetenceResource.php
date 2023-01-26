<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompetenceResource extends JsonResource
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
            'competence' => $this->competence,
            'niveau' => $this->niveau,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
