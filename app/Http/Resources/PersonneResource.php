<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonneResource extends JsonResource
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
            'prenom' => $this->prenom,
            'nom' => $this->nom,
            'fonction' => $this->fonction,
            'tel' => $this->tel,
            'adresse' => $this->adresse,
            'email' => $this->email,
            'profile' => $this->profile,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
