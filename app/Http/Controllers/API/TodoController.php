<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Todo\StoreRequest;
use App\Models\Todo;
use App\Repositories\TodoRepository;
use App\Resources\TodoResource;

class TodoController extends Controller
{
    protected TodoRepository $todoRepository;

    public function __construct(TodoRepository $todoRepository)
    {
        $this->todoRepository = $todoRepository;
    }

    public function store(StoreRequest $request)
    {
        $todo = $this->todoRepository->store($request->validated());
        return new TodoResource($todo);
    }

    public function index()
    {
        $todos = Todo::get();
        return TodoResource::collection($todos);
    }

    public function show(int $todo)
    {
        $todo = Todo::findOrFail($todo);
        return new TodoResource($todo);
    }

    public function mark(Todo $todo)
    {
        $todo = $this->todoRepository->mark($todo);
        return new TodoResource($todo);
    }

    public function view(Todo $todo)
    {
        $todo = $this->todoRepository->view($todo);
        return new TodoResource($todo);
    }

    public function destroy(int $todo)
    {
        $todo = Todo::findOrFail($todo);
        if($todo->delete()){
            return new TodoResource($todo);
        }
    }
}
