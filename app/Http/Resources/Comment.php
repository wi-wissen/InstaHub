<?php

namespace App\Http\Resources;

use App\Http\Resources\User as UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class Comment extends JsonResource
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
