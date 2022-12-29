<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
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
            'projet_id' => $this->projet_id,
            'projet_name' => $this->projet->name,
            'client_id' => $this->projet->client->id,
            'client_name' => $this->projet->client->name,
            'objet' => $this->objet,
            'description' => $this->description,
            'date' => $this->date,
            'type' => $this->type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
