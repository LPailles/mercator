@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.workstation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.workstations.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.workstation.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workstation.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="type">{{ trans('cruds.workstation.fields.type') }}</label>
                <input class="form-control {{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" id="type" value="{{ old('type', '') }}">
                @if($errors->has('type'))
                    <div class="invalid-feedback">
                        {{ $errors->first('type') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workstation.fields.name_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.workstation.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workstation.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="site_id">{{ trans('cruds.workstation.fields.site') }}</label>
                <select class="form-control select2 {{ $errors->has('site') ? 'is-invalid' : '' }}" name="site_id" id="site_id">
                    @foreach($sites as $id => $site)
                        <option value="{{ $id }}" {{ old('site_id') == $id ? 'selected' : '' }}>{{ $site }}</option>
                    @endforeach
                </select>
                @if($errors->has('site'))
                    <div class="invalid-feedback">
                        {{ $errors->first('site') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workstation.fields.site_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="building_id">{{ trans('cruds.workstation.fields.building') }}</label>
                <select class="form-control select2 {{ $errors->has('building') ? 'is-invalid' : '' }}" name="building_id" id="building_id">
                    @foreach($buildings as $id => $building)
                        <option value="{{ $id }}" {{ old('building_id') == $id ? 'selected' : '' }}>{{ $building }}</option>
                    @endforeach
                </select>
                @if($errors->has('building'))
                    <div class="invalid-feedback">
                        {{ $errors->first('building') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.workstation.fields.building_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: []
      }
    );
  }

  $(".select2-free").select2({
        placeholder: "{{ trans('global.pleaseSelect') }}",
        allowClear: true,
        tags: true
    }) 

});
</script>
@endsection