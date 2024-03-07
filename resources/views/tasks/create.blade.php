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
                    <form action="{{ route('tasks.store') }}" method="POST">
                    @csrf
                        <div class="form-group">
                            <label>Task :</label>
                            <textarea type="text" name="task" class="form-control" placeholder="task details"></textarea>
                        </div>
                        <div class="form-group">
                            <lable>Status :</lable>
                            <select class="form-select" name="status">
                                <option selected value="Todo" >Todo</option>
                                <option value="In progress">In progress</option>
                                <option value="Done">Done</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <lable>Assigned to :</lable>
                            <select class="form-select" name="user_id">
                                @foreach($users as $user)
                                <option selected value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
