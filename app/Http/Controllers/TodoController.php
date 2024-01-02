<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('todolist');
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
    public function store(Request $request)
    {
        
        Todo::create([
            'task' => $request->input('task'),
            'user_id' => \Auth::user()->id
        ]);

        session()->flash('messageAdd', 'Task Added Succesfully!'); 

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $tasks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Todo::destroy($id);

        session()->flash('messageDelete', 'Task Completed!'); 

        return redirect()->back();
    }
}