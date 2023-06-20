<?php

namespace App\Http\Controllers;

use App\Models\Api\Todo;
use Illuminate\Http\Request;
use App\Http\Resources\TodoResource;

class CompleteTodoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, Todo $todo)
    {
        $todo->is_completed = $request->is_completed;
        $todo->save();

        return TodoResource::make($todo);
    }
}
