@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.expense.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.expenses.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('expense_category') ? 'has-error' : '' }}">
                            <label for="expense_category_id">{{ trans('cruds.expense.fields.expense_category') }}</label>
                            <select class="form-control select2" name="expense_category_id" id="expense_category_id">
                                @foreach($expense_categories as $id => $expense_category)
                                    <option value="{{ $id }}" {{ old('expense_category_id') == $id ? 'selected' : '' }}>{{ $expense_category }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('expense_category'))
                                <span class="help-block" role="alert">{{ $errors->first('expense_category') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.expense_category_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('entry_date') ? 'has-error' : '' }}">
                            <label class="required" for="entry_date">{{ trans('cruds.expense.fields.entry_date') }}</label>
                            <input class="form-control date" type="text" name="entry_date" id="entry_date" value="{{ old('entry_date') }}" required>
                            @if($errors->has('entry_date'))
                                <span class="help-block" role="alert">{{ $errors->first('entry_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.entry_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('amount') ? 'has-error' : '' }}">
                            <label class="required" for="amount">{{ trans('cruds.expense.fields.amount') }}</label>
                            <input class="form-control" type="number" name="amount" id="amount" value="{{ old('amount', '') }}" step="0.01" required>
                            @if($errors->has('amount'))
                                <span class="help-block" role="alert">{{ $errors->first('amount') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.amount_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.expense.fields.description') }}</label>
                            <input class="form-control" type="text" name="description" id="description" value="{{ old('description', '') }}">
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.expense.fields.status') }}</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Expense::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('due_date') ? 'has-error' : '' }}">
                            <label for="due_date">{{ trans('cruds.expense.fields.due_date') }}</label>
                            <input class="form-control date" type="text" name="due_date" id="due_date" value="{{ old('due_date') }}">
                            @if($errors->has('due_date'))
                                <span class="help-block" role="alert">{{ $errors->first('due_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.due_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('created_by') ? 'has-error' : '' }}">
                            <label for="created_by_id">{{ trans('cruds.expense.fields.created_by') }}</label>
                            <select class="form-control select2" name="created_by_id" id="created_by_id">
                                @foreach($created_bies as $id => $created_by)
                                    <option value="{{ $id }}" {{ old('created_by_id') == $id ? 'selected' : '' }}>{{ $created_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('created_by'))
                                <span class="help-block" role="alert">{{ $errors->first('created_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.created_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('updated_by') ? 'has-error' : '' }}">
                            <label for="updated_by_id">{{ trans('cruds.expense.fields.updated_by') }}</label>
                            <select class="form-control select2" name="updated_by_id" id="updated_by_id">
                                @foreach($updated_bies as $id => $updated_by)
                                    <option value="{{ $id }}" {{ old('updated_by_id') == $id ? 'selected' : '' }}>{{ $updated_by }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('updated_by'))
                                <span class="help-block" role="alert">{{ $errors->first('updated_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.expense.fields.updated_by_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection