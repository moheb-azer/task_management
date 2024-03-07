@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Add New Task</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
                    </div>
                </div>
                <div class="col-md-5">
                    <form action="{{ route('tasks.update',$task->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                        <div class="form-group">
                            <label>Task :</label>
                            <textarea type="text" name="task" class="form-control" placeholder="task details">{{$task->task}}</textarea>
                        </div>
                        <div class="form-group">
                            <lable>Status :</lable>
                            <select class="form-select" name="status">
                                <option value="Todo" @if($task->status == "Todo")selected @endif>Todo</option>
                                <option value="In progress"@if($task->status == "In progress")selected @endif >In progress</option>
                                <option value="Done" @if($task->status == "Done")selected @endif>Done</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Assigned to :</lable>
                            <select class="form-select" name="user_id">
                                @foreach($users as $user)
{{--                                <option value="{{$user->id}}" @if($user->id == $task->user_id)selected @endif >{{$user->name}}</option>--}}
                                <option value="{{$user->id}}" @selected($user->id == $task->users->id)>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
