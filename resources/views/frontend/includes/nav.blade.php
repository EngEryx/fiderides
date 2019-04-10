<nav class="navbar navbar-expand-lg navbar-light bg-white">
    <a class="navbar-brand" href="{{ route('frontend.index') }}">{{ app_name() }}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav-toggle" aria-controls="nav-toggle" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="nav-toggle">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            @if (!$logged_in_user)
                <li class="nav-item"><a class="nav-link {{active_class(if_route('frontend.auth.login'))}}" href="{{route('frontend.auth.login')}}">Login</a></li>
                @if(config('access.registration'))
                    <li class="nav-item"><a class="nav-link {{active_class(if_route('frontend.auth.register'))}}" href="{{route('frontend.auth.register')}}">Register</a></li>
                @endif
                <li class="nav-item"><a class="nav-link {{active_class(if_route('frontend.contact'))}}" href="{{route('frontend.contact')}}">Contact Us</a></li>
            @else
                @can('view backend')
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.dashboard')}}">Administrator</a></li>
                @endcan
                <li class="nav-item"><a class="nav-link {{active_class(if_route('frontend.user.dashboard'))}}" href="{{route('frontend.user.dashboard')}}">Dashboard</a></li>
                @role('car owner')
                    <li class="nav-item"><a class="nav-link {{active_class(if_route('frontend.ride.index'))}}" href="{{route('frontend.ride.index')}}">Rides</a></li>
                @endrole
                <li class="nav-item"><a class="nav-link {{active_class(if_route('frontend.user.account'))}}" href="{{route('frontend.user.account')}}">Account</a></li>
                <li  class="nav-item"><a class="nav-link {{active_class(if_route('frontend.contact'))}}" href="{{route('frontend.contact')}}">Contact Us</a></li>
                <li  class="nav-item"><a class="nav-link" href="{{route('frontend.auth.logout')}}">Logout</a></li>
            @endif
        </ul>
    </div>
</nav>