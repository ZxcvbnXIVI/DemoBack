<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->UserID,
            'user_name' => $this->UserName,
            'email' => $this->email,
            'google_id' => $this->google_id,
            'email_verified_at' => $this->email_verified_at,
            'role' => $this->Role,
            'image_path' => $this->image_path,
            'current_team_id' => $this->current_team_id,
            'profile_photo_path' => $this->profile_photo_path,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}