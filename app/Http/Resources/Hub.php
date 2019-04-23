<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Hub extends Resource
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
            'activated' => $this->activated(),
            'admin' => ($hasWorkingUser) ? $this->adminname() : '',
            'readonly' => $this->readonly(),
            'created_at' => $this->created_at,
        ];
    }
}
