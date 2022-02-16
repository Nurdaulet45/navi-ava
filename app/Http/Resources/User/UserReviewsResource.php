<?php

namespace App\Http\Resources\User;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserReviewsResource extends JsonResource
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
            'id' => $this->id,
            'text' => $this->text,
            'rate' => $this->rate,
            'parent_id' => $this->parent_id,
            'reviewer_id' => $this->reviewer_id,
            'user_id' => $this->user_id,
//            'user' => $this->whenLoaded('user'),
            'reviewer' => new UserReviewerResource($this->whenLoaded('reviewer')) ,
            'user' => new UserReviewerResource($this->whenLoaded('user')) ,
            'reply' => new UserReviewsResource( $this->whenLoaded('reply')),
            'created_at' => $this->created_at? Carbon::parse($this->created_at)->format('d F Y'): null,

        ];
    }
}
