@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3 bg-white" v-cloak>
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3">
                    <i class="fa fa-cab pull-right"></i> Create A Ride
                </h3>
                <hr style="width: 50%; border-width: .2rem;" class="my-1 pull-left border-primary">
            </div>
            <div class="col-12">
                <form action="{{ old('id') ? route('frontend.ride.update', ['ride' => old('id')]):route('frontend.ride.store') }}" class="form-horizontal my-3" method="post">
                    {{ csrf_field() }} {{ old('id')?method_field('put'):'' }}
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group row">
                                <label for="start" class="col-md-4 col-form-label">Start</label>
                                <div class="col-md-8">
                                    <input type="text" name="start" id="start" class="form-control" value="{{ old('start') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="start_time" class="col-md-4 col-form-label">Start Time</label>
                                <div class="col-md-8">
                                    <input type="time" name="start_time" id="start_time" class="form-control" value="{{ old('start_time') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label">Destination type</label>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-auto my-1">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="radio" class="custom-control-input" v-model="ride.kind" name="kind" id="passenger" value="0">
                                                <label class="custom-control-label" for="passenger">Single Trip</label>
                                            </div>
                                        </div>
                                        <div class="col-auto my-1">
                                            <div class="custom-control custom-checkbox mr-sm-2">
                                                <input type="radio"  class="custom-control-input" v-model="ride.kind" name="kind" id="car-owner" value="1">
                                                <label class="custom-control-label" for="car-owner">Intercity Trip</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group row">
                                <label for="passengers" class="col-md-4 col-form-label">No of Passengers</label>
                                <div class="col-md-8">
                                    <input type="number" name="passengers" id="passengers" class="form-control" value="{{ old('passengers') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="end_time" class="col-md-4 col-form-label">Expected Arrival</label>
                                <div class="col-md-8">
                                    <input type="time" name="end_time" id="end_time" class="form-control" value="{{ old('end_time') }}">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="destination" class="col-md-4 col-form-label">Destination</label>
                                <div class="col-md-8">
                                    <input type="text" v-if="ride.kind == 0" name="destination" id="destination" class="form-control" value="{{ old('destination') }}">
                                    <textarea v-else name="destination" rows="1" placeholder="seperate with comma" class="form-control" id="destination">{{ old('destination') }}</textarea>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-outline-primary pull-right" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('after-scripts')
    <script>
        window.appComponent = new Vue({
            el: '#app',
            data: {
                ride: {kind: '{{ old('kind') ? 1 : 0 }}'}
            }
        })
    </script>
@endpush