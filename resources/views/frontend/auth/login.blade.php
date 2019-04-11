@extends('frontend.layouts.app')

@section('title', app_name() . ' | Login')

@section('content')
    <div class="container bg-white mt-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3"><i class="fa fa-cab pull-right"></i> {{ __('labels.frontend.auth.login_box_title') }}</h3>
                <hr style="border-width: .2rem;" class="w-50 my-1 pull-left border-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ html()->form('POST', route('frontend.auth.login.post'))->class('mt-3')->open() }}
                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.email'))->class('col-md-4 col-form-label')->for('email') }}
                    <div class="col-md-6">
                        {{ html()->email('email')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.email'))
                        ->required() }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.password'))->class('col-md-4 col-form-label')->for('password') }}
                    <div class="col-md-6">
                        {{ html()->password('password')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.password'))
                        ->required() }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

                <div class="form-group row">
                    <div class="offset-md-4 col-md-6">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            {{ html()->checkbox('remember', true, 1)->class('custom-control-input') }}
                            {{ html()->label(__('labels.frontend.auth.remember_me'))->class('custom-control-label')->for('remember') }}
                        </div>
                    </div>
                </div><!--form-group-->

                <div class="form-group clearfix">
                    {{ form_submit(__('labels.frontend.auth.login_button')) }}
                </div><!--form-group-->

                <div class="form-group text-right">
                    <a href="{{ route('frontend.auth.password.reset') }}">{{ __('labels.frontend.passwords.forgot_password') }}</a>
                </div><!--form-group-->
                {{ html()->form()->close() }}

                <div class="row">
                    <div class="col-md-8">
                        <div class="text-center">
                            {!! $socialiteLinks !!}
                        </div>
                    </div><!--col-->
                </div><!--row-->
            </div>
        </div>
    </div>
@endsection