<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\User;


class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->paginate(10);
        $users = User::all();
        return view('tasks.index', compact('tasks', 'users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tittle' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tittle' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required',
            'status' => 'required',
            'due_date' => 'nullable|date',
        ]);
        $task = Task::find($id);
        $task->updated_at = now();
        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $task = Task::findOrFail($id);
            $task->delete();
            return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('tasks.index')->with('error', 'Failed to delete task.');
        }
    }
}
