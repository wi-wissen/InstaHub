<?php

namespace App\Http\Resources;

use App\User;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\User as UserResource;

class Comment extends Resource
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
            'text' => $this->html,
            'owner' => new UserResource($this->user),
        ];
    }
}
