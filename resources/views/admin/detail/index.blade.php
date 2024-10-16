@extends('admin.layouts.app')

@section('title','Post Manager')

@section('content')
<div>
    @if (session()->has('success'))
        <div>
            {{session('success')}}
        </div>
    @endif
</div>
<h4>Form điền thông tin:</h4>
<form action="{{isset($category_id) ? route('admin.detail.update', $category_id->id) : route('admin.detail.store')}}" method="post">
    @csrf
    @if (isset($category_id))
        @method('put')
    @else
        @method('post')
    @endif
    
    <div class="form-group">
      <label for="Name">Name:</label>
      <input type="text" class="form-control" id="Name" name="name" placeholder="Name..." value="{{isset($category_id) ? $category_id->name : ''}}">
    </div>
    <div class="form-group">
      <label for="Description">Description:</label>
      <input type="text" class="form-control" id="Description" name="description" placeholder="Description..." value="{{isset($category_id) ? $category_id->description : ''}}">
    </div>
    <button type="submit" class="btn btn-default">{{isset($category_id) ? 'Update':'Add'}}</button>
</form>
<h4>Tìm kiếm tên chi tiết:</h4>
<form class="form-inline" method="POST" action="{{route('admin.detail.searchDetail')}}">
    @csrf
    @method('post')
    <div class="form-group">
      <label class="sr-only" for="Name">Name</label>
      <input type="text" class="form-control" id="Name" placeholder="Name" name="nameCategory">
    </div>
    <button type="submit" class="btn btn-default">Search</button>
</form>

<div>
    @if (isset($nameCategories))
    <h4>Danh sách tìm kiếm tên chi tiết</h4>
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
                                <th>Description</th>
                                <th>Create_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nameCategories as $nameCategory)
                                <tr>
                                    <td>{{$nameCategory->id}}</td>
                                    <td>{{$nameCategory->name}}</td>
                                    <td>{{$nameCategory->description}}</td>
                                    <td>{{$nameCategory->created_at}}</td>
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

<h4>Danh sách chi tiết bài viết:</h4>
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
                            <th>Description</th>
                            <th>Create_at</th>
                            <th>Edit</th>
                            <th>Del</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>{{$category->created_at}}</td>
                                <td><a href="{{route('admin.detail.index',['category_id' => $category->id])}}" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{route('admin.detail.destroy',$category->id)}}" method="post">
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

@endsection
