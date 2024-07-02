<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Hub extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $hasWorkingUser = $this->hasWorkingUser();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'hasWorkingUser' => $hasWorkingUser,
            'activated' => ($hasWorkingUser) ? $this->activated() : false,
            'admin' => ($hasWorkingUser) ? $this->admin : '',
            'readonly' => $this->readonly(),
            'created_at' => $this->created_at,
        ];
    }
}
