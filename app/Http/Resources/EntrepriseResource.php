<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EntrepriseResource extends JsonResource
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
            'name' => $this->name,
            'logo' => $this->logo,
            'ninea' => $this->ninea,
            'adress' => $this->adress,
            'mail' => $this->mail,
            'rccm' => $this->rccm,
            'site' => $this->site,
            'banque' => $this->banque,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
