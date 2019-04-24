@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3 bg-white">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3">
                    <i class="fa fa-cab pull-right badge badge-success"></i> My Rides
                    <a href="{{ route('frontend.ride.create') }}" class="btn btn-primary text-white pull-right">Add</a>
                </h3>
                <hr style="width: 50%; border-width: .2rem;" class="my-1 pull-left border-primary">
            </div>
        </div>
        <div class="row">
            @foreach($rides as $ride)
                <div class="col-12 col-md-6 d-md-flex align-content-stretch">
                    <div class="card border-primary rounded-0 w-100 my-3">
                        <div class="box-body">
                            @include('frontend.includes.ride')
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('frontend.ride.edit', $ride) }}" class="btn btn-primary text-white">Edit Ride</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

