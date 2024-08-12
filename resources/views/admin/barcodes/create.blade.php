@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.barcode.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.barcodes.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="code_barres">{{ trans('cruds.barcode.fields.code_barre') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('code_barres') ? 'is-invalid' : '' }}" name="code_barres[]" id="code_barres" multiple required>
                    @foreach($code_barres as $id => $code_barre)
                        <option value="{{ $id }}" {{ in_array($id, old('code_barres', [])) ? 'selected' : '' }}>{{ $code_barre }}</option>
                    @endforeach
                </select>
                @if($errors->has('code_barres'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code_barres') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barcode.fields.code_barre_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.barcode.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.barcode.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection