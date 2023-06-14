<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    // Show All Tasks, Completed Task, Incomplete Task
    public function index()
    {
        $data = [
            'title' => 'Task App',
            'tasks' => Tasks::latest('updated_at')->get(),
        ];
        return view('home', $data);
    }

    public function completed()
    {
        $data = [
            'title' => 'Completed Task',
            'tasks' => Tasks::where('status', 'Completed')->latest('updated_at')->get(),
        ];

        // dd($data);
        return view('completed', $data);
    }

    public function incomplete()
    {
        $data = [
            'title' => 'Incomplete Task',
            'tasks' => Tasks::where('status', 'Incomplete')->latest()->get(),
        ];
        return view('incomplete', $data);
    }

    // Create a new task
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);


        $store = Tasks::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'status' => $request->input('status'),
        ]);

        // dd($store);

        return redirect()->route('tasks.index')->with('success', "Your task have been added");
    }

    // Update task
    public function edit(string $id)
    {
        $data = [
            'title' => 'Update Task',
            'tasks' => Tasks::findOrFail($id),

        ];
        // dd($data);

        return view('update', $data);
    }

    public function update(Request $request, Tasks $tasks)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);

        $tasks->update($request->all());

        return redirect()->route('tasks.index')->with('successUpdate', 'Your task have been updated');
    }

    // Change Status
    public function updateStatus(Request $request, Tasks $tasks)
    {
        // $status = $request->validate([
        //     'status' => 'required',
        // ]);

        // $changeStatus = $status['status'] === 'Completed' ? 'Incomplete' : 'Completed';

        $tasks->update([
            'status' => $tasks->status === 'Completed' ? 'Incomplete' : 'Completed',
        ]);

        // dd($tasks);

        return redirect()->route('tasks.index')->with('successChangeStatus', 'Your task status has been changed');
    }


    // Destroy Task
    public function destroy(String $id)
    {
        $tasks = Tasks::findOrFail($id);

        $tasks->delete();

        return redirect()->back()->with('successDestroy', 'Task deleted successfully');
    }
}
