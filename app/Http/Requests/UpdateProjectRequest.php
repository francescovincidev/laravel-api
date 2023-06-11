<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'title' => ['required', 'max:150', Rule::unique('projects')->ignore($this->project)],
            'content' => 'nullable',
            'type_id' => ['nullable', 'exists:types,id'],
            'technologys' => ['nullable', 'exists:technologys,id']
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
            'title.required' => 'Il titolo è richiesto',
            'title.max' => 'Il titolo deve essere lungo massimo :max caratteri',
            'type_id.exists' => 'Il valore selezionato per :attribute non esiste.',
            'technologys.exists' => 'Il valore selezionato per :attribute non esiste.'
        ];
    }
}
