<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfoResource extends JsonResource
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
            'id' => $this->user_id,
            'name' => $this->name,
            'from' => $this->from,
            'to' => $this->to,
            'long' => $this->long,
            'interestings' => $this->interestings,
            'hobbies' => $this->hobbies,
            'about' => $this->about,
            'socials' => $this->socials,
            'img' => $this->img
        ];
    }
}
