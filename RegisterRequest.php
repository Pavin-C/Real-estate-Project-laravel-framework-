<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'email' => 'required|email|unique:users,email',
            'image' => 'required|mimes:jpg,png|dimensions:min_width=800,min_height=890',
            'gender' => 'required',
            'phone' => 'required|digits:10|unique:users,phone_number',
            'password' => 'required|min:8',
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
