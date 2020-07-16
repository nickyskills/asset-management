<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Expense;
use App\ExpenseCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyExpenseRequest;
use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ExpenseController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('expense_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Expense::with(['expense_category', 'created_by', 'updated_by'])->select(sprintf('%s.*', (new Expense)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'expense_show';
                $editGate      = 'expense_edit';
                $deleteGate    = 'expense_delete';
                $crudRoutePart = 'expenses';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->addColumn('expense_category_name', function ($row) {
                return $row->expense_category ? $row->expense_category->name : '';
            });

            $table->editColumn('amount', function ($row) {
                return $row->amount ? $row->amount : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? Expense::STATUS_SELECT[$row->status] : '';
            });

            $table->addColumn('created_by_employee_number', function ($row) {
                return $row->created_by ? $row->created_by->employee_number : '';
            });

            $table->editColumn('created_by.first_name', function ($row) {
                return $row->created_by ? (is_string($row->created_by) ? $row->created_by : $row->created_by->first_name) : '';
            });
            $table->editColumn('created_by.surname', function ($row) {
                return $row->created_by ? (is_string($row->created_by) ? $row->created_by : $row->created_by->surname) : '';
            });
            $table->addColumn('updated_by_employee_number', function ($row) {
                return $row->updated_by ? $row->updated_by->employee_number : '';
            });

            $table->editColumn('updated_by.first_name', function ($row) {
                return $row->updated_by ? (is_string($row->updated_by) ? $row->updated_by : $row->updated_by->first_name) : '';
            });
            $table->editColumn('updated_by.surname', function ($row) {
                return $row->updated_by ? (is_string($row->updated_by) ? $row->updated_by : $row->updated_by->surname) : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'expense_category', 'created_by', 'updated_by']);

            return $table->make(true);
        }

        $expense_categories = ExpenseCategory::get();
        $employees          = Employee::get();
        $employees          = Employee::get();

        return view('admin.expenses.index', compact('expense_categories', 'employees', 'employees'));
    }

    public function create()
    {
        abort_if(Gate::denies('expense_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense_categories = ExpenseCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $created_bies = Employee::all()->pluck('employee_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = Employee::all()->pluck('employee_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.expenses.create', compact('expense_categories', 'created_bies', 'updated_bies'));
    }

    public function store(StoreExpenseRequest $request)
    {
        $expense = Expense::create($request->all());

        return redirect()->route('admin.expenses.index');
    }

    public function edit(Expense $expense)
    {
        abort_if(Gate::denies('expense_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense_categories = ExpenseCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $updated_bies = Employee::all()->pluck('employee_number', 'id')->prepend(trans('global.pleaseSelect'), '');

        $expense->load('expense_category', 'created_by', 'updated_by');

        return view('admin.expenses.edit', compact('expense_categories', 'updated_bies', 'expense'));
    }

    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $expense->update($request->all());

        return redirect()->route('admin.expenses.index');
    }

    public function show(Expense $expense)
    {
        abort_if(Gate::denies('expense_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->load('expense_category', 'created_by', 'updated_by');

        return view('admin.expenses.show', compact('expense'));
    }

    public function destroy(Expense $expense)
    {
        abort_if(Gate::denies('expense_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $expense->delete();

        return back();
    }

    public function massDestroy(MassDestroyExpenseRequest $request)
    {
        Expense::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
