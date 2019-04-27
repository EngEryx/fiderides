@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ ucwords(app_name()) }} <small>Payments</small>
    </h1>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h2 class="box-title">Payments</h2>
                    <div class="box-tools pull-right">
                        <button class="btn  btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped" id="bookings-table" width="100%">
                            <thead>
                            <tr>
                                <th>Created at</th>
                                <th>Txn Code</th>
                                <th>Phone</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Status</th>
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
            $('#bookings-table').DataTable({
                dom: 'lfrtip',
                processing: true,
                serverSide: true,
                autoWidth: false,
                ajax: {
                    url: '{{ route("admin.payment.table") }}',
                    type: 'post',
                    error: function (xhr, err) {
                        if (err === 'parsererror')
                            location.reload();
                    }
                },
                columns: [
                    {data: 'created_at', name: 'created_at'},
                    {data: 'trans_id', name: 'trans_id'},
                    {data: 'msisdn', name: 'msisdn'},
                    {data: 'kyc_name', name: 'kyc_name'},
                    {data: 'trans_amount', name: 'trans_amount'},
                    {data: 'status', name: 'status'}
                ],
                order: [[0, "desc"]]
            });
        });
    </script>
@endsection