@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3 bg-white">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3">
                    <img src="{{ asset('img/frontend/cab-gifs/cab-1.gif') }}" class="img-fluid pull-right" width="120" alt="">
                    Book a Ride
                </h3>
                <hr style="width: 50%; border-width: .2rem;" class="my-1 pull-left border-primary">
            </div>
        </div>
        <div class="row">
            @foreach($rides as $ride)
                <div class="col-12 col-md-4 d-flex align-content-stretch">
                    <div class="card border-primary rounded-0 w-100 my-3">
                        <div class="box-body">
                            @include('frontend.includes.ride')
                            <div class="text-center">
                                <a href="{{ route('frontend.book.ride', $ride) }}" class="btn btn-primary text-white rounded-0">Book Ride</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

