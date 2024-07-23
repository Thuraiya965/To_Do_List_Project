<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Session;

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


       public function edit($id)
    {
        $task = Task::find($id);

        return view('tasks.edit')->with('taskUnderEdit', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
                'updatedTaskName' => 'required|max:255',
            ]);

        $task = Task::find($id);

        $task->title = $request->updatedTaskName;

        $task->save();

        Session::flash('success', 'Task #' . $id . ' has been successfully updated.');

        return redirect()->route('dashboard');
    }
}
