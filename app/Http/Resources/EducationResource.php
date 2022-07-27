<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EducationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'  => $this->id,
            'user' => $this->user,
            'school' => $this->school,
            'location' => $this->location,
            'degree' => $this->degree,
            'course' => $this->course,
            'description' => $this->description,
            'from' => $this->from,
            'to' => $this->to,
        ];
    }
}
