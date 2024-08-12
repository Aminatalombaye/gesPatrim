<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBonRequest;
use App\Models\Bon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BonController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bons = Bon::with(['bons'])->get();

        return view('admin.bons.index', compact('bons'));
    }

    public function show(Bon $bon)
    {
        abort_if(Gate::denies('bon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bon->load('bons');

        return view('admin.bons.show', compact('bon'));
    }

    public function destroy(Bon $bon)
    {
        abort_if(Gate::denies('bon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bon->delete();

        return back();
    }

    public function massDestroy(MassDestroyBonRequest $request)
    {
        $bons = Bon::find(request('ids'));

        foreach ($bons as $bon) {
            $bon->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
