@extends ('backend.layouts.app')

@section ('title', trans('labels.backend.access.users.management'))

@section('after-styles')
    {{ style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.users.management') }}
        <small>{{ trans('labels.backend.access.users.active') }}</small>
    </h1>
@endsection

@section('content')
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">{{ trans('labels.backend.access.users.active') }}</h3>

            <div class="box-tools pull-right">
                @include('backend.access.includes.partials.user-header-buttons')
            </div><!--box-tools pull-right-->
        </div><!-- /.box-header -->

        <div class="box-body">
            <div class="table-responsive">
                <table id="users-table" class="table table-condensed table-hover">
                    <thead>
                    <tr>
                        <th>#.</th>
                        <th>{{ trans('labels.backend.access.users.table.last_name') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.first_name') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.email') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.confirmed') }}</th>
                        <th>{{ trans('labels.backend.access.users.table.roles') }}</th>
                        <th>{{ trans('labels.general.actions') }}</th>
                    </tr>
                    </thead>
                </table>
            </div><!--table-responsive-->
        </div><!-- /.box-body -->
    </div><!--box-->
@endsection

@section('after-scripts')
    {{ script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ script("js/backend/plugin/datatables/dataTables-extend.js") }}

    <script>
        $(function () {
            $('#users-table').DataTable({
                dom: 'lfrtip',
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.auth.user.table") }}',
                    type: 'post',
                    data: {status: 1, trashed: false},
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            console.log(err);
                    }
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'last_name', name: 'last_name'},
                    {data: 'first_name', name: 'users.first_name'},
                    {data: 'email', name: 'users.email'},
                    {data: 'confirmed', name: 'users.confirmed'},
                    {data: 'roles' , sortable: false},
                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "desc"]],
                searchDelay: 500
            });
        });
    </script>
@endsection
