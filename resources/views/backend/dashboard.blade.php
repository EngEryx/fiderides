@extends('backend.layouts.app')

@section('page-header')
    <h1>
        {{ app_name() }}
        <small>Administrative Dashboard</small>
    </h1>
@endsection

@section('content')
    <div class="box box-success">
        <div class="box-header with-border">
            <h3 class="box-title">Welcome {{ $logged_in_user->name }}!</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div><!-- /.box tools -->
        </div><!-- /.box-header -->
        <div class="box-body">
            Admin Panel
        </div><!-- /.box-body -->
    </div><!--box box-success-->
@endsection