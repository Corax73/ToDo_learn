<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    function renderTasks() {
        $tasks = Task::orderBy('created_at')->get();
		
		return view('tasks', [
		'Task'=>$tasks
		]);
    }
}
