@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3 bg-white">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3">
                    <i class="fa fa-cab pull-right"></i> Book a Ride
                </h3>
                <hr style="border-width: .2rem;" class="w-50 my-1 pull-left border-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="box-body">
                        @include('frontend.includes.ride')
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 order-md-3 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="card-body p-0">
                        <h4 class="p-2 border-bottom">Book this ride</h4>
                        <img src="{{ asset('img/frontend/cab-gifs/cab-5.gif') }}" class="img-fluid mw-100 mt-md-4 d-block mx-auto" style="height: 120px;" alt="">
                    </div>
                    <div class="card-footer bg-white p-1">
                        <form class="form-inline" action="{{ route('frontend.book.trip', $ride) }}" method="post">
                            @csrf
                            <label class="sr-only" for="start">From</label>
                            <select name="start_id" id="start" class="form-control" required>
                                <option value="" selected disabled="">-- From --</option>
                                <option value="0">{{ $ride->start }}</option>
                                @foreach($ride->destinations()->orderBy('order')->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->destination }}</option>
                                @endforeach
                            </select>
                            <label class="sr-only" for="destination">To</label>
                            <select name="destination_id" id="destination" class="form-control" required>
                                <option value="" selected disabled="">-- To --</option>
                                @foreach($ride->destinations()->orderBy('order')->get() as $item)
                                    <option value="{{ $item->id }}">{{ $item->destination }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-outline-secondary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 order-md- d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="card-body p-0">
                        <h4 class="p-2 border-bottom">Send a parcel</h4>
                        <img src="{{ asset('img/frontend/cab-gifs/cab-4.gif') }}" class="img-fluid mw-100 d-block mx-auto" style="height: 150px;" alt="">
                    </div>
                    <div class="card-footer bg-white p-1">
                        <form class="form-inline" action="{{ route('frontend.book.parcel', $ride) }}" method="post">
                            @csrf
                            <label class="sr-only" for="weight">Weight</label>
                            <div class="input-group">
                                <input type="number" name="weight" class="form-control" id="weight" placeholder="Weight (kgs)" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-outline-secondary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

