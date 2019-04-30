<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;
use App\Http\Resources\User as UserResource;
use App\Http\Resources\Comment as CommentResource;

use Illuminate\Support\Facades\Schema;

use App\Like;
use Auth;

class Photo extends Resource
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
            'description' => $this->html,
            'url' => $this->url,
            'owner' => new UserResource($this->user),
            'like' => $this->when(Schema::hasTable('likes'), function () {
                return Like::where(['photo_id' => $this->id, 'user_id' => Auth::id()])->exists() ? true : false;
            }),
            'likes' => $this->when(Schema::hasTable('likes'), function () {
                return $this->likes->count();
            }),
            'comments' => $this->when(Schema::hasTable('comments'), function () {
                return CommentResource::collection($this->comments);
            }),
        ];
    }
}
