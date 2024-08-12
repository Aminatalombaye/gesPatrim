<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BonResource;
use App\Models\Bon;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BonApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bon_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BonResource(Bon::with(['bons'])->get());
    }

    public function show(Bon $bon)
    {
        abort_if(Gate::denies('bon_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BonResource($bon->load(['bons']));
    }

    public function destroy(Bon $bon)
    {
        abort_if(Gate::denies('bon_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bon->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
