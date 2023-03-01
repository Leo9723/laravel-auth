<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
            'title' => ['required', 'unique:projects', 'max:30'],
            'description' => ['required', 'unique:projects', 'max:200']
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Il titolo è obbligatorio',
            'description.required'  => 'La descrizione è obbligatoria',
            'title.max' => 'Il titolo è troppo lungo',
            'description.max'  => 'La descrizione è troppo lunga',
        ];
    }
}
