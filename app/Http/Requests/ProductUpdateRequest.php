<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category_id' => ['required', 'exists:categories,id'],
            'name' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'price' => ['required', 'numeric'],
            'discount' => ['required', 'in:solde,defaut'],
            'visibility' => ['required'],
            'reference' => ['required', 'max:16', 'string'],
            'picture' => ['image']
        ];
    }


    public function messages()
    {
        return [
            'name.required' => 'Le nom du produit est obligatoire',
            'description.required' => 'Une description du produit est obligatoire',
            'price.required' => 'Le prix du produit est obligatoire',
            'reference.size' => 'La référence du produit doit faire 16 caractères',
            'reference.required' => 'La référence du produit est obligatoire',
            'sizes.required' => "Au moins une taille est obligatoire",
            "picture.required" => "La photo est obligatoire",
            "category_id.required" => "La catégorie est obligatoire",
            "visibility.required" => "Veuillez choisir si l'article doit etre publié ou non"
        ];
    }
}
