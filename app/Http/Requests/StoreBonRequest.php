<?php

namespace App\Http\Requests;

use App\Models\Bon;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreBonRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('bon_create');
    }

    public function rules()
    {
        return [
            'bons.*' => [
                'integer',
            ],
            'bons' => [
                'required',
                'array',
            ],
            'date_emission' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'organisation' => [
                'string',
                'required',
                'unique:bons',
            ],
            'reference_commande' => [
                'string',
                'required',
            ],
            'date_livraison' => [
                'string',
                'required',
            ],
            'nom_destinataire' => [
                'string',
                'required',
            ],
        ];
    }
}
