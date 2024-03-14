@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-lg-12 margin-tb col-md-8" >
                    <div class="pull-left">
                        <h2>Add New Task</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
                    </div>
                </div>
                <div class="col-md-8">
                        <div class="form-group">
                            <label>Task :</label>
                            <textarea type="text" name="task" class="form-control" placeholder="task details" disabled>{{$task->task}}</textarea>
                        </div>
                        <div class="form-group">
                            <lable>Status :</lable>
                            <input class="form-select" name="status" value="{{$task->status}}" disabled>
                        </div>
                        <div class="form-group">
                            <lable>Assigned to :</lable>
                            <select class="form-select" name="user_id" disabled>

                                <option selected value="" selected>{{$task->users->name}}</option>

                            </select>
                        </div>
                    <div class="col-md-8">
                        <h2>Comments</h2>
                        @foreach($comments as $comment)
                            <div class="card mb-1">
                                <div class="card-body ">
                                    <h5 class="card-title">@ {{ $comment->user->name}}</h5>
                                    <p class="card-text">{{ $comment->comment }}</p>
                                    <p class="card-text">@if($comment->user->id == session('user_id'))test @endif</p>
                                    <p class="card-text"><small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small></p>
                                </div>
                            </div>
                        @endforeach
                        <div class="card mb-3">
                            <div class="card-body">
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <div class="form-group">
                                        <textarea class="form-control" name="comment" rows="2" placeholder="Add a new comment"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
