<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtiene el ID del usuario autenticado
        $userId = Auth::user()->id;

        // Filtra los todos que pertenecen al usuario autenticado
        $todos = Todo::where('user_id','=' ,$userId)->paginate(5);
        return view('todo', compact('todos'));
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
    public function store(StoreTodoRequest $request)
    {
        $todo = new Todo();
        $todo->title = $request->title;
        $todo->user_id = Auth::user()->id;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo creado satisfactoriamente');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $todo = Todo::findOrFail($id);
        if ($request->status == 'on') $todo->status = true;
        else $todo->status = false;
        $todo->save();

        return redirect()->route('todos.index')->with('success', 'Todo actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();

        return redirect()->route('todos.index')->with('success', 'Todo eliminado satisfactoriamente');
    }
}
