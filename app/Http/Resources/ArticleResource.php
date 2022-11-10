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
            'brand_id' => $this->brand_id,
            'provider_id' => $this->provider_id,
            'designation' => $this->designation,
            'reference' => $this->reference,
            'description' => $this->description,
            'quantity' => $this->quantity,
            'priority' => $this->priority,
            'price' => $this->price,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
