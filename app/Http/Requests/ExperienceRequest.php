<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'title' => 'required',
            'company_name' => 'required',
            'location' => 'required',
            'description' => '',
            'from' => 'required',
            'to' => 'required',
            'is_currently' => 'required'
        ];
    }
}
