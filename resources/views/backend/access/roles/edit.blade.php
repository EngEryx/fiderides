@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.edit'))

@section('page-header')
    <h4 class="card-title mb-0">
        {{ __('labels.backend.access.roles.management') }}
        <small class="text-muted">{{ __('labels.backend.access.roles.edit') }}</small>
    </h4>
@endsection

@section('content')
    {{ html()->modelForm($role, 'PATCH', route('admin.auth.role.update', $role))->class('form-horizontal')->open() }}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edit Role</h3>
            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.role-header-buttons')
            </div>
        </div>
        <div class="box-body">
            <div class="row mt-4">
                <div class="col-md-12">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.roles.name'))
                            ->class('col-md-2 form-control-label')
                            ->for('name') }}

                        <div class="col-md-10">
                            {{ html()->text('name')
                                ->class('form-control')
                                ->placeholder(__('validation.attributes.backend.access.roles.name'))
                                ->attribute('maxlength', 191)
                                ->required() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.roles.associated_permissions'))
                            ->class('col-md-2 form-control-label')
                            ->for('permissions') }}

                        <div class="col-md-10">
                            @if ($permissions->count())
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        {{ html()->label(
                                                html()->checkbox('permissions[]', in_array($permission->name, $rolePermissions), $permission->name)
                                                      ->class('switch-input')
                                                      ->id('permission-'.$permission->id)
                                                . '<span class="switch-label"></span><span class="switch-handle"></span>')
                                            ->class('switch switch-sm switch-3d switch-primary')
                                            ->for('permission-'.$permission->id) }}
                                        {{ html()->label(ucwords($permission->name))->for('permission-'.$permission->id) }}
                                    </div>
                                @endforeach
                            @endif
                        </div><!--col-->
                    </div><!--form-group-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->
        <div class="box-footer">
            <div class="row">
                <div class="col-md-6">
                    {{ form_cancel(route('admin.auth.role.index'), __('buttons.general.cancel')) }}
                </div><!--col-->

                <div class="col-md-6 text-right">
                    {{ form_submit(__('buttons.general.crud.update')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->closeModelForm() }}
@endsection

@section('after-scripts')
    {{ script('js/backend/access/roles/script.js') }}
@endsection