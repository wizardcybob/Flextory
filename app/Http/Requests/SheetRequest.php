<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SheetRequest extends FormRequest
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
            'idea' => 'nullable',
            'state' => 'required|integer',
            'category.*' => 'nullable|exists:categories,id',
            'area.*' => 'required|exists:areas,id',
            'teacher.*' => 'nullable|exists:teachers,id',
        ];
    }
}
