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
                            @role('car owner')
                            @foreach($bookings as $booking)
                                <a href="#" class="list-group-item">{{ $booking->user->full_name }} <span class="pull-right">Kshs {{ number_format($booking->amount, 2) }}</span> <br> <span class="badge badge-primary text-white"><i class="fa fa-map-marker"></i> {{ $booking->details }}  <i class="fa fa-clock-o"></i> {{ $booking->ride->duration }}</span></a>
                            @endforeach
                            @endrole
                            @role('passenger')
                            @foreach($rides as $booking)
                                <a href="#" class="list-group-item">{{ $booking->details }} <span class="pull-right">Kshs {{ number_format($booking->amount, 2) }}</span> <br> <span class="badge badge-primary text-white"><i class="fa fa-user"></i> {{ $booking->ride->user->full_name }}  <i class="fa fa-clock-o"></i> {{ $booking->ride->duration }}</span></a>
                            @endforeach
                            @endrole
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="list-group list-group-flush mb-3">
                            <a href="#" class="list-group-item active">Parcels Sent</a>
                            @role('car owner')
                            @foreach($parcels as $parcel)
                                <a href="#" class="list-group-item">{{ $parcel->user->full_name }} <br> <span class="badge badge-primary text-white"><i class="fa fa-map-marker"></i> {{ $parcel->details }}  <i class="fa fa-clock-o"></i> {{ $parcel->ride->duration }}</span></a>
                            @endforeach
                            @endrole
                            @role('car owner')
                            @foreach($goods as $parcel)
                                <a href="#" class="list-group-item">{{ $parcel->details }} <br> <span class="badge badge-primary text-white"><i class="fa fa-user"></i> {{ $parcel->ride->user->full_name }}  <i class="fa fa-clock-o"></i> {{ $parcel->ride->duration }}</span></a>
                            @endforeach
                            @endrole
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
