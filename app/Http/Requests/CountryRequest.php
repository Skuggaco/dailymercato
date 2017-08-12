<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CountryRequest extends FormRequest
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
        // If we're storing data, name and image are required
        if(Request::method() == 'POST') {
            return [
                'nameCountry' => 'required',
                'imgCountry'  => 'required',
            ];
        // Otherwise we probably updating, only name is then required
        // Image can be the same as the previous entity
        } else{
            return [
                'nameCountry' => 'required',
            ];
        }
    }
}
