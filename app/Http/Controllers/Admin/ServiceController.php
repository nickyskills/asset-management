<?php

namespace App\Http\Controllers\Admin;

use App\Cartegory;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyServiceRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Service;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('service_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $services = Service::all();

        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        abort_if(Gate::denies('service_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartegories = Cartegory::all()->pluck('name', 'id');

        return view('admin.services.create', compact('cartegories'));
    }

    public function store(StoreServiceRequest $request)
    {
        $service = Service::create($request->all());
        $service->cartegories()->sync($request->input('cartegories', []));

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $service->id]);
        }

        return redirect()->route('admin.services.index');
    }

    public function edit(Service $service)
    {
        abort_if(Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cartegories = Cartegory::all()->pluck('name', 'id');

        $service->load('cartegories');

        return view('admin.services.edit', compact('cartegories', 'service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());
        $service->cartegories()->sync($request->input('cartegories', []));

        return redirect()->route('admin.services.index');
    }

    public function show(Service $service)
    {
        abort_if(Gate::denies('service_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->load('cartegories');

        return view('admin.services.show', compact('service'));
    }

    public function destroy(Service $service)
    {
        abort_if(Gate::denies('service_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $service->delete();

        return back();
    }

    public function massDestroy(MassDestroyServiceRequest $request)
    {
        Service::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('service_create') && Gate::denies('service_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Service();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
