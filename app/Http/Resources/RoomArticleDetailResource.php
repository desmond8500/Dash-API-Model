<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomArticleDetailResource extends JsonResource
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
            'room_article_id' => $this->room_article_id,
            'saignee' => $this->saignee,
            'fourreau' => $this->fourreau,
            'enduit' => $this->enduit,
            'tirage' => $this->tirage,
            'pose' => $this->pose,
            'connexion' => $this->connexion,
            'test' => $this->test,
            'service' => $this->service,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
