<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Auth;

class TaskController extends Controller
{
    function index() {
        
        $id = Auth::id();

        $userTasks = User::find($id);

        return view('tasks', 
        [
            'Task' => $userTasks -> index-> sortBy('created_at')
        ]);
    }
  
    function saveTask(Request $request) {

        $name = $request -> validate( [
            'name' => 'required|unique:tasks|max:255'
        ]);
        $name = $request -> name;
        $Task = new Task;
        $Task -> saveTask($name) -> save();

        return redirect('/tasks');
    }

    function destroy($id) {
        $taskItem = Task::find($id);
        $taskItem->delete();

        return redirect('/tasks');
    }
}
