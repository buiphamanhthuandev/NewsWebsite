@extends('admin.layouts.app')

@section('title','Admin Website')

@section('content')
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
                            <th>Content</th>
                            <th>Create_at</th>
                            <th>Post</th>
                            <th>User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{$comment->content}}</td>
                                <td>{{$comment->created_at}}</td>
                                <td>{{$comment->post ? $comment->post->name : ''}}</td>
                                <td>{{$comment->user ? $comment->user->name : ''}}</td>        
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