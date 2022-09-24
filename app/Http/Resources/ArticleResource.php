<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'reference' => $this->reference,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'brand_id' => $this->brand_id,
            'provider_id' => $this->provider_id,
            'storage_id' => $this->storage_id,
            'priority' => $this->priority,
            'price' => $this->price
        ];
    }
}
