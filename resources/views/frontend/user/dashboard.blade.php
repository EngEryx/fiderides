@extends('frontend.layouts.app')

@section('content')
    <div class="container mt-3">
        <div class="row">

            <div class="col-12 px-0">

                <div class="card card-default">
                    <div class="card-header">{{ trans('navs.frontend.dashboard') }}</div>

                    <div class="card-body">

                        <div class="row">

                            <div class="col-md-4 col-md-push-8">

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

                                            {{ link_to_route('frontend.user.account', trans('navs.frontend.user.account'), [], ['class' => 'btn btn-info btn-sm']) }}

                                            @if(auth()->user()->hasPermissionTo('view backend'))
                                                {{ link_to_route('admin.dashboard', trans('navs.frontend.user.administration'), [], ['class' => 'btn btn-danger btn-sm']) }}
                                            @endif
                                        </div><!--media-body-->
                                    </li><!--media-->
                                </ul><!--media-list-->

                                <div class="card card-default my-2">
                                    <div class="card-header">
                                        <h4>Sidebar Item</h4>
                                    </div><!--card-header-->

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div><!--card-body-->
                                </div><!--card-->

                                <div class="card card-default my-2">
                                    <div class="card-header">
                                        <h4>Sidebar Item</h4>
                                    </div><!--card-header-->

                                    <div class="card-body">
                                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.
                                    </div><!--card-body-->
                                </div><!--card-->
                            </div><!--col-md-4-->

                            <div class="col-md-8 col-md-pull-4">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card card-default my-2">
                                            <div class="card-header">
                                                <h4>Item</h4>
                                            </div><!--card-header-->

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>
                                            </div><!--card-body-->
                                        </div><!--card-->
                                    </div><!--col-12-->
                                </div><!--row-->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card card-default my-2">
                                            <div class="card-header">
                                                <h4>Item</h4>
                                            </div><!--card-header-->

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>
                                            </div><!--card-body-->
                                        </div><!--card-->
                                    </div><!--col-md-6-->

                                    <div class="col-md-6">
                                        <div class="card card-default my-2">
                                            <div class="card-header">
                                                <h4>Item</h4>
                                            </div><!--card-header-->

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>
                                            </div><!--card-body-->
                                        </div><!--card-->
                                    </div><!--col-md-6-->

                                    <div class="col-md-6">
                                        <div class="card card-default my-2">
                                            <div class="card-header">
                                                <h4>Item</h4>
                                            </div><!--card-header-->

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>
                                            </div><!--card-body-->
                                        </div><!--card-->
                                    </div><!--col-md-6-->

                                    <div class="col-md-6">
                                        <div class="card card-default my-2">
                                            <div class="card-header">
                                                <h4>Item</h4>
                                            </div><!--card-header-->

                                            <div class="card-body">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui facilis deleniti expedita fuga ipsum numquam aperiam itaque cum maxime.</p>
                                            </div><!--card-body-->
                                        </div><!--card-->
                                    </div><!--col-md-6-->

                                </div><!--row-->

                            </div><!--col-md-8-->

                        </div><!--row-->

                    </div><!--card body-->

                </div><!-- card -->

            </div><!-- col-md-10 -->

        </div><!-- row -->
    </div>
@endsection
