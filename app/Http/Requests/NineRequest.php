<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NineRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'title' => ['required'],
                'description' => ['required'],
                'category' => ['required'],
                'status' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'title is required hoy',
            'description.required' => 'description is required hey',
            'category.required' => 'category is required hey',
            'status.required' => 'status is required hey',
        ];
    }
}
