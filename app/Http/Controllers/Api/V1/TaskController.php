<?php

namespace App\Http\Controllers\Api\V1;

// use App\Http\Controllers\Controller;
use Illuminate\Routing\Controller;
use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{

    public function __construct()
    {
        // Applying 'auth:sanctum' middleware to all methods except 'index' and 'show'
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return TaskResource::collection(Task::all());
    }

    /**
     * Show the form for creating a new resource.
     */

    // public function create(Task $task)
    // {
    //     //
    // }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        // return "helo";
        $task = $request->user()->tasks()->create($request->validated());

        return TaskResource::make($task);
    }

    /**
     * Display the specified resource.
     */

    public function show(Task $task)
    {
        $task->load('priority');
        return TaskResource::make($task);
    }

    /**
     * Show the form for editing the specified resource.
     */

    // public function edit(Task $task)
    // {
    //     //  
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        Gate::authorize('update', $task);
        $task->update($request->validated());   

        return TaskResource::make($task);
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {   
        Gate::authorize('forceDelete', $task);

        $task->delete();

        return response()->noContent();
    }
}
