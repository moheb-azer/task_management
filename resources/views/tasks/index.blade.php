@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <table class="table table-striped table-hover table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tasks</th>
                        <th scope="col">Status</th>
                        <th scope="col">Assigned To</th>
                        <th scope="col">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tasks as $task)
                    <tr>
                        <th scope="row">{{$task-> id}}</th>
                        <td>{{$task->task}}</td>
                        <td>{{$task->status}}</td>
                        <td>{{$task->users->name}}</td>
                        <td>
{{--                            <a type="button" class="btn btn-success" href="/task/{{$task->id}}">View</a>--}}
                            <a type="button" class="btn btn-success" href="{{route('tasks.show',$task->id)}}">View</a>
{{--                            <a type="button" class="btn btn-primary" href="/task/{{$task->id}}/edit">Edit</a>--}}
                            <a type="button" class="btn btn-primary" href="{{route('tasks.edit',$task->id)}}">Edit</a>

                            <form action="{{ route('tasks.destroy',$task->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
{{--                            <a type="button" class="btn btn-danger" href="{{route('tasks.destroy',$task->id)}}">Delete</a>--}}
                            <button type="submit" class="btn btn-danger">Delete</button>
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
@endsection
