@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.barcode.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barcodes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.barcode.fields.id') }}
                        </th>
                        <td>
                            {{ $barcode->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barcode.fields.code_barre') }}
                        </th>
                        <td>
                            @foreach($barcode->code_barres as $key => $code_barre)
                                <span class="label label-info">{{ $code_barre->serial_number }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.barcode.fields.description') }}
                        </th>
                        <td>
                            {{ $barcode->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.barcodes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection