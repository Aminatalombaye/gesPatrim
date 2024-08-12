<?php

namespace App\Http\Requests;

use App\Models\Barcode;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateBarcodeRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('barcode_edit');
    }

    public function rules()
    {
        return [
            'code_barres.*' => [
                'integer',
            ],
            'code_barres' => [
                'required',
                'array',
            ],
            'description' => [
                'string',
                'nullable',
            ],
        ];
    }
}
