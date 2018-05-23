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
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $taskboards = $user->taskboards()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'taskboards' => $taskboards,
            ];
            $data += $this->counts($user);

            return view('taskboards.index', $data);
        }else {
            return view('welcome');
        }
    }
    
    public function show($id)
    {
        if (\Auth::check()) {
            $taskboard = Taskboard::find($id);
            
            return view('taskboards.show', [
                'taskboard' => $taskboard
            ]);
        }else {
            return view('welcome');
        }
    }
    public function create()
    {
        
        $data = [];
        if (\Auth::check()) {
            $taskboard = new Taskboard;

             return view('taskboards.create', [
                'taskboard' => $taskboard,
              ]);
        }else {
            return view('welcome');
        }
        
        
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'status' => 'required|max:191',
        ]);
        
        $request->user()->taskboards()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);

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
            'content' => 'required|max:10',
            'status' => 'required|max:10',
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