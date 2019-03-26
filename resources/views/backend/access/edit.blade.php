@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.edit'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.edit') }}</small>
    </h1>
@endsection

@section('content')
    {{ html()->modelForm($user, 'PATCH', route('admin.auth.user.update', $user->id))->class('form-horizontal')->open() }}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit User</h3>
            <div class="box-tools">
                @include('backend.access.includes.partials.user-header-buttons')
            </div>
        </div>
        <div class="box-body">
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.first_name'))->class('col-md-2 form-control-label')->for('first_name') }}

                        <div class="col-md-10">
                            {{ html()->text('first_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.first_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.last_name'))->class('col-md-2 form-control-label')->for('last_name') }}

                        <div class="col-md-10">
                            {{ html()->text('last_name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.last_name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.email'))->class('col-md-2 form-control-label')->for('email') }}

                        <div class="col-md-10">
                            {{ html()->email('email')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.users.email'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.timezone'))->class('col-md-2 form-control-label')->for('timezone') }}

                        <div class="col-md-10">
                            <select name="timezone" id="timezone" class="form-control" required="required">
                                @foreach (timezone_identifiers_list() as $timezone)
                                    <option value="{{ $timezone }}" {{ $timezone == $logged_in_user->timezone ? 'selected' : '' }} {{ $timezone == old('timezone') ? ' selected' : '' }}>{{ $timezone }}</option>
                                @endforeach
                            </select>
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label('Abilities')->class('col-md-2 form-control-label') }}

                        <div class="table-responsive col-md-10">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>{{ __('labels.backend.access.users.table.roles') }}</th>
                                    <th>{{ __('labels.backend.access.users.permissions') }}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>
                                        @if ($roles->count())
                                            @foreach($roles as $role)
                                                <div class="box box-primary">
                                                    <div class="box-header">
                                                        <div class="checkbox">
                                                            {{ html()->label(
                                                                    html()->checkbox('roles[]', in_array($role->name, $userRoles), $role->name)
                                                                          ->class('switch-input')
                                                                          ->id('role-'.$role->id)
                                                                    . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                                ->class('switch switch-sm switch-3d switch-primary')
                                                                ->for('role-'.$role->id) }}
                                                            {{ html()->label(ucwords($role->name))->for('role-'.$role->id) }}
                                                        </div>
                                                    </div>
                                                    <div class="box-body">
                                                        @if ($role->id != 1)
                                                            @if ($role->permissions->count())
                                                                @foreach ($role->permissions as $permission)
                                                                    <i class="fas fa-dot-circle"></i> {{ ucwords($permission->name) }}
                                                                @endforeach
                                                            @else
                                                                {{ __('labels.general.none') }}
                                                            @endif
                                                        @else
                                                            {{ __('labels.backend.access.users.all_permissions') }}
                                                        @endif
                                                    </div>
                                                </div><!--card-->
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        @if ($permissions->count())
                                            @foreach($permissions as $permission)
                                                <div class="checkbox">
                                                    {{ html()->label(
                                                            html()->checkbox('permissions[]', in_array($permission->name, $userPermissions), $permission->name)
                                                                  ->class('switch-input')
                                                                  ->id('permission-'.$permission->id)
                                                            . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                                        ->class('switch switch-sm switch-3d switch-primary')
                                                        ->for('permission-'.$permission->id) }}
                                                    {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                                </div>
                                            @endforeach
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="box-footer">
            <div class="row">
                <div class="col-md-6">
                    {{ form_cancel(route('admin.auth.user.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col-md-6 text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--row-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection
