<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;   //追加（App不要（Task::all()））

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()     //トップ
    {
        $task = Task::all();

        return view('tasks.index', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()    //新規作成
    {
        $task = new Task;

        return view('tasks.create', [
            'task' => $task,
        ]);    
            $this->validate($request, [
            'content' => 'required|max:255',
            'title' => 'required|max:255',
            'status' => 'required|max:10',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $task = new Task; 
        $task->content = $request->content;
        $task->title = $request->title;
        $task->status = $request->status; 
        $task->save();
        
        $this->validate($request, [
            'content' => 'required|max:255',
            'title' => 'required|max:255',
            'status' => 'required|max:10',
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)   //詳細
    {
        $task = Task::find($id);

        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)   //編集
    {
        $task = Task::find($id);

        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)   //更新
    {
        $task = Task::find($id);
        $task->content = $request->content;
        $task->title = $request->title;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)    //削除
    {
        $task = Task::find($id);
        $task->delete();

        return redirect('/');
    }
}
