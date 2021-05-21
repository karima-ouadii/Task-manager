<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks=Task::all();

        return view('Task.index',['tasks'=>$tasks]);
    }

    public function create()
    {
        return view('Task.create');
    }

    public function store(Request $req)
    {
       $task=new Task();
       $task->title=$req->title;
       $task->save();
       return redirect('/');
    }

    public function destroy($id)
    {
        Task::find($id)->delete();
        return redirect('/');
    }
    
    public function update($id)
    {
       $tasks=Task::find($id);
      
       return view('task.updateTask',['tasks'=>$tasks]);
    }
    
    public function edit(Request $req,$id)
    {
       $task=Task::find($id);
       $task->title=$req->title;
       $task->save();
       return redirect('/');
    }


}
