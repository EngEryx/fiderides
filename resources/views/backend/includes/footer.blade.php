<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
        <a href="{{ route(home_route()) }}">{{ app_name() }}</a>
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; {{ date('Y') }} <a href="#">{{ app_name() }}</a>.</strong> {{ trans('strings.backend.general.all_rights_reserved') }}
</footer>
