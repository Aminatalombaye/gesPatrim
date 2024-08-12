<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barcode;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BarcodeController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('barcode_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barcodes = Barcode::with(['code_barres'])->get();

        return view('admin.barcodes.index', compact('barcodes'));
    }

    public function show(Barcode $barcode)
    {
        abort_if(Gate::denies('barcode_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $barcode->load('code_barres');

        return view('admin.barcodes.show', compact('barcode'));
    }
}
