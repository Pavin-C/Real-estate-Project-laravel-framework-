<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => 'sometimes|email',
            'image' => 'nullable|mimes:jpg,png',
            'gender' => 'required',
            'phone' => 'sometimes|digits:10',
            
        ];
    }

    public function messages(): array 
    {
        return [
            'phone.digits' => 'phone number field must be a 10 digits',
            'image.dimensions' => 'Image dimensions must be width of 800 and height of 900 pixels',
        ];
    }
}

