<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:À faire,En cours,Terminé'
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => Auth::id()
        ]);

        return redirect()->route('tasks');
    }

    public function edit($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('edit_tasks', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'status' => 'required|in:À faire,En cours,Terminé'
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status
        ]);

        return redirect()->route('tasks');
    }

    public function destroy($id)
    {
        $task = Task::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $task->delete();

        return redirect()->route('tasks');
    }
}
