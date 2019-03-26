@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.roles.management') . ' | ' . trans('labels.backend.access.roles.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.roles.management') }}
        <small>{{ trans('labels.backend.access.roles.create') }}</small>
    </h1>
@endsection

@section('content')
    {{ html()->form('POST', route('admin.auth.role.store'))->class('form-horizontal')->open() }}
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Create Role</h3>
            <div class="box-tools">
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
                                ->required()
                                ->autofocus() }}
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
                                                html()->checkbox('permissions[]', old('permissions') && in_array($permission->name, old('permissions')) ? true : false, $permission->name)
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
                    {{ form_submit(__('buttons.general.crud.create')) }}
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
    {{ html()->form()->close() }}
@endsection

@section('after-scripts')
    {{ script('js/backend/access/roles/script.js') }}
@endsection
