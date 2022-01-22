<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublishRequest extends FormRequest
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
            'address_number'=> 'required|alpha_num',
            'energy_class' => 'required',
            'contact_email' => 'required|email',
            'fk_users' => 'required|alpha_num',
            'price' => 'required|alpha_num',
            'street' => 'required|max:250',
            'number_week' => 'required|alpha_num',
            'pack' => 'required|alpha_num',
            'postal_code' => 'required|alpha_num',
            'property_pictures' => 'required',
            'property_pictures.*' =>'required|mimes:jpg,jpeg,png,bmp|max:20000',
            'sell_or_rent' => 'required|alpha_num',
            'sub_type_property' => 'required|alpha_num',
        ];
    }
}
