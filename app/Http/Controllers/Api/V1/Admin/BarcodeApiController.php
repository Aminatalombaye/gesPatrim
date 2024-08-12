<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BarcodeResource;
use App\Models\Barcode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BarcodeApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('barcode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BarcodeResource(Barcode::with(['code_barres'])->get());
    }

    public function show(Barcode $barcode)
    {
        abort_if(Gate::denies('barcode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BarcodeResource($barcode->load(['code_barres']));
    }
}
