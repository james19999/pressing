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


    public function messages(): array
    {
        return [
            'type_lavage.required' => 'Sélectionner les types de lavages (Lavage avec teinture,Lavage simple,Lavage avec repassage)',
            'order_type.required' => 'Sélectionner le type de commande (simple ou expresse)',
            'remis.required' => 'Sélectionner le remis (Oui ou Non)',
            'total_remis.required' => 'Saisir le total du remis',
            'total.required' => 'Saisir le total de la commande',
            'date_delivered.required' => 'Saisir la date de livraison',
            'date_recived.required' => 'Saisir la date de réception',
            'pressing_id.required' => 'Sélectionner le pressing',
            'payment_method.required' => 'Sélectionner le mode de paiement',
            'customer_id.required' => 'Sélectionner le client',
            'garments.*.required' => 'Sélectionner les vêtements',
            'quantities.*.required' => 'Saisir la quantité',
            'prices.*.required' => 'Saisir le prix',
            'totals.*.required' => 'Saisir le total',
            'quantities.*.integer' => 'La quantité doit être un nombre entier',
            'quantities.*.min' => 'La quantité doit être supérieur ou égale à 1',
            'prices.*.numeric' => 'Le prix doit être un nombre',
            'prices.*.min' => 'Le prix doit être supérieur ou égale à 0',
            'totals.*.numeric' => 'Le total doit être un nombre',
            'totals.*.min' => 'Le total doit être supérieur ou égale à 0',
            'customer_id.exists' => 'Le client n\'existe pas',
            'garments.*.exists' => 'Le vêtement n\'existe pas',


        ];
    }
}
