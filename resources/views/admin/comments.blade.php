@extends('layouts.admin')
@section('title')
    Admin Comments
@endsection
@section('content')
    <div class="content">
        <div class="card">
                        <div class="card-header bg-light">
                            Admin Comments
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Post</th>
                                        <th>Content</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>                                    
                                    </thead>
                                    <tbody>
                                        @foreach($comments as $comment)
                                    <tr>
                                        <td>{{$comment->id}}</td>
                                        <td class="text-nowrap"><a href="{{route('singlePost',$comment->id)}}">{{$comment->post->title}}</a></td>
                                        <td>{{$comment->content}}</td>
                                        <td>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</td>
                                        <td>
                                       {{-- <form method="POST" id="deleteComment-{{$comment->id}}" action="{{route('adminDeleteComment',$comment->id)}}">@csrf</form> --}}
                                   <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteComment-{{$comment->id}}" class >X</button></td>
                                    </tr>
                                    @endforeach                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
    @foreach($comments as $comment)
    <div class="modal fade" id="deleteComment-{{$comment->id}}" tabindex="-1" role="dialog" arialabelledby="myModalLabel">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 style="text-align:center;" class="modal-title" id="myModalLabel">You are about to delete {{$comment->title}}</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">No, keep it</button>
                <form method="POST" id="deleteComment-{{$comment->id}}" action="{{route('adminDeleteComment',$comment->id)}}">@csrf        
            <button type="submit" class="btn btn-primary">Yes, Delete it.</button>
        </form>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    @endforeach
@endsection