<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
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
            'devis_id' => $this->devis_id,
            'objet' => $this->objet,
            'description' => $this->description,
            'status_id' => $this->status_id,
            'priority_id' => $this->priority_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
