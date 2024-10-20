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
                                    <form action="{{route('admin.detail.destroy',$category->id)}}" method="post" class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="delete-category btn btn-danger" data-id="{{ $category->id }} " data-name="{{ $category->name}}">Del</button>
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
        $('.delete-category').on('click', function(e){
            e.preventDefault();
            
            let categoryId = $(this).data('id');
            let categoryName = $(this).data('name');

            $.ajax({
                url:'/admin/detail/checkPostCount/'+ categoryId,
                type: 'GET',
                data:{
                    "_token":"{{ csrf_token() }}"
                },
                success : function(response){
                    let postCount = response.postCount;
                    if(postCount>0){
                        if(confirm(`Danh mục "${categoryName}" có ${postCount} bài viết liên quan. Bạn có muốn tiếp tục xóa!`)){
                            let code = prompt("Vui lòng nhập mật khẩu:");
                            if(code === "apche123"){
                                $.ajax({
                                    url:'/admin/detail/'+ categoryId,
                                    type:'DELETE',
                                    data:{
                                        "_token":"{{csrf_token()}}"
                                    },
                                    success : function(response){
                                        alert(response.message);
                                        location.reload();
                                    },
                                    error : function(response){
                                        alert('Xóa không thành công, vui lòng thử lại.');
                                    }
                                    
                                });
                            }else{
                                alert("Nhập mật khẩu sai");
                            }
                        }
                    }else{
                        if(confirm(`Danh mục "${categoryName} không có bài viết liên quan. Bạn có muốn tiếp tục xóa!"`)){
                            let code = prompt("Vui lòng nhập mật khẩu");
                            if(code === "apche123"){
                                $.ajax({
                                    url:'/admin/detail/'+ categoryId,
                                    type: 'DELETE',
                                    data:{
                                        "_token":"{{ csrf_token()}}"
                                    },
                                    success:function(response){
                                        alert(response.message);
                                        location.reload();
                                    },
                                    error: function(response){
                                        console.log("Status code: " + response.status); // In ra mã trạng thái
                                        console.log(response.responseText); // In ra nội dung phản hồi từ máy chủ
                                        alert('Xóa không thành công, vui lòng thử lại.');
                                    }
                                });
                            }else{
                                alert("Nhập mật khẩu sai");
                            }
                        }
                    }
                },
                error : function(response){
                    alert('có lỗi xảy ra khi kiểm tra bài viết!');
                }
            });

        });
    });
</script>
@endsection
