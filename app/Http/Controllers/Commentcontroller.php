<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
=======
use Illuminate\Http\Request;
>>>>>>> origin/master

class Commentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
<<<<<<< HEAD
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $user = Auth::user();
//        dd($user);
        $comment = new Comment();
        $comment -> task_id =$request['task_id'];
        $comment -> comment =$request['comment'];
        $comment -> user_id =$user->id;
//        dd($comment);
        $comment->save();
        return redirect()->route('tasks.show',[$request['task_id']]);
=======
    public function store(Request $request)
    {
        //
>>>>>>> origin/master
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
