<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AchatArticleResource extends JsonResource
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
            'achat_id' => $this->achat_id,
            'article_id' => $this->article_id,
            'quantity' => $this->quantity,
            'date' => $this->date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
