@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3 bg-white" v-cloak>
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3">
                    <i class="fa fa-cab pull-right"></i> Create A Ride
                </h3>
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
                                <label class="col-md-4 col-form-label">Destination type</label>
                                <div class="col-md-8">
                                    <div class="icheck-primary icheck-inline">
                                        <input type="radio" v-model="ride.kind" name="role" id="passenger" value="0">
                                        <label for="passenger">Single Trip</label>
                                    </div>
                                    <div class="icheck-primary icheck-inline">
                                        <input type="radio" v-model="ride.kind" name="role" id="car-owner" value="1">
                                        <label for="car-owner">Intercity Trip</label>
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