@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.bon.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.bons.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="bons">{{ trans('cruds.bon.fields.bon') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('bons') ? 'is-invalid' : '' }}" name="bons[]" id="bons" multiple required>
                    @foreach($bons as $id => $bon)
                        <option value="{{ $id }}" {{ in_array($id, old('bons', [])) ? 'selected' : '' }}>{{ $bon }}</option>
                    @endforeach
                </select>
                @if($errors->has('bons'))
                    <div class="invalid-feedback">
                        {{ $errors->first('bons') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bon.fields.bon_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_emission">{{ trans('cruds.bon.fields.date_emission') }}</label>
                <input class="form-control date {{ $errors->has('date_emission') ? 'is-invalid' : '' }}" type="text" name="date_emission" id="date_emission" value="{{ old('date_emission') }}" required>
                @if($errors->has('date_emission'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_emission') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bon.fields.date_emission_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="organisation">{{ trans('cruds.bon.fields.organisation') }}</label>
                <input class="form-control {{ $errors->has('organisation') ? 'is-invalid' : '' }}" type="text" name="organisation" id="organisation" value="{{ old('organisation', '') }}" required>
                @if($errors->has('organisation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('organisation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bon.fields.organisation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="reference_commande">{{ trans('cruds.bon.fields.reference_commande') }}</label>
                <input class="form-control {{ $errors->has('reference_commande') ? 'is-invalid' : '' }}" type="text" name="reference_commande" id="reference_commande" value="{{ old('reference_commande', '') }}" required>
                @if($errors->has('reference_commande'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reference_commande') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bon.fields.reference_commande_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date_livraison">{{ trans('cruds.bon.fields.date_livraison') }}</label>
                <input class="form-control {{ $errors->has('date_livraison') ? 'is-invalid' : '' }}" type="text" name="date_livraison" id="date_livraison" value="{{ old('date_livraison', '') }}" required>
                @if($errors->has('date_livraison'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date_livraison') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bon.fields.date_livraison_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nom_destinataire">{{ trans('cruds.bon.fields.nom_destinataire') }}</label>
                <input class="form-control {{ $errors->has('nom_destinataire') ? 'is-invalid' : '' }}" type="text" name="nom_destinataire" id="nom_destinataire" value="{{ old('nom_destinataire', '') }}" required>
                @if($errors->has('nom_destinataire'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nom_destinataire') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.bon.fields.nom_destinataire_helper') }}</span>
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