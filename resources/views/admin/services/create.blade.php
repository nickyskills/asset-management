@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.service.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.services.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.service.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cartegories') ? 'has-error' : '' }}">
                            <label for="cartegories">{{ trans('cruds.service.fields.cartegory') }}</label>
                            <div style="padding-bottom: 4px">
                                <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                            </div>
                            <select class="form-control select2" name="cartegories[]" id="cartegories" multiple>
                                @foreach($cartegories as $id => $cartegory)
                                    <option value="{{ $id }}" {{ in_array($id, old('cartegories', [])) ? 'selected' : '' }}>{{ $cartegory }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('cartegories'))
                                <span class="help-block" role="alert">{{ $errors->first('cartegories') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.cartegory_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label for="status">{{ trans('cruds.service.fields.status') }}</label>
                            <input class="form-control" type="text" name="status" id="status" value="{{ old('status', '') }}">
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.status_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('priority') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.service.fields.priority') }}</label>
                            <select class="form-control" name="priority" id="priority">
                                <option value disabled {{ old('priority', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Service::PRIORITY_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('priority', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('priority'))
                                <span class="help-block" role="alert">{{ $errors->first('priority') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.priority_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('usage') ? 'has-error' : '' }}">
                            <label for="usage">{{ trans('cruds.service.fields.usage') }}</label>
                            <textarea class="form-control ckeditor" name="usage" id="usage">{!! old('usage') !!}</textarea>
                            @if($errors->has('usage'))
                                <span class="help-block" role="alert">{{ $errors->first('usage') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.service.fields.usage_helper') }}</span>
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

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/services/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $service->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

@endsection