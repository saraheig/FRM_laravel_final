<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Task;
use App\Http\Requests\TaskStoreRequest;

class TasksController extends Controller
{
    
    public function index( Request $request ) {
        
        $done = $request->input('done', false);
        $tasks = Task::done($done)->orderByDesc('created_at')->get();
        return view('tasks.index')->with('tasks', $tasks);
    }
    
    public function show ( $id ) {
        
        // return view('tasks.show')->with('task', $this->tasks[$id]); 
        $task = Task::find($id);
        return view('tasks.show')->with('task', $task);
    }
    
    public function create () {
        
        return view('tasks.create');
    }
    
    public function store ( TaskStoreRequest $request ) {
        
        $task = Task::create($request->all());
        return redirect(route('tasks.index'));
    }
    
    // route model binding
    // see https://laravel.com/docs/5.4/routing#route-model-binding
    public function update ( Request $request, Task $task ) {
        
        $task->done = true;
        $task->save();
        $request->session()->flash('status', 'Task done !');
        return redirect(route('tasks.index', ['done' => true]));
    }
}
