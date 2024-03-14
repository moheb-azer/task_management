<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
//        dd($request->user_id);
        $users = User::all();
        $taskDesc ="";
        $tasks = Task::with('users');
        if ($request->has('task')) {
            $taskDesc = $request->input('task');
            if ($taskDesc !== null){
                $tasks->where('task', 'like', '%' . $taskDesc . '%');
            }
        }
//        dd($tasks);
        $userId='';
        if ($request->has('user_id')) {
            $userId = $request->input('user_id');
            if ($userId !== null) {
                $tasks->where('user_id', '=',$userId);
            }
        }
//        dd($tasks);
        $status ='';
        if ($request->has('status')) {
            $status = $request->input('status');
            if ($status !== null) {
                $tasks->where('status','like','%' . $status);
            }
        }

          $tasks = $tasks->orderBy('deadline','asc')->paginate(10);
//        dd($tasks);
        return view('tasks.index', compact('tasks','users','userId', 'status','taskDesc'));
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
        $comments = Comment::with('user')->where('task_id','=',$task->id)->get();
//        dd($comments);
        return view('tasks.show', compact('task','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $users = User::all();
        return view('tasks.edit', compact('task','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( Request $request, Task $task)
    {
        $task = Task::findOrFail($task->id);
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
        $task = Task::findOrFail($task->id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
