{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->class('form-horizontal')->open() }}

    <div class="form-group row">
        {{ html()->label(__('validation.attributes.frontend.first_name'))->class('col-md-4 col-form-label')->for('first_name') }}
        <div class="col-md-6">
            {{ html()->text('first_name')
            ->class('form-control')->autofocus()
            ->placeholder(__('validation.attributes.frontend.first_name'))
            ->required() }}
        </div>
    </div>
    <div class="form-group row">
        {{ html()->label(__('validation.attributes.frontend.last_name'))->class('col-md-4 col-form-label')->for('last_name') }}
        <div class="col-md-6">
            {{ html()->text('last_name')
            ->class('form-control')
            ->placeholder(__('validation.attributes.frontend.last_name'))
            ->required() }}
        </div>
    </div>

    @if ($logged_in_user->canChangeEmail())
        <div class="form-group row">
            {{ html()->label(__('validation.attributes.frontend.email'))->class('col-md-4 col-form-label')->for('email') }}
            <div class="col-md-6">
                {{ html()->email('email')
                ->class('form-control')
                ->placeholder(__('validation.attributes.frontend.email'))
                ->required() }}
            </div>
        </div>
    @endif

    <div class="form-group row">
        <div class="col-md-6 offset-md-4">
            {{ form_submit(__('labels.general.buttons.update')) }}
        </div>
    </div>

{{ html()->closeModelForm() }}