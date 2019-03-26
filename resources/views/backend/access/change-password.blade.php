@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.change_password'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.change_password') }}</small>
    </h1>
@endsection

@section('content')
    {{ html()->form('PATCH', route('admin.auth.user.change-password.post', $user))->class('form-horizontal')->open() }}
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">{{ __('labels.backend.access.users.change_password_for', ['user' => $user->name]) }}</h3>
        </div>
        <div class="box-body">
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.password'))->class('col-md-2 form-control-label')->for('password') }}

                        <div class="col-md-10">
                            {{ html()->password('password')
                                ->class('form-control')
                                ->placeholder( __('validation.attributes.backend.access.users.password'))
                                ->required()
                                ->autofocus() }}
                        </div><!--col-->
                    </div><!--form-group-->

                    <div class="form-group row">
                        {{ html()->label(__('validation.attributes.backend.access.users.password_confirmation'))->class('col-md-2 form-control-label')->for('password_confirmation') }}

                        <div class="col-md-10">
                            {{ html()->password('password_confirmation')
                                ->class('form-control')
                                ->placeholder( __('validation.attributes.backend.access.users.password_confirmation'))
                                ->required() }}
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
    {{ html()->form()->close() }}
@endsection