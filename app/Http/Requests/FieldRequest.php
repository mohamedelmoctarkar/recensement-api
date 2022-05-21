<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FieldRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'label' =>'required|max:255', 
			'validator' =>'required|max:255', 
			'initial_value' =>'required|max:255', 
			'type' =>'required|max:255', 
			];
    }
}
