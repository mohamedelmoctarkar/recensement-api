<?php

namespace App\Http\Resource;

use Illuminate\Http\Resources\Json\JsonResource;

class GroupeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
        ];
    }
}
