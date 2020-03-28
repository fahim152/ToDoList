<?php

namespace App\Http\Controllers;

use App\TodoList;
use Illuminate\Http\Request;

class TodoListController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function taskEdit(Request $request)
    {
        TodoList::where('id', $request->taskId)->update(['task' => $request->editedText]);
    }
}
