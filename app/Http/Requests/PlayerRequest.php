<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
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
            'namePlayer'     => 'required',
            'surNamePlayer'  => 'required',
            'birthdayPlayer' => 'required',
            'contractPlayer' => 'required',
            'valuePlayer'    => 'required',
            'country_id'     => 'required',
            'position_id'    => 'required',
            'team_id'        => 'required'
        ];
    }
}
