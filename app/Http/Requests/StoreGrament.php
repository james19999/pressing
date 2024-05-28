<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGrament extends FormRequest
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
            //
            'name.*' => 'required|string|max:255|unique:garments,name',
            'price.*' => 'required|numeric|min:0',
        ];
    }

    public function messages() :array
    {
         return [
            'name.*.required' => 'Entrer le nom du vêtement',
            'price.*.required' => 'Entrer le prix du vêtement',
            'name.*.string' => 'Garment name must be a string',
            'name.*.max' => 'Garment name must be less than 255 characters',

         ];
    }
}
