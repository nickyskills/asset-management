@extends('layouts.admin')
@section('content')
<div class="content">
    @can('expense_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.expenses.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.expense.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.expense.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Expense">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.expense_category') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.entry_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.amount') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.description') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.status') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.due_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.created_by') }}
                                </th>
                                <th>
                                    {{ trans('cruds.employee.fields.first_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.employee.fields.surname') }}
                                </th>
                                <th>
                                    {{ trans('cruds.expense.fields.updated_by') }}
                                </th>
                                <th>
                                    {{ trans('cruds.employee.fields.first_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.employee.fields.surname') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                            <tr>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($expense_categories as $key => $item)
                                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search" strict="true">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach(App\Expense::STATUS_SELECT as $key => $item)
                                            <option value="{{ $key }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($employees as $key => $item)
                                            <option value="{{ $item->employee_number }}">{{ $item->employee_number }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <select class="search">
                                        <option value>{{ trans('global.all') }}</option>
                                        @foreach($employees as $key => $item)
                                            <option value="{{ $item->employee_number }}">{{ $item->employee_number }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                    <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                </td>
                                <td>
                                </td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('expense_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.expenses.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.expenses.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'expense_category_name', name: 'expense_category.name' },
{ data: 'entry_date', name: 'entry_date' },
{ data: 'amount', name: 'amount' },
{ data: 'description', name: 'description' },
{ data: 'status', name: 'status' },
{ data: 'due_date', name: 'due_date' },
{ data: 'created_by_employee_number', name: 'created_by.employee_number' },
{ data: 'created_by.first_name', name: 'created_by.first_name' },
{ data: 'created_by.surname', name: 'created_by.surname' },
{ data: 'updated_by_employee_number', name: 'updated_by.employee_number' },
{ data: 'updated_by.first_name', name: 'updated_by.first_name' },
{ data: 'updated_by.surname', name: 'updated_by.surname' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-Expense').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  $('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value
      table
        .column($(this).parent().index())
        .search(value, strict)
        .draw()
  });
});

</script>
@endsection