@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.employee.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.employees.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('employee_number') ? 'has-error' : '' }}">
                            <label for="employee_number">{{ trans('cruds.employee.fields.employee_number') }}</label>
                            <input class="form-control" type="text" name="employee_number" id="employee_number" value="{{ old('employee_number', '') }}">
                            @if($errors->has('employee_number'))
                                <span class="help-block" role="alert">{{ $errors->first('employee_number') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.employee_number_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <label class="required" for="first_name">{{ trans('cruds.employee.fields.first_name') }}</label>
                            <input class="form-control" type="text" name="first_name" id="first_name" value="{{ old('first_name', '') }}" required>
                            @if($errors->has('first_name'))
                                <span class="help-block" role="alert">{{ $errors->first('first_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.first_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('middle_name') ? 'has-error' : '' }}">
                            <label for="middle_name">{{ trans('cruds.employee.fields.middle_name') }}</label>
                            <input class="form-control" type="text" name="middle_name" id="middle_name" value="{{ old('middle_name', '') }}">
                            @if($errors->has('middle_name'))
                                <span class="help-block" role="alert">{{ $errors->first('middle_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.middle_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('surname') ? 'has-error' : '' }}">
                            <label class="required" for="surname">{{ trans('cruds.employee.fields.surname') }}</label>
                            <input class="form-control" type="text" name="surname" id="surname" value="{{ old('surname', '') }}" required>
                            @if($errors->has('surname'))
                                <span class="help-block" role="alert">{{ $errors->first('surname') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.surname_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.employee.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('branch') ? 'has-error' : '' }}">
                            <label for="branch_id">{{ trans('cruds.employee.fields.branch') }}</label>
                            <select class="form-control select2" name="branch_id" id="branch_id">
                                @foreach($branches as $id => $branch)
                                    <option value="{{ $id }}" {{ old('branch_id') == $id ? 'selected' : '' }}>{{ $branch }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('branch'))
                                <span class="help-block" role="alert">{{ $errors->first('branch') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.employee.fields.branch_helper') }}</span>
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