@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <form action="{{ route('tasks.index') }}" method="GET" >
                    <label>
                        <input type="text" name="task" placeholder="Search tasks" class="task" value="{{$taskDesc}}">
                    </label>
                    <lable>Task status</lable>
                <label>
                    <select class="form-select" name="status">
                        <option selected value="" >Select</option>
                        <option value="Todo" @selected($status == "Todo")>Todo</option>
                        <option value="In progress" @selected($status == "In progress")>In progress</option>
                        <option value="Done" @selected($status == "Done")>Done</option>
                    </select>
                </label>

                <lable>Assigned to :</lable>
                <label>
                    <select class="form-select" name="user_id">
                        <option selected value="" >Select</option>
                        @foreach($users as $user)
                            <option value="{{$user->id}}" @selected($user->id == $userId)>{{$user->name}}</option>
                        @endforeach
                    </select>
                </label>

                    <button type="submit" class="btn btn-outline-primary">search</button>

                </form>
            </div>
            <br>
            <br>

            <div class="col-md-12">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tasks</th>
                        <th scope="col">Status</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Dead Line</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                        @php
                            $today = \Carbon\Carbon::now()->toDateString();
                        @endphp
                    <tr class="{{$task->deadline <= today() && $task->status !== 'Done' ? 'text-danger' : '' }}">
                        <th scope="row" class="{{$task->deadline <= $today && $task->status !== 'Done' ? 'text-danger' : '' }}">{{$task-> id}}</th>
                        <td class="{{$task->deadline <= today() && $task->status !== 'Done' ? 'text-danger' : '' }}">{{$task->task}}</td>
                        <td class="{{$task->deadline <= today() && $task->status !== 'Done' ? 'text-danger' : '' }}">{{$task->status}}</td>
                        <td class="{{$task->deadline <= $today && $task->status !== 'Done' ? 'text-danger' : '' }}">{{$task->users->name}}</td>
                        <td class="{{$task->deadline <= $today && $task->status !== 'Done' ? 'text-danger' : '' }}">
                            {{$task->deadline}}</td>
                        <td >
{{--                            <a type="button" class="btn btn-success" href="/task/{{$task->id}}">View</a>--}}
                            <a type="button" class="btn btn-outline-success" href="{{route('tasks.show',$task->id)}}">View</a>
{{--                            <a type="button" class="btn btn-primary" href="/task/{{$task->id}}/edit">Edit</a>--}}
                            <a type="button" class="btn btn-outline-primary" href="{{route('tasks.edit',$task->id)}}">Edit</a>

                            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
{{--                            <a type="button" class="btn btn-danger" href="{{route('tasks.destroy',$task->id)}}">Delete</a>--}}
                            <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$tasks->links()}}
            </div>
        </div>
    </div>



    <script>

    </script>

@endsection
