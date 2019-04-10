@extends('frontend.layouts.app')

@section('title', app_name() . ' | Register')

@section('content')
    <div class="container mt-3">
        <div class="row">

            <div class="col-12  px-0">

                <div class="card rounded-0">
                    <div class="card-header">{{ trans('labels.frontend.auth.register_box_title') }}</div>

                    <div class="card-body">

                        {{ html()->form('POST', route('frontend.auth.register.post'))->class('form-horizontal')->open() }}

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
                            {{ html()->label('Register as a')->class('col-md-4 col-form-label') }}
                            <div class="col-md-6">
                                <div class="icheck-primary icheck-inline">
                                    <input type="radio" name="role" id="passenger" value="{{ config('access.users.default_role') }}" checked>
                                    <label for="passenger">Passenger</label>
                                </div>
                                <div class="icheck-primary icheck-inline">
                                    <input type="radio" name="role" id="car-owner" value="car owner">
                                    <label for="car-owner">Car Owner</label>
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

                        <button id="submit" class="btn btn-primary pull-right" :class="{'disabled' : verification != check}" type="submit">Submit</button>

                        {{ html()->form()->close() }}

                    </div><!-- card body -->

                </div><!-- card -->

            </div><!-- col-md-8 -->

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