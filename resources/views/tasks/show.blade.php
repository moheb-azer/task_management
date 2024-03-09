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


                </div>
            </div>
        </div>
    </div>
@endsection
