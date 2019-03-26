@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-12 px-0">
                <div class="card">
                    <div class="card-header">
                        <i class="fa fa-home"></i> {{ trans('navs.general.home') }}
                    </div>
                    <div class="card-body">
                        {{ trans('strings.frontend.welcome_to', ['place' => app_name()]) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection