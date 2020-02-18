<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
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
            'name_car'          => 'required',
            'status'            => 'required',
            'total_price'       => 'required|numeric',
            'paid_price'        => 'required|numeric',
            'outstanding_price' => 'required|numeric',
        ];
    }
}
