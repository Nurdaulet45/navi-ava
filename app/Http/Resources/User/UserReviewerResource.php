<?php

namespace App\Http\Resources\User;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserReviewerResource extends JsonResource
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
            'full_name' => UserService::getFirstNameAndLetterLastName($this) ,
            'avatar' => $this->avatar
                ? Storage::url(User::IMAGE_PATH . $this->avatar)
                : ($this->gender ? '/images/user-review-male.png' : '/images/user-review-female.png'),
            'specialization_text' => $this->specialization_text,
        ];
    }
}
