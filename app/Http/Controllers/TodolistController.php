<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodolistController extends Controller
{
    public function show(){
        return view('todo', [
            'todos' => \App\todolist::paginate(5),
            'count' => \DB::table('todolists')->count()
        ]);
    }

    public function create(){
        $todoitem = new \App\todolist();
        $todoitem->description = request('description');
        $todoitem->recipient = request('recipient');
        $todoitem->save();
        return redirect('todo');
    }    

    public function delete($id){
        \App\todolist::where('id', $id)->delete();
        return redirect('todo');
    }

    public function update($id){
        $todoitem = \App\todolist::find($id);
        $desc = $todoitem->description . ' - done';
        $todoitem->description = $desc;
        $todoitem->save();
        return redirect('todo');
    }    
}
