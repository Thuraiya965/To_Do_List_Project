<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $task = new Task();
        $task->title = $request->input('title');
        $task->due_date = $request->input('due_date');
        $task->status = 1; // Set status to 1 (Active) by default
        $task->user_id = auth()->user()->id;
        $task->save();
        return ("added");

        return redirect()->route('dashboard');
    }

    public function index()
    {
        $user = Auth::user();
        $name = $user->name;
        $tasks = Task::where('user_id', $user->id)->get();

        return view('pages.dashboard', compact('name', 'tasks'));
    }

    public function toggleStatus(Request $request, $id)

    {
    
        $task = Task::find($id);
    
        if ($task) {
    
            $task->status = $task->status == 1? 0 : 1; // Toggle status
    
            $task->save();
    
            return redirect()->back()->with('success', 'Task status updated successfully!');
    
        }
    
        return redirect()->back()->with('error', 'Task not found!');
    
    }
    
    
    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('dashboard')->with('success', 'Task deleted successfully');
    }
}
