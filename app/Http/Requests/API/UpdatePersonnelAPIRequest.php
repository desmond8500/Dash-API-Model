<?php

namespace App\Http\Requests\API;

use App\Models\Personnel;
use InfyOm\Generator\Request\APIRequest;

class UpdatePersonnelAPIRequest extends APIRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = Personnel::$rules;
        
        return $rules;
    }
}
