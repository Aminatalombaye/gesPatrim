<?php

namespace App\Http\Requests;

use App\Models\Inventaire;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateInventaireRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('inventaire_edit');
    }

    public function rules()
    {
        return [
            'in' => [
                'string',
                'nullable',
            ],
            'out' => [
                'string',
                'nullable',
            ],
            'balance' => [
                'string',
                'nullable',
            ],
        ];
    }
}
