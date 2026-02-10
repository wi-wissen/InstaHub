<?php

namespace App\Http\Resources;

use App\Facades\RequestHub;
use App\Http\Resources\Comment as CommentResource;
use App\Http\Resources\User as UserResource;
use App\Models\Like;
use Auth;
use Illuminate\Http\Resources\Json\JsonResource;

class Photo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'description' => $this->html,
            'url' => $this->url,
            'owner' => new UserResource($this->user),
            'like' => $this->when(RequestHub::hasTable('likes'), function () {
                return Like::where(['photo_id' => $this->id, 'user_id' => Auth::id()])->exists() ? true : false;
            }),
            'likes' => $this->when(RequestHub::hasTable('likes'), function () {
                return $this->likes->count();
            }),
            'comments' => $this->when(RequestHub::hasTable('comments'), function () {
                return CommentResource::collection($this->comments);
            }),
        ];
    }
}
