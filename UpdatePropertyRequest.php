<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePropertyRequest extends FormRequest
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
            'type'               => 'required',
            'sales-type'         => 'required',
            'property-type'      => 'required',
            'floor'              => 'nullable',
            'location'           => 'required|string',
            'zipcode'            => 'required|digits:6',
            'address'            => 'required|string',
            'property-size'      => 'required|string',
            'lot-size'           => 'required|string',
            'bedroom'            => 'nullable',
            'bathroom'           => 'nullable',
            'garage'             => 'nullable',
            'amenities'          => 'array|nullable',
            'property-condition' => 'required',
            'currency'           => 'required',
            'price'              => 'required|string',
            'date'               => 'required|date',
            'description'        => 'required|string',
             'image1'            => 'nullable|mimes:jpg,png',
            'document'           => 'nullable|mimes:pdf',
        ];
    }

    public function messages(): array 
    {
        return [
            'zipcode.digits' => 'Zipcode field must be a number',
            'bedroom.digits' => 'Bedroom field must be a number',
            'bathroom.digits' => 'Bathroom field must be a number',
            'floor.digits' => 'Floor field must be a number',
        ];
    }
}
