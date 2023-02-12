<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactForm;
use App\Http\Requests\ContactFormRequest;

class TaskController extends Controller
{
    function renderTasks() {
        $id = Auth::id();
        $tasks = Task::select('*')->where('user_id', '=', $id);
		
		return view('tasks', [
		'Task'=>$tasks->paginate(10)
		]);
    }
  
    function saveTask(Request $request) {
        $Task = new Task;
        $Task->name = $request->Task;
        $Task->user_id = Auth::id();
        $Task->save();

        return redirect('/tasks');
    }

    function deleteTask($id) {
        $taskItem = Task::find($id);
        $taskItem->delete();

        return redirect('/tasks');
    }
}
