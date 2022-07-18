@extends('layouts.admin')
@section('content')
{{--
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                <input type="text" disabled id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" >
                @if($errors->has('name'))
                    <em class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.name_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                <input type="email" disabled id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" >
                @if($errors->has('email'))
                    <em class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('cruds.user.fields.email_helper') }}
                </p>
            </div>

        </form>


    </div>
</div> --}}

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="mb-2">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $user->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $user->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $user->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Roles
                        </th>
                        <td>

                        <td>


            <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
<label for="roles">{{ trans('cruds.user.fields.roles') }}*
    <span class="select-all btn btn-info btn-xs">{{ trans('global.select_all') }}</span>
    <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
<select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
    @foreach($roles as $id => $roles)
        <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
    @endforeach
</select>
@if($errors->has('roles'))
    <em class="invalid-feedback">
        {{ $errors->first('roles') }}
    </em>
@endif
<p class="helper-block">
    {{ trans('cruds.user.fields.roles_helper') }}
</p>
</div>
<div>
<input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
</div>
            </form>
                        </td>
                        </td>
                    </tr>
                </tbody>
            </table>


            <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                {{ trans('global.back_to_list') }}
            </a>
        </div>


    </div>
</div>
@endsection
