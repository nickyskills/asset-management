@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.branch.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.branches.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.branch.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                            <label for="address">{{ trans('cruds.branch.fields.address') }}</label>
                            <input class="form-control" type="text" name="address" id="address" value="{{ old('address', '') }}">
                            @if($errors->has('address'))
                                <span class="help-block" role="alert">{{ $errors->first('address') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.address_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('contact_person') ? 'has-error' : '' }}">
                            <label for="contact_person">{{ trans('cruds.branch.fields.contact_person') }}</label>
                            <input class="form-control" type="text" name="contact_person" id="contact_person" value="{{ old('contact_person', '') }}">
                            @if($errors->has('contact_person'))
                                <span class="help-block" role="alert">{{ $errors->first('contact_person') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.contact_person_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('department') ? 'has-error' : '' }}">
                            <label for="department">{{ trans('cruds.branch.fields.department') }}</label>
                            <input class="form-control" type="text" name="department" id="department" value="{{ old('department', '') }}">
                            @if($errors->has('department'))
                                <span class="help-block" role="alert">{{ $errors->first('department') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.department_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('zone') ? 'has-error' : '' }}">
                            <label for="zone">{{ trans('cruds.branch.fields.zone') }}</label>
                            <input class="form-control" type="text" name="zone" id="zone" value="{{ old('zone', '') }}">
                            @if($errors->has('zone'))
                                <span class="help-block" role="alert">{{ $errors->first('zone') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.branch.fields.zone_helper') }}</span>
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