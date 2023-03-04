<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [
            "message" => "Se ha consultado la lista de tareas.",
            "data" => Todo::all(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTodoRequest $request)
    {
        $request->validated();

        $data = Todo::create([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request?->status,
        ]);

        return response()->json([
            "message" => "Se ha creado con exito la tarea.",
            "data" => $data,
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Todo::where('id', $id)->firstOrFail();

        return response()->json([
            "message" => "Se ha encontrado la tarea.",
            "data" => $data,
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTodoRequest $request, $id)
    {

        $data = $request->validated();

        $todo = Todo::findOrFail($id);

        $todo->update($data);

        return response()->json([
            "message" => "Se ha actualizado la tarea.",
            "data" => $todo,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Todo::destroy($id);
        return [
            "message" => "Se borro con exito la tarea.",
        ];
    }
}
