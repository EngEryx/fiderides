@extends('frontend.layouts.app')

@section('title', app_name() . ' | Login')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12  px-0">
                <div class="card rounded-0">
                    <div class="card-header">
                        <strong>
                            {{ __('labels.frontend.auth.login_box_title') }}
                        </strong>
                    </div><!--card-header-->

                    <div class="card-body">
                        {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
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

                        <div class="form-group">
                            <div class="checkbox">
                                {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}
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
                    </div><!--card body-->
                </div><!--card-->
            </div><!-- col-md-8 -->
        </div><!-- row -->
    </div>
@endsection