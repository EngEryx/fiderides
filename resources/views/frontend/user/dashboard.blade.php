@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 px-0">
                <div class="card">
                    <div class="card-header">{{ trans('navs.frontend.dashboard') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 order-md-last">
                                <ul class="media-list">
                                    <li class="media">
                                        <img class="align-self-center profile-picture mr-3" src="{{ $logged_in_user->picture }}" alt="">
                                        <div class="media-body">
                                            <h5 class="media-header">
                                                {{ $logged_in_user->name }}<br/>
                                                <small>
                                                    {{ $logged_in_user->email }}<br/>
                                                    {{ trans('strings.frontend.general.joined') }} {{ $logged_in_user->created_at->format('F jS, Y') }}
                                                </small>
                                            </h5>

                                            {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-sm']) }}

                                            @if(auth()->user()->hasPermissionTo('view backend'))
                                                {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-sm']) }}
                                            @endif
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-8 order-md-first">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
