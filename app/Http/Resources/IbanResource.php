<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IbanResource extends JsonResource
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
            'banque' => $this->banque,
            'code_banque' => $this->code_banque,
            'code_guichet' => $this->code_guichet,
            'compte' => $this->compte,
            'cle' => $this->cle,
            'swift' => $this->swift,
            'entreprise_id' => $this->entreprise_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
