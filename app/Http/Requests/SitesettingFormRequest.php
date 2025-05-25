<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class SitesettingFormRequest extends FormRequest
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
            'title' => [
                'string',
                'required'
            ],
            'site_name' => [
                'string',
                'required',
                'max:255'
            ],
            'keywords' => [
                'string'
            ],
            'site_description' => [
                'required'
            ],
            'email' => [
                'required',
                'email'
            ],
            'mobile' => [
                'integer',
                'required',
            ],
            'caution_fee' => 'nullable|integer',
            'estate_fee' => 'nullable|integer',
            'legal_fee' => 'nullable|integer',
            'landlord_name' => 'nullable|string',
            'property_manager_name' => 'nullable|string',
            'signature' => 'nullable|string|max:10',
            'notifying_email' => 'required|email',
            'address' => [
                'required',
                'string'
            ],
        ];
    }

     /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        // Log the validation errors
        Log::error('Validation errors occurred:', $validator->errors()->toArray());

        // Call the parent method to maintain default behavior
        parent::failedValidation($validator);
    }
}
