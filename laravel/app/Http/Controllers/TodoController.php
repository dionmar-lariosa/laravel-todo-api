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
        return TodoResource::collection(
            Todo::where('user_id', Auth::user()->id)->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTodoRequest $request)
    {
        $todo = Todo::create($request->validated());

        return TodoResource::make($todo);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todo $todo)
    {
        if (Auth::user()->id !== $todo->user_id) {
            return $this->error('', 'You are not authorized to make this request', 403);
        }

        return TodoResource::make($todo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodoRequest $request, Todo $todo)
    {
        $todo->update($request->validated());

        return TodoResource::make($todo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();

        return response()->json(['status' => 'success', 'message' => 'Todo deleted successfully']);
    }
}
