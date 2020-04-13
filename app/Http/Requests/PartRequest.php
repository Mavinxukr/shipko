<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartRequest extends FormRequest
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
        return [
            'client_id'         => 'required',
            'catalog_number'    => 'required',
            'name'              => 'required',
            'auto'              => 'required',
            'vin'               => 'required',
            'quality'           => 'required|numeric',
            'container'         => 'required',
            'image'             => 'nullable|array'
        ];
    }
}
