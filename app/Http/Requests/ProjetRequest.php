<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetRequest extends FormRequest
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
            'title' => 'required|max:191',
            'description' => 'nullable',
            'ressource' => 'nullable',
            'pistar' => 'nullable',
            'image' => 'nullable',
            'year' => 'nullable',
            'student.*' => 'nullable|exists:students,id',
            'area.*' => 'nullable|exists:areas,id',
            'teacher.*' => 'nullable|exists:teachers,id',
        ];
    }
}
