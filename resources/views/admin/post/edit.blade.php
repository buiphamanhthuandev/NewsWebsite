@extends('admin.layouts.app')

@section('title','Post Manager')

@section('content')
<h4>Form điền thông tin:</h4>
<form action="{{route('admin.post.update',$post_id->id)}}" method="post">
    @csrf
    @method('put')
   

    <div class="form-group">
        <label for="Name">Name:</label>
        <input type="text" class="form-control" id="Name" name="name" placeholder="Name..." value="{{isset($post_id) ? $post_id->name : ''}}">
    </div>
    <div class="form-group">
        <label for="Content">Content:</label>
        {{-- <input type="text" class="form-control" id="Content" name="content" placeholder="Content..." value="{{isset($post_id) ? $post_id->content : ''}}"> --}}
        <textarea class="form-control" name="content" id="content" rows="10" required >{{isset($post_id) ? $post_id->content : ''}}</textarea>
    </div>
    <div class="form-group">
        <label for="Author">Author:</label>
        <input type="text" class="form-control" id="Author" name="author" placeholder="Author..." value="{{isset($post_id) ? $post_id->author : ''}}">
    </div>
    <div class="form-group">
        <label for="Description">Categories:</label>
        <select class="form-control" name="detail_id" id="Detail_id">
            @foreach ($categories as $category)
                <option value="{{$category->id}}" {{isset($post_id) && $post_id->id == $category->id ? 'selected' : '' }}>{{$category->name}}</option> 
            
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="Image">Image:</label>
        <input type="file" class="form-control" id="Image" name="image"  value="{{isset($post_id) ? $post_id->image : ''}}">
    </div>
    <button type="submit" class="btn btn-default">Update</button>
</form>
<script>
    // Kích hoạt CKEditor trên textarea 'content'
    CKEDITOR.replace('content');
</script>
@endsection