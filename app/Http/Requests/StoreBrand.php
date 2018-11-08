<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBrand extends FormRequest
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
            'name' => 'required|string|max:255',
            'contact_name' => 'string|max:255',
            'address' => 'required',
            'house' => 'required',
            'city' => 'required',
            'country' => 'required',
            'email' => 'required|string|email|max:255',
            'email_support' => 'string|email|max:255',
            'email_sales' => 'string|email|max:255',
            'size_id' => 'required',
            'website' => 'url'
        ];
    }
}
