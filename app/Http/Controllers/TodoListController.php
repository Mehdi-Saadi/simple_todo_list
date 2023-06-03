<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        return view('index', ['items' => TodoList::where('is_complete', 0)->get(), 'itemsDone' => TodoList::where('is_complete', 1)->get()]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|max:100'
        ]);

        $listItem = new TodoList();
        $listItem->task = $validated['task'];
        $listItem->save();

        return redirect('/');
    }

    public function done($id)
    {
        $task = TodoList::find($id);
        $task->is_complete = 1;
        $task->save();

        return redirect('/');
    }

    public function delete($id)
    {
        $task = TodoList::find($id);
        $task->delete();

        return redirect('/');
    }
}
