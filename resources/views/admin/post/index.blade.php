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


<h4> <a href="{{route('admin.post.create')}}">Thêm bài viết</a></h4>
<h4>Tìm kiếm tên bài viết:</h4>
<form class="form-inline" method="POST" action="{{route('admin.post.searchPost')}}">
    @csrf
    @method('post')
    <div class="form-group">
      <label class="sr-only" for="Name">Name</label>
      <input type="text" class="form-control" id="Name" placeholder="Name" name="namePost">
    </div>
    <button type="submit" class="btn btn-default">Search</button>
</form>

<div>
    @if (isset($namePosts))
    <h4>Danh sách tìm kiếm tên bài viết</h4>
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Content</th>
                                <th>Author</th>
                                <th>Create_at</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($namePosts as $namePost)
                                <tr>
                                    <td>{{$namePost->id}}</td>
                                    <td>{{$namePost->image}}</td>
                                    <td>{{$namePost->name}}</td>
                                    <td>{{$namePost->content}}</td>
                                    <td>{{$namePost->author}}</td>
                                    <td>{{$namePost->created_at}}</td>
                                    <td>{{$namePost->detail ? $namePost->detail->name : ''}}</td>
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

<h4>Danh sách bài viết:</h4>
<div class="col-lg-12">
    <div class="panel panel-default">
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Content</th>
                            <th>Author</th>
                            <th>Create_at</th>
                            <th>Detail</th>
                            <th>Edit</th>
                            <th>Del</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->image}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->content}}</td>
                                <td>{{$post->author}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->detail ? $post->detail->name : 'Warning detail'}}</td>
                                <td><a href="{{ route('admin.post.edit', ['id' => $post->id]) }}" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{route('admin.post.destroy',$post->id)}}" method="post">
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
