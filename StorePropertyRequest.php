<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePropertyRequest extends FormRequest
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
            'address'            => 'required|string',
            'zipcode'            => 'required|digits:6',
            'property-size'      => 'required|string',
            'lot-size'           => 'required|string',
            'bedroom'            => 'nullable',
            'bathroom'           => 'nullable',
            'amenities'          => 'array|nullable',
            'garage'             => 'nullable',
            'property-condition' => 'required',
            'currency'           => 'required',
            'price'              => 'required|string',
            'date'               => 'required|date',
            'description'        => 'required|string|min:100',
             'image1'              => 'required|mimes:jpg,png|dimensions:min_width=600,min_height=800,max_width=600,max_height=800',
            'document'           => 'required|mimes:pdf',
        ];
    }

    public function messages(): array 
    {
        return [
            'zipcode.digits' => 'Zipcode field must be a number',
            'image1.required'=>'Property image field is required',
            'floor.digits' => 'Floor field must be a number',
            'image1.dimensions' => 'Image dimensions must be width of 600 and height of 800 pixels',
        ];
    }

    
}
