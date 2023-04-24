<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Note::where('user_id', Auth::user()->id)->latest('updated_at')->paginate(5);
        return view('tasks.index')->with('tasks', $tasks);
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);

        $task = new Task([              //nieuw object aan maken van task model
            'user_id' => Auth::id(),    //id van de huidige user in user_id zetten
            'title' => $request->title, //title (request) in title zetten
            'text' => $request->text    //text (request) in text zetten
        ]);
        $task->save();                  //het object opslaan en dus de rij opslaan in de tabel

        return to_route('task.index'); //redirect naar de route tasks.index

    }


    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view('tasks.show')->with('task', $task);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(task $task)
    {
        return view('tasks.edit')->with('task', $task);
    }


    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:120',
            'text' => 'required'
        ]);

        $task->update([
            'title' => $request->title,
            'text' => $request->text
        ]);

        return to_route('tasks.show', $task);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return to_route('tasks.index');
    }



}


