<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrder extends FormRequest
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
            'garments.*' => 'required|exists:garments,id',
            'quantities.*' => 'required|integer|min:1',
            'prices.*' => 'required|numeric|min:0',
            'totals.*' => 'required|numeric|min:0',
            'pressing_id' =>'required',
            'payment_method'=>'required',
            'type_lavage'=>'required|array',
             'date_recived'=>'required',
             'order_type'=>'required',
             'remis'=>'required',
             'total_remis'=>'required',
             'total'=>'required',
             'date_delivered'=>'required'
        ];
    }
}
