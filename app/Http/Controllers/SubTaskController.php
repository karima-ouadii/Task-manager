<?php

namespace App\Http\Controllers;

use App\Models\SubTask;
use Illuminate\Http\Request;

class SubTaskController extends Controller
{
    public function store(Request $req)
    {
        $subTask=New SubTask();
        $subTask->content=$req->content;
        $subTask->task_id=$req->task_id;
        $subTask->save();
        return redirect('/');
    }
    public function delete($id)
    {
        SubTask::find($id)->delete();
        return redirect('/');
    }

    public function updateSubTask(Request $req,$id)
    {
       $task=SubTask::find($id);
       $task->content=$req->content;
       $task->update();
       return back();
    }
}
