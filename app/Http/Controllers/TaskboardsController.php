<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Taskboard;    // 追加

class TaskboardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taskboards = Taskboard::all();

        return view('taskboards.index', [
            'taskboards' => $taskboards,
        ]);
    }
    public function show($id)
    {
        $taskboard = Taskboard::find($id);

        return view('taskboards.show', [
            'taskboard' => $taskboard,
        ]);
    }
    public function create()
    {
        $taskboard = new Taskboard;

        return view('taskboards.create', [
            'taskboard' => $taskboard,
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:191',
        ]);
        
        $taskboard = new Taskboard;
        $taskboard->content = $request->content;
        $taskboard->status = $request->status; 
        $taskboard->save();

        return redirect('/');
    }
    public function edit($id)
    {
        $taskboard = Taskboard::find($id);

        return view('taskboards.edit', [
            'taskboard' => $taskboard,
        ]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:191',
        ]);
        
        $taskboard = Taskboard::find($id);
        $taskboard->content = $request->content;
        $taskboard->status = $request->status;
        $taskboard->save();

        return redirect('/');
    }
    public function destroy($id)
    {
        $taskboard = Taskboard::find($id);
        $taskboard->delete();

        return redirect('/');
    }
}