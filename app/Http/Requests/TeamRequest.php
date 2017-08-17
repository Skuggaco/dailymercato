<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TeamRequest extends FormRequest
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
        // If we're storing data
        if(Request::method() == 'POST') {
            return [
                'nameTeam'     => 'required',
                'nameLongTeam' => 'required',
                'imgTeam'      => 'required',
                'league_id'    => 'required',
            ];
            // Otherwise we probably updating
            // Image can be the same as the previous entity
        } else{
            return [
                'nameTeam'     => 'required',
                'nameLongTeam' => 'required',
                'league_id'    => 'required',
            ];
        }
    }
}
