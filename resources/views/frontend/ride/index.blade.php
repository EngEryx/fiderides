@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3 bg-white">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3">
                    <i class="fa fa-cab pull-right badge badge-success"></i> My Rides
                </h3>
            </div>
        </div>
        <div class="row">
            @foreach($rides as $ride)
                <div class="col-12 col-md-6 d-flex align-content-stretch">
                    <div class="card border-primary rounded-0 w-100 my-3">
                        <div class="box-body">
                            <ul class="list-group list-group-flush mt-1">
                                <li class="list-group-item py-2">Ride starts at <span class="pull-right badge badge-success">{{ $ride->start }}</span></li>
                                <li class="list-group-item py-2">No of Passengers <span class="pull-right badge badge-success">{{ $ride->passengers }}</span></li>
                                @foreach($ride->destinations()->orderBy('order')->get() as $item)
                                    <li class="list-group-item py-2">Destination {{ ($ride->kind == 1) ? $loop->iteration : '' }} <span class="pull-right badge badge-success">{{ $item->destination }}</span></li>
                                @endforeach
                                <li class="list-group-item">Ride Duration <span class="pull-right badge badge-success">{{ $ride->start_time . ' - ' . $ride->end_time }}</span></li>
                            </ul>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('frontend.ride.edit', $ride) }}" class="btn btn-primary">Edit Ride</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

