<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleDocResource extends JsonResource
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
            'article_id' => $this->article_id,
            'name' => $this->name,
            'folder' => $this->folder,
            'doc_type' => $this->doc_type,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
