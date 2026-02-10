<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Ad extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'url' => $this->url,
            'img' => $this->img,
        ];
    }
}
