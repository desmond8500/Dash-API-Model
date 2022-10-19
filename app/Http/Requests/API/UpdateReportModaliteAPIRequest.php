<?php

namespace App\Http\Requests\API;

use App\Models\ReportModalite;
use InfyOm\Generator\Request\APIRequest;

class UpdateReportModaliteAPIRequest extends APIRequest
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
        $rules = ReportModalite::$rules;
        
        return $rules;
    }
}
