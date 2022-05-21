<?php

namespace App\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FieldResource extends JsonResource
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
            'label' =>$this->label, 
			'validator' =>$this->validator, 
			'initial_value' =>$this->initial_value, 
			'type' =>$this->type, 
			];
    }
}
