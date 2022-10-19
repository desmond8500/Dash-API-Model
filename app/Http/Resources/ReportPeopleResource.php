<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReportPeopleResource extends JsonResource
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
            'report_id' => $this->report_id,
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'company' => $this->company,
            'job' => $this->job,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
