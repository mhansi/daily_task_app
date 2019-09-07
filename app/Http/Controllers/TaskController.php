<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function store(Request $request){
        $task = new Task;

        $this-> validate($request,[
            'task'=>'required|max:100|min:5',
       ]);
        //dd($request->all());
        $task->task=$request->task;
        $task->save();

        $data = Task::all();
        //dd($data);
        return view('task')->with('tasks',$data);
       // return redirect()->back();
    }

    public function updateTaskAsCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=1;
        $task->save();
        return redirect()->back();
    }

    public function updateTaskAsNotCompleted($id){
        $task=Task::find($id);
        $task->iscompleted=0;
        $task->save();
        return redirect()->back();
    }

    public function delete($id){
        $task=Task::find($id);
       
        $task->delete();
        return redirect()->back();
    }

    public function update($id){
        $task=Task::find($id);

        return view('updateTask')->with('taskdata',$task);
    }

    public function updateTask(Request $request){
        $id= $request->id;
        $task=$request->task;
        $data=Task::find($id);
     
        $data->task =$task;
        $data->save();
        $datas=Task::all();

        return view('/task')->with('tasks',$datas);
    }
}
