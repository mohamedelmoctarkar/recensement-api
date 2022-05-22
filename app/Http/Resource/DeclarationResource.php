<?php

namespace App\Http\Resource;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DeclarationResource extends JsonResource
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
            'id' => $this->id,
            'created_at' =>  Carbon::parse($this->created_at)->format('M d Y'),
            'reference' => $this->reference,
            'status' => $this->status,
            'periode' => $this->period,
            'form_data' => $this->form_data,
            'form_id' => $this->form_id,
        ];
    }
}
