<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class infoGeneralRequest extends FormRequest
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
            'sale_or_rent' => 'required',
            'fk_type_of_property' => 'required',
            'price' => 'required',
            'address' => 'required|max:250',
            'address_number'=> 'required|alpha_num',
            'address_box' => 'alpha_num',
            'postal_code' => 'required|alpha_num'
        ];
    }
}
