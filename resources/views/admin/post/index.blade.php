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


<h4> <a href="{{route('admin.post.create')}}" class="btn btn-primary">Thêm bài viết</a></h4>

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
                            <th>Views</th>
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
                                <td>{{$post->views}}</td>
                                <td>{{$post->created_at}}</td>
                                <td>{{$post->detail ? $post->detail->name : 'Warning detail'}}</td>
                                <td><a href="{{ route('admin.post.edit', ['id' => $post->id]) }}" class="btn btn-warning">Edit</a></td>
                                <td>
                                    <form action="{{route('admin.post.destroy',$post->id)}}" method="post" class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete-post btn btn-danger" data-id="{{$post->id}}">Del</button>
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

<script>
    $(document).ready(function(){
        $('.delete-post').on('click',function(e){
            e.preventDefault();

            let postID = $(this).data('id');
            if(confirm("Bạn có chắc muốn xóa bài viết!")){
                let code = prompt("Vui lòng nhập mật khẩu:");
                if(code === "apche123"){
                    $.ajax({
                        url:'/admin/post/'+ postID,
                        type : 'DELETE',
                        data:{
                            "_token":"{{ csrf_token()}}"
                        },
                        success:function(response){
                            alert(response.message);
                            location.reload();
                        },
                        error:function(response){
                            alert("Xóa không thành công,vui lòng thử lại!");
                        }
                    });
                }else{
                    alert("Nhập mật khẩu sai");
                }
            }
            
        });
    });
</script>
@endsection
