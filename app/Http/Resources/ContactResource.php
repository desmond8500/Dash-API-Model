<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
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
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'description' => $this->description,
            'avatar' => $this->avatar,
            'tels' => $this->tels,
            'emails' => $this->emails,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
