<?php

namespace App\Http\Controllers\Admin;

use App\Cartegory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCartegoryRequest;
use App\Http\Requests\StoreCartegoryRequest;
use App\Http\Requests\UpdateCartegoryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CartegoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('cartegory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Cartegory::query()->select(sprintf('%s.*', (new Cartegory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'cartegory_show';
                $editGate      = 'cartegory_edit';
                $deleteGate    = 'cartegory_delete';
                $crudRoutePart = 'cartegories';

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
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : "";
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.cartegories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('cartegory_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cartegories.create');
    }

    public function store(StoreCartegoryRequest $request)
    {
        $cartegory = Cartegory::create($request->all());

        return redirect()->route('admin.cartegories.index');
    }

    public function edit(Cartegory $cartegory)
    {
        abort_if(Gate::denies('cartegory_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cartegories.edit', compact('cartegory'));
    }

    public function update(UpdateCartegoryRequest $request, Cartegory $cartegory)
    {
        $cartegory->update($request->all());

        return redirect()->route('admin.cartegories.index');
    }

    public function show(Cartegory $cartegory)
    {
        abort_if(Gate::denies('cartegory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartegory->load('cartegoryServices');

        return view('admin.cartegories.show', compact('cartegory'));
    }

    public function destroy(Cartegory $cartegory)
    {
        abort_if(Gate::denies('cartegory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartegory->delete();

        return back();
    }

    public function massDestroy(MassDestroyCartegoryRequest $request)
    {
        Cartegory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
