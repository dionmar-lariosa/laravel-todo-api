<?php

namespace App\Http\Controllers;

use App\Models\Api\Todo;
use App\Http\Resources\TodoResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTodoRequest;
use App\Http\Requests\UpdateTodoRequest;
use App\Traits\HttpResponses;

class TodoController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::check()) {
            return TodoResource::collection(
                Todo::where('user_id', Auth::user()->id)->get()
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        if (Auth::check()) {
            $request->validated();
            $todo = Todo::create([
                'user_id' => Auth::user()->id,
                'todo' => $request->todo
            ]);

            return TodoResource::make($todo);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        $this->authorize('isValidUser', $todo);

        return TodoResource::make($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $this->authorize('isValidUser', $todo);
        $todo->update($request->validated());

        return TodoResource::make($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $this->authorize('isValidUser', $todo);
        $todo->delete();

        return response(null, 204);
    }
}
