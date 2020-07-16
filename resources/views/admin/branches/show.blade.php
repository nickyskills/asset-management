@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.branch.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.branch.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $branch->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.branch.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $branch->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.branch.fields.address') }}
                                    </th>
                                    <td>
                                        {{ $branch->address }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.branch.fields.contact_person') }}
                                    </th>
                                    <td>
                                        {{ $branch->contact_person }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.branch.fields.department') }}
                                    </th>
                                    <td>
                                        {{ $branch->department }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.branch.fields.zone') }}
                                    </th>
                                    <td>
                                        {{ $branch->zone }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.branches.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li role="presentation">
                        <a href="#branch_employees" aria-controls="branch_employees" role="tab" data-toggle="tab">
                            {{ trans('cruds.employee.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" role="tabpanel" id="branch_employees">
                        @includeIf('admin.branches.relationships.branchEmployees', ['employees' => $branch->branchEmployees])
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection