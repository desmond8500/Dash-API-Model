<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjetContactResource extends JsonResource
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
            'contact_id' => $this->contact_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
