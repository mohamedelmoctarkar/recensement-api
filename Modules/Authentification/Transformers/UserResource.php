<?php

namespace Modules\Authentification\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return  [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'region_id' => $this->region_id,
            'last_login' => $this->last_login,
            'last_login_ip' => $this->last_login_ip,
            'roles' => $this->roles,
            'permissions' => $this->permissions
        ];
    }
}
