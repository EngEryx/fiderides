<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{route('admin.auth.user.index')}}" class="btn btn-primary btn-xs">{{trans('menus.backend.access.users.all')}}</a>
    <a href="{{route('admin.auth.user.create')}}" class="btn btn-success btn-xs">{{trans('menus.backend.access.users.create')}}</a>
    <a href="{{route('admin.auth.user.deactivated')}}" class="btn btn-warning btn-xs">{{trans('menus.backend.access.users.deactivated')}}</a>
    <a href="{{route('admin.auth.user.deleted')}}" class="btn btn-danger btn-xs">{{trans('menus.backend.access.users.deleted')}}</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.users.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.auth.user.index')}}">{{trans('menus.backend.access.users.all')}}</a></li>
            <li><a href="{{route('admin.auth.user.create')}}">{{trans('menus.backend.access.users.create')}}</a></li>
            <li class="divider"></li>
            <li><a href="{{route('admin.auth.user.deactivated')}}">{{trans('menus.backend.access.users.deactivated')}}</a></li>
            <li><a href="{{route('admin.auth.user.deleted')}}">{{trans('menus.backend.access.users.deleted')}}</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>