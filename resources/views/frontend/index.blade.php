@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3 bg-white">
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary mt-3">
                    <i class="fa fa-cab pull-right"></i> Welcome to {{ ucwords(app_name()) }}
                </h3>
                <hr style="border-width: .2rem;" class="w-50 my-1 pull-left border-primary">
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="box-body p-0">
                        <h4 class="p-2 border-bottom">Create rides</h4>
                        <img src="{{ asset('img/frontend/cab-gifs/cab-1.gif') }}" class="img-fluid mw-100 mt-md-4 d-block mx-auto" style="height: 120px;" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="card-body p-0">
                        <h4 class="p-2 border-bottom">Book rides</h4>
                        <img src="{{ asset('img/frontend/cab-gifs/cab-5.gif') }}" class="img-fluid mw-100 mt-md-4 d-block mx-auto" style="height: 120px;" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="card-body p-0">
                        <h4 class="p-2 border-bottom">Send parcels</h4>
                        <img src="{{ asset('img/frontend/cab-gifs/cab-4.gif') }}" class="img-fluid mw-100 d-block mx-auto" style="height: 150px;" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-4 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="box-body p-0">
                        <h4 class="p-2 border-bottom">Pay with your phone</h4>
                        <img src="{{ asset('img/frontend/mpesa/lipa-na-mpesa.jpg') }}" class="img-fluid mw-100 mt-md-4 d-block mx-auto" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="card-body p-0">
                        <h4 class="p-2 border-bottom">Get Notified</h4>
                        <img src="{{ asset('img/frontend/notification/notification.gif') }}" class="img-fluid mw-100 mt-md-4 d-block mx-auto" style="height: 120px;" alt="">
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 d-md-flex align-content-stretch">
                <div class="card border-primary rounded-0 w-100 my-3">
                    <div class="card-body p-0">
                        <h4 class="p-2 border-bottom">Carpool to destination</h4>
                        <img src="{{ asset('img/frontend/cab-gifs/cab-7.gif') }}" class="img-fluid mw-100 d-block mt-md-3 mx-auto" style="height: 150px;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection