@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('cruds.barcode.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Barcode">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.barcode.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.barcode.fields.code_barre') }}
                        </th>
                        <th>
                            {{ trans('cruds.barcode.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($barcodes as $key => $barcode)
                        <tr data-entry-id="{{ $barcode->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $barcode->id ?? '' }}
                            </td>
                            <td>
                                @foreach($barcode->code_barres as $key => $item)
                                    <span class="badge badge-info">{{ $item->serial_number }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $barcode->description ?? '' }}
                            </td>
                            <td>
                                @can('barcode_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.barcodes.show', $barcode->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan



                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
  
  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Barcode:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection