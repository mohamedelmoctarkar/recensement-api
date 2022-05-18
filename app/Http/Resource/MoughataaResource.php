<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MoughataaResource extends JsonResource
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
            'name' =>$this->name, 
			];
    }
}
