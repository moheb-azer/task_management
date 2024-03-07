<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $tasks = Task::with('users')->paginate(10);
//        dd($tasks);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Task();
        $task -> task =$request['task'];
        $task -> status =$request['status'];
        $task -> user_id =$request['user_id'];
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        dd($task);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
//        dd($task);
        $users = User::all();
//
//        dd($users,$task);

        return view('tasks.edit', compact('task','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Task $task)
    {
//        dd($request);
//        $task->update($request->all());
        $task = Task::findOrFail($task->id);
//dd($task);

        // Update the task attributes
        $task -> task =$request['task'];
        $task -> status =$request['status'];
        $task -> user_id =$request['user_id'];
        // Add more attributes as needed
        // Save the updated task
        $task->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
//        TODO change to soft delete
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
