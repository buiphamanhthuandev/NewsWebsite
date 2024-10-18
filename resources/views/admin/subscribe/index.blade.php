@extends('admin.layouts.app')

@section('title','Admin Website')

@section('content')

<h4>Danh sách subscribes</h4>
<div class="col-lg-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Thời gian sub</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($subscribes as $subscribe)
                            <tr>
                                <td>{{$subscribe->id}}</td>
                                <td>{{$subscribe->email}}</td>
                                <td>{{$subscribe->created_at}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->
</div>
@endsection