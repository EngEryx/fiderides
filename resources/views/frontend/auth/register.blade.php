@extends('frontend.layouts.app')

@section('title', app_name() . ' | Register')

@section('content')
    <div class="container bg-white mt-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3"><i class="fa fa-cab pull-right"></i> {{ __('labels.frontend.auth.register_box_title') }}</h3>
                <hr style="border-width: .2rem;" class="w-50 my-1 pull-left border-primary">
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                {{ html()->form('POST', route('frontend.auth.register.post'))->class('form-horizontal my-3')->open() }}

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.first_name'))->class('col-md-4 col-form-label')->for('first_name') }}
                    <div class="col-md-6">
                        {{ html()->text('first_name')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.first_name'))
                        ->required() }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

                <div class="form-group row">
                    {{ html()->label(__('validation.attributes.frontend.last_name'))->class('col-md-4 col-form-label')->for('last_name') }}
                    <div class="col-md-6">
                        {{ html()->text('last_name')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.last_name'))
                        ->required() }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

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
                    {{ html()->label(__('validation.attributes.frontend.phone'))->class('col-md-4 col-form-label')->for('phone') }}
                    <div class="col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button class="btn btn-primary text-white" type="button">+254</button>
                            </div>
                            <input type="text" name="phone" v-model="phone" placeholder="{{ __('validation.attributes.frontend.phone') }}" @change="sendVerificationCode" id="phone" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    {{ html()->label('Register as a')->class('col-md-4 col-form-label') }}
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-auto my-1">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" class="custom-control-input" name="role" id="passenger" value="{{ config('access.users.default_role') }}" checked>
                                    <label class="custom-control-label" for="passenger">Passenger</label>
                                </div>
                            </div>
                            <div class="col-auto my-1">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" class="custom-control-input" name="role" id="car-owner" value="car owner">
                                    <label class="custom-control-label" for="car-owner">Car Owner</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

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
                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->class('col-md-4 col-form-label')->for('password_confirmation') }}
                    <div class="col-md-6">
                        {{ html()->password('password_confirmation')
                        ->class('form-control')
                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                        ->required() }}
                    </div><!--col-md-6-->
                </div><!--form-group row-->

                <div class="form-group clearfix">
                    <button id="submit" class="btn btn-primary text-white pull-right" :class="{'disabled' : verification != check}" type="submit">Submit</button>
                </div>

                {{ html()->form()->close() }}

            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    {{--<script>
        window.appComponent = new Vue({
            el: '#app',
            data: {
                verification: null,
                check: null,
                error: false,
                phone: null
            },
            methods:{
                sendVerificationCode: function () {
                    if(this.phone === null || this.phone.length < 9) return;
                    axios.post('{{ route('frontend.json.verify') }}', {phone: this.phone})
                        .then((res) => {
                            if(res.data.success){
                                this.check = res.data.verification + '';
                                this.checkCode(false);
                            }else{
                                swal("Oops!", "Error sending verification code!", "warning");
                            }
                        })
                        .catch(function(err){
                            console.log(err);
                            swal("Oops!", "Error sending verification code!", "warning");
                        })
                },
                checkCode: function (length = true) {
                    if (!length){
                        $('#submit').attr('type', 'button');
                        if (this.verification === null || this.verification.length != 4) return;
                    }
                    this.error = (this.verification != this.check);
                    if (this.error){
                        $('#submit').attr('type', 'button')
                    }else{
                        $('#submit').attr('type', 'submit')
                    }
                }
            }
        });
    </script>--}}
@endpush