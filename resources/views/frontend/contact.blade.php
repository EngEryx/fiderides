@extends('frontend.layouts.app')

@section('title', app_name() . ' | Contact Us')

@section('content')
    <div class="container bg-white mt-3">
        <div class="row">
            <div class="col-12 col-md-6 bg-light d-flex align-items-center py-5">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate dolorum eveniet iure laudantium libero neque, possimus praesentium provident quis ratione repellat vel velit vero. Autem illo quod reprehenderit repudiandae veritatis?</p>
            </div>
            <div class="col-12 col-md-6 my-5">
                {{ html()->form('POST', route('frontend.contact.send'))->class('form-horizontal')->open() }}

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.name'))->class('col-md-4 col-form-label')->for('name') }}
                    <div class="col-md-8">
                        {{ html()->text('name')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.name'))
                        ->required() }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.email'))->class('col-md-4 col-form-label')->for('email') }}
                    <div class="col-md-8">
                        {{ html()->email('email')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.email'))
                        ->required() }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.phone'))->class('col-md-4 col-form-label')->for('phone') }}
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary" type="button">+254</button>
                            </div>
                            <input type="text" name="phone" v-model="phone" placeholder="{{ __('validation.attributes.frontend.phone') }}" @change="sendVerificationCode" id="phone" class="form-control" required>
                        </div>
                    </div>
                </div><!--form-group row-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.message'))->class('col-md-4 col-form-label')->for('message') }}
                    <div class="col-md-8">
                        {{ html()->textarea('message')->class('form-control')
                         ->placeholder(__('validation.attributes.frontend.message'))
                         ->required()
                         }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

                <div class="form-group row">
                    <div class="col-md-6 offset-md-6">
                        {{ form_submit(__('labels.frontend.contact.button'))->class('btn btn-primary pull-right') }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection
