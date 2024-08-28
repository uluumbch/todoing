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
        $todos = Todo::where('completed', false)->get();
        $completedTodos = Todo::where('completed', true)->get();
        return view('todo.index', [
            'title' => 'Todo List',
            'todos' => $todos,
            'done' => $completedTodos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);


        Todo::create($data);

        return redirect()->route('todos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Todo $todo)
    {
        $data = $request->validate([
            'title' => 'required',
            'description' => 'nullable'
        ]);

        $todo->update($data);

        return redirect()->route('todos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return redirect()->route('todos.index');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);

        return redirect()->route('todos.index');
    }
}
