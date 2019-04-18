@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ ucwords(app_name()) }} <small>Rides</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Rides</h2>
                    <div class="box-tools pull-right">
                        <button class="btn  btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="categories-table" width="100%">
                            <thead>
                            <tr>
                                <th>Created at</th>
                                <th>Owner</th>
                                <th>Duration</th>
                                <th>Passengers</th>
                                <th>Details</th>
{{--                                <th style="max-width: 40%;">{{ trans('labels.general.actions') }}</th>--}}
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('after-styles')
    {{ style("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.css") }}
@endsection

@section('after-scripts')
    {{ script("https://cdn.datatables.net/v/bs/dt-1.10.15/datatables.min.js") }}
    {{ script("js/backend/plugin/datatables/dataTables-extend.js") }}
    <script>
        $(function() {
            $('#categories-table').DataTable({
                dom: 'lfrtip',
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.ride.table") }}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'user.full_name', name: 'user.full_name'},
                    {data: 'duration', name: 'duration'},
                    {data: 'passengers', name: 'passengers'},
                    {data: 'details', name: 'details'},
//                    {data: 'actions', name: 'actions', searchable: false, sortable: false}
                ],
                order: [[0, "desc"]]
            });
        });
    </script>
@endsection