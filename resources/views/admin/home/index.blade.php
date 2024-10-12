@extends('admin.layouts.app')

@section('title','Admin Website')

@section('content')
<h4>Tìm kiếm tên liên hệ:</h4>
<form class="form-inline" method="post" action="{{route('admin.home.searchContact')}}">
    @csrf
    @method('post')
    <div class="form-group">
      <label class="sr-only" for="Name">Name: </label>
      <input type="text" class="form-control" id="Name" placeholder="Name" name="nameContact">
    </div>
    <button type="submit" class="btn btn-default">Search</button>
</form>
<div>
    @if (isset($nameContacts))
    <h4>Danh sách tìm kiếm tên liên hệ</h4>
        <div class="col-lg-12">
            <div class="panel panel-default">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Content</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($nameContacts as $nameContact)
                                    <tr>
                                        <td>{{$nameContact->id}}</td>
                                        <td>{{$nameContact->name}}</td>
                                        <td>{{$nameContact->email}}</td>
                                        <td>{{$nameContact->phone}}</td>
                                        <td>{{$nameContact->content}}</td>
                                        <td>{{$nameContact->created_at}}</td>
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
    @endif
</div>
<h4>Danh sách liên hệ:</h4>
<div class="col-lg-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Content</th>
                            <th>Created_at</th>
                            <th>Del</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{$contact->id}}</td>
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->email}}</td>
                                <td>{{$contact->phone}}</td>
                                <td>{{$contact->content}}</td>
                                <td>{{$contact->created_at}}</td>
                                <td>
                                    <form action="{{route('admin.home.destroy',$contact->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Del</button>
                                    </form>
                                </td>
         
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