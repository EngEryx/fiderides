@extends('frontend.layouts.app')

@section('content')
    <div class="container bg-white mt-3">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3"><i class="fa fa-cab pull-right"></i> {{ trans('navs.frontend.dashboard') }}</h3>
                <hr style="border-width: .2rem;" class="w-50 my-1 pull-left border-primary">
            </div>
        </div>
        <br>
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
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-8 order-md-first">
                <div class="row">
                    <div class="col-md-6">
                        <div class="list-group list-group-flush mb-3">
                            <a href="#" class="list-group-item active">Confirmed Bookings</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list-group list-group-flush mb-3">
                            <a href="#" class="list-group-item active">Parcels Sent</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
