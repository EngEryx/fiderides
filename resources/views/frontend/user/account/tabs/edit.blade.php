{{ html()->modelForm($logged_in_user, 'PATCH', route('frontend.user.profile.update'))->attribute('enctype', 'multipart/form-data')->class('form-horizontal')->open() }}

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

<div class="form-group row">
    {{ html()->label(__('validation.attributes.frontend.phone'))->class('col-md-4 col-form-label')->for('phone') }}
    <div class="col-md-6">
        <div class="input-group">
            <div class="input-group-prepend">
                <button class="btn btn-primary text-white" type="button">+254</button>
            </div>
            <input type="text" name="phone" v-model="phone" placeholder="{{ __('validation.attributes.frontend.phone') }}" value="{{ $logged_in_user->phone }}" id="phone" class="form-control" required>
        </div>
    </div>
</div>

<div class="form-group row">
    {{ html()->label(__('validation.attributes.frontend.avatar'))->class('col-md-4 col-form-label')->for('avatar') }}

    <div class="col-md-6">
        <div class="row">
            <div class="col-auto my-1">
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input class="custom-control-input" id="gravatar" type="radio" name="avatar_type" value="gravatar" {{ $logged_in_user->avatar_type == 'gravatar' ? 'checked' : '' }} />
                    <label class="custom-control-label" for="gravatar">Gravatar</label>
                </div>
            </div>
            <div class="col-auto my-1">
                <div class="custom-control custom-checkbox mr-sm-2">
                    <input class="custom-control-input" id="upload" type="radio" name="avatar_type" value="storage" {{ $logged_in_user->avatar_type == 'storage' ? 'checked' : '' }} />
                    <label class="custom-control-label" for="upload">Upload</label>
                </div>
            </div>

            @foreach ($logged_in_user->providers as $provider)
                @if (strlen($provider->avatar))
                    <div class="col-auto my-1">
                        <div class="custom-control custom-checkbox mr-sm-2">
                            <input class="custom-control-input" id="{{ $loop->iteration }}" type="radio" name="avatar_type" value="{{ $provider->provider }}" {{ $logged_in_user->avatar_type == $provider->provider ? 'checked' : '' }} />
                            <label class="custom-control-label" for="{{ $loop->iteration }}">{{ ucfirst($provider->provider) }}</label>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div><!--form-group-->

<div class="form-group row hidden" id="avatar_location">
    <div class="col-md-6 offset-md-4">
        {{ html()->file('avatar_location')->class('form-control') }}
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

@push('after-scripts')
    <script>
        $(function() {
            var avatar_location = $("#avatar_location");

            if ($('input[name=avatar_type]:checked').val() === 'storage') {
                avatar_location.show();
            } else {
                avatar_location.hide();
            }

            $('input[name=avatar_type]').change(function() {
                if ($(this).val() === 'storage') {
                    avatar_location.show();
                } else {
                    avatar_location.hide();
                }
            });
        });
    </script>
@endpush