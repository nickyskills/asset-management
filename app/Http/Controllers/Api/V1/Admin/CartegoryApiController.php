<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Cartegory;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCartegoryRequest;
use App\Http\Requests\UpdateCartegoryRequest;
use App\Http\Resources\Admin\CartegoryResource;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CartegoryApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('cartegory_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CartegoryResource(Cartegory::all());
    }

    public function store(StoreCartegoryRequest $request)
    {
        $cartegory = Cartegory::create($request->all());

        return (new CartegoryResource($cartegory))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Cartegory $cartegory)
    {
        abort_if(Gate::denies('cartegory_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new CartegoryResource($cartegory);
    }

    public function update(UpdateCartegoryRequest $request, Cartegory $cartegory)
    {
        $cartegory->update($request->all());

        return (new CartegoryResource($cartegory))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Cartegory $cartegory)
    {
        abort_if(Gate::denies('cartegory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartegory->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
