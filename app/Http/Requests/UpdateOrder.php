<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
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
            'customer_id' => 'required|exists:customers,id',
            'garments' => 'required|array',
            'quantities' => 'required|array',
            'quantities.*' => 'required|integer|min:1',
            'type_lavage'=>'required|array',
            'order_type'=>'required',


        ];
    }

    public function messages(): array
{
    return [
        'type_lavage.required' => 'Sélectionner les types de lavages (Lavage avec teinture,Lavage simple,Lavage avec repassage)',
        'order_type.required' => 'Sélectionner le type de commande (simple ou expresse)',
    ];
}
}
