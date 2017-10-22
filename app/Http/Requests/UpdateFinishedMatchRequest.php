<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateFinishedMatchRequest extends FormRequest
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
            'home_team_id' => 'required',
            'away_team_id' => 'required|different:home_team_id',
            'date' => 'required|date',
            'home_team_score' => 'required|numeric|min:0',
            'away_team_score' => 'required|numeric|min:0',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'home_team_id.required' => 'Please select home team to create match',
            'away_team_id.required' => 'Please select away team to create match',
            'away_team_id.different' => 'Away and home teams should be different',
            'date.required'  => 'Please select date to create match',
        ];
    }
}
