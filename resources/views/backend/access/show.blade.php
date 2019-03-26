@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management') . ' | ' . trans('labels.backend.access.users.view'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.view') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">User Profile</h3>
            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.user-header-buttons')
            </div><!--box-tools pull-right-->
        </div>
        <div class="box-body">
            <div class="row mt-4 mb-4">
                <div class="col-md-12">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-expanded="true"><i class="fa fa-user"></i> {{ __('labels.backend.access.users.tabs.titles.overview') }}</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane active" id="overview" role="tabpanel" aria-expanded="true">
                            @include('backend.access.show.tabs.overview')
                        </div><!--tab-->
                    </div><!--tab-content-->
                </div><!--col-->
            </div><!--row-->
        </div><!--card-body-->

        <div class="box-footer">
            <div class="row">
                <div class="col-md-12">
                    <small class="float-right text-muted">
                        <strong>{{ __('labels.backend.access.users.tabs.content.overview.created_at') }}:</strong> {{ $user->updated_at->timezone(get_user_timezone()) }} ({{ $user->created_at->diffForHumans() }}),
                        <strong>{{ __('labels.backend.access.users.tabs.content.overview.last_updated') }}:</strong> {{ $user->created_at->timezone(get_user_timezone()) }} ({{ $user->updated_at->diffForHumans() }})
                        @if ($user->trashed())
                            <strong>{{ __('labels.backend.access.users.tabs.content.overview.deleted_at') }}:</strong> {{ $user->deleted_at->timezone(get_user_timezone()) }} ({{ $user->deleted_at->diffForHumans() }})
                        @endif
                    </small>
                </div><!--col-->
            </div><!--row-->
        </div><!--card-footer-->
    </div><!--card-->
@endsection