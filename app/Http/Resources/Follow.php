<?php

namespace App\Http\Resources;

use App\Http\Resources\FollowFollower as FollowerResource;
use Illuminate\Http\Resources\Json\Resource;

class Follow extends Resource
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
            'name' => $this->name,
            'username' => $this->username,
            'follows' => FollowerResource::collection($this->following),
        ];
    }
}
