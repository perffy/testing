<?php

namespace App\Http\Requests\Todo;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules = [
            'user_id' 		=> 'required|integer',
            'project_id' 	=> 'required|integer',
            'description' 	=> 'sometimes',
            'status' 	    => 'sometimes',
            'views' 	    => 'sometimes',
        ];

        return $rules;
    }
}
