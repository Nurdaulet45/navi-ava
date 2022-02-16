<?php

namespace App\Http\Resources\Api\User;

use App\Models\UserCertificate;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class UserCertificationsResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'url' => route('downloadFile',['path' =>  UserCertificate::IMAGE_PATH . $this->image]),
            'image' => $this->image ? Storage::url(UserCertificate::IMAGE_PATH . $this->image) : null,
        ];
    }
}
