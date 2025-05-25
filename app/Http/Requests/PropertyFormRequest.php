<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;


class PropertyFormRequest extends FormRequest
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
            'catId' => 'required|integer|exists:categories,id',

            'userId' => 'required|integer|exists:users,id',

            'property_name' => [
                'string',
                'required',
                'max:50',
            ],
            'slug' => [
                'string',
                'required'
            ],
            'description' => [
                'required',
                'max:5000'
            ],
            'price' => [
                'required',
                'integer'
            ],
            'type' => [
                'string',
                'required'
            ],
            'square_ft' => [
                'required'
            ],
            'address' => [
                'required',
            ],
            'country' => [
                'required',
                'string',
            ],
            'state' => [
                'required',
                'string',
            ],
            'city' => [
                'required',
                'string',
            ],
            'master_bedrooms_num' => [
                'required',
                'integer'
            ],
            'bathrooms_num' => [
                'required',
                'integer'
            ],
            'rooms_num' => [
                'required',
                'integer'
            ],

            'service_charge' => 'nullable|integer',

            'listing' => [
                'nullable',
            ],
            'status' => [
                'nullable',
            ],

            'availability' => [
                'required'
            ],

            'meta_title' => [
                'required',
                'string',
                'max:255'
            ],
            'meta_keyword' => [
                'string',
                'max:500'
            ],
            'meta_description' => [
                'string',
                'max:500'
            ],
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image' => 'nullable|array',
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
