@extends('frontend.layouts.app')

@section('content')
    <div class="container bg-white mt-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3"><i class="fa fa-cab pull-right"></i> {{ trans('navs.frontend.user.account') }}</h3>
                <hr style="border-width: .2rem;" class="w-50 my-1 pull-left border-primary">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-pills nav-justified" role="tablist">
                    <li role="presentation"  class="nav-item">
                        <a class="nav-link active" href="#profile" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.profile') }}</a>
                    </li>
                    <li role="presentation" class="nav-item">
                        <a class="nav-link" href="#edit" aria-controls="edit" role="tab" data-toggle="tab">{{ trans('labels.frontend.user.profile.update_information') }}</a>
                    </li>
                    @if ($logged_in_user->canChangePassword())
                        <li role="presentation" class="nav-item">
                            <a class="nav-link" href="#change-password" aria-controls="change-password" role="tab" data-toggle="tab">{{ trans('navs.frontend.user.change_password') }}</a>
                        </li>
                    @endif
                </ul>
                <div class="tab-content mt-2">
                    <div class="tab-pane mt-30 active" id="profile">
                        @include('frontend.user.account.tabs.profile')
                    </div>
                    <div class="tab-pane mt-30" id="edit">
                        @include('frontend.user.account.tabs.edit')
                    </div>
                    @if ($logged_in_user->canChangePassword())
                        <div class="tab-pane mt-30" id="change-password">
                            @include('frontend.user.account.tabs.change-password')
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection