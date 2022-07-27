<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ExperienceResource extends JsonResource
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
            'title' => $this->title,
            'company_name' => $this->company_name,
            'location' => $this->location,
            'description' => $this->description,
            'from' => $this->from,
            'to' => $this->to,
            'is_currently' => $this->is_currently
        ];
    }
}
