@extends('frontend.layouts.app')

@section('title', app_name() . ' | Reset Password')

@section('content')
    <div class="container"  style="margin-top: 50px">
        <div class="row">

            <div class="col-12 px-0">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <div class="card card-default">

                    <div class="card-header">{{ trans('labels.frontend.passwords.reset_password_box_title') }}</div>

                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ html()->form('POST', route('frontend.auth.password.email.post'))->open() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.passwords.send_password_reset_link_button')) }}
                                </div><!--form-group-->
                            </div><!--col-->
                        </div><!--row-->
                        {{ html()->form()->close() }}
                    </div><!-- card body -->

                </div><!-- card -->

            </div><!-- col-md-8 -->

        </div><!-- row -->
    </div>
@endsection