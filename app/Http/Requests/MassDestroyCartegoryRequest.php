<?php

namespace App\Http\Requests;

use App\Cartegory;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyCartegoryRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('cartegory_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:cartegories,id',
        ];
    }
}
