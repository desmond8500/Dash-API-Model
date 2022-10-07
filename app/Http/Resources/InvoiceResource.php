<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'reference' => $this->reference,
            'status' => $this->status,
            'description' => $this->description,
            'client_name' => $this->client_name,
            'client_tel' => $this->client_tel,
            'client_address' => $this->client_address,
            'discount' => $this->discount,
            'tva' => $this->tva,
            'brs' => $this->brs,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
