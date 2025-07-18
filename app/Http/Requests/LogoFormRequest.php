<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LogoFormRequest extends FormRequest
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
            'logo' => [
                'mimes:png,jpg,jpeg',
                'nullable'
            ],
            'logo2' => [
                'mimes:png,jpg,jpeg',
                'nullable'
            ],
            'favicon' => [
                'mimes:png,jpg,jpeg',
                'nullable'
            ],
        ];
    }
}
