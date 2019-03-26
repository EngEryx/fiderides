{{ html()->form('patch', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}

<div class="form-group row">
    {{ html()->label(__('validation.attributes.frontend.old_password'))->class('col-md-4 col-form-label')->for('old_password') }}
    <div class="col-md-6">
        {{ html()->password('old_password')
        ->class('form-control')
        ->placeholder(__('validation.attributes.frontend.old_password'))
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
    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->class('col-md-4 col-form-label')->for('password_confirmation') }}
    <div class="col-md-6">
        {{ html()->password('password_confirmation')
        ->class('form-control')
        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
        ->required() }}
    </div><!--col-md-6-->
</div><!--form-group row-->

<div class="form-group row">
    <div class="col-md-6 offset-md-4">
        {{ form_submit(__('labels.frontend.passwords.reset_password_button')) }}
    </div>
</div>

{{ html()->form()->close() }}