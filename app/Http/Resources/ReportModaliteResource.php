<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportModaliteResource extends JsonResource
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
            'section_id' => $this->section_id,
            'duree' => $this->duree,
            'technicien' => $this->technicien,
            'ouvrier' => $this->ouvrier,
            'complexite' => $this->complexite,
            'risque' => $this->risque,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
