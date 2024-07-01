<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth; // Make sure this line is included
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->due_date = $request->input('due_date');
        $task->status = $request->input('status');
        $task->user_id = Auth::id(); // Assign the task to the logged-in user
        $task->save();

        return redirect()->route('dashboard');
    }



    public function index()
    {
        $user = Auth::user();
        $name = $user->name;
        $tasks = Task::where('user_id', $user->id)->get();

        return view('pages.dashboard', compact('name', 'tasks'));
    }

   public function toggleStatus(Request $request, Task $task)
{
    $task->status = $request->status;
    $task->save();

    return redirect()->route('dashboard'); // Redirect back to the dashboard or wherever you want
}



    public function edit($task)
    {
        $tasks = Task::findOrFail($task);

        return view('pages.edit', compact('tasks'));
    }

    public function update(Request $request, $task)
    {
        $tasks = Task::findOrFail($task);
        $tasks->title = $request->input('title');
        $tasks->due_date = $request->input('due_date');
        $tasks->status = $request->input('status');
        $tasks->save();

        return redirect()->route('dashboard')->with('success', 'task updated successfully');
    }

 public function destroy( Task $task) // Correct the variable name to $employee
    {
       
        $task->delete();

        return redirect()->route('dashboard')->with('success', 'task  deleted successfully'); // Add the missing semicolon
    }


}




