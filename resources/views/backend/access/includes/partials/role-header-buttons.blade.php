<div class="pull-right mb-10 hidden-sm hidden-xs">
    <a href="{{route('admin.auth.role.index')}}" class="btn btn-primary btn-xs">{{trans('menus.backend.access.roles.all')}}</a>
    <a href="{{route('admin.auth.role.create')}}" class="btn btn-success btn-xs">{{trans('menus.backend.access.roles.create')}}</a>
</div><!--pull right-->

<div class="pull-right mb-10 hidden-lg hidden-md">
    <div class="btn-group">
        <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            {{ trans('menus.backend.access.roles.main') }} <span class="caret"></span>
        </button>

        <ul class="dropdown-menu" role="menu">
            <li><a href="{{route('admin.auth.role.index')}}">{{trans('menus.backend.access.roles.all')}}</a></li>
            <li><a href="{{route('admin.auth.role.create')}}" class="">{{trans('menus.backend.access.roles.create')}}</a></li>
        </ul>
    </div><!--btn group-->
</div><!--pull right-->

<div class="clearfix"></div>