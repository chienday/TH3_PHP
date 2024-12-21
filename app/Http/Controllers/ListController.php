<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $tasks = Task::paginate(5);
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        //$task = Task::find($id);
        // chuyển đổi on off 
        $completed = $request->has('completed') ? 1 : 0; 
        // Cập nhật task với các giá trị mới  theo hàng
        Task::create([ 'title' => $request->input('title'), 
                        'description' => $request->input('description'), 
                        'completed' => $completed]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {   $task = Task::find($id);
        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   $task = Task::find($id);
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $task = Task::find($id);
        // chuyển đổi on off 
        $completed = $request->has('completed') ? 1 : 0; 
        // Cập nhật task với các giá trị mới  theo hàng
        $task->update([ 'title' => $request->input('title'), 
                        'description' => $request->input('description'), 
                        'completed' => $completed]);

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {   
        $task = Task::find($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
    
}
