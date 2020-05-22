@extends('layouts.admin')
@section('title')
    Admin Users
@endsection
@section('content')
    <div class="content">
        <div class="card">
                        <div class="card-header bg-light">
                            Admin Users
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Posts</th>
                                        <th>Comments</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>                                    
                                    </thead>
                                    <tbody>
                                        @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->id}}</td>
                                        <td class="text-nowrap">{{$user->name}}</a></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->posts->count()}}</td>
                                        <td>{{$user->comments->count()}}</td>
                                        <td>{{\Carbon\Carbon::parse($user->created_at)->diffForHumans()}}</td>
                                        <td>{{\Carbon\Carbon::parse($user->updated_at)->diffForHumans()}}</td>
                                        <td>
                                    <a href="{{route('adminEditUser',$user->id)}}" class="btn btn-warning"><i class="icon icon-pencil"></i></a>
                                    <form style="display: none;" method="POST" id="deleteUser-{{$user->id}}" action="{{route('adminDeleteUser',$user->id)}}">@csrf</form>
                                   <button type="button" class="btn btn-danger" onclick="document.getElementById('deleteUser-{{$user->id}}').submit()">X</button></td>
                                    </tr>
                                    @endforeach                                   
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
    </div>
   {{--  @foreach($posts as $post)
    <div class="modal fade" id="deletePostModal-{{$post->id}}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">You are about to delete {{$post->title}}</h4>
          </div>
          <div class="modal-body">
            <p>Are you sure?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    @endforeach --}}
@endsection