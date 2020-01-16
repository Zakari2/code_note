<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notebook;

class NotebooksController extends Controller
{
    public function ShowAddNootbookForm(){
        return view('notebooks.add-notebook');
    }

    public function addNotebook(Request $request){
        $title = $request->title;
        Notebook::create(['title'=>$title]);
        return redirect()->route('notebooks');
    }

    public function ShowNotebooks(){
        $notebooks = Notebook::all();
        return view('notebooks.notebooks', compact('notebooks'));
    }

    public function destroy($id){
        Notebook::destroy($id);
        return redirect()->route('notebooks');
    }

    public function showEditForm($id){
        $notebook = Notebook::find($id);
        return view('notebooks.update-notebook', compact('id', 'notebook'));
    }

    public function update(Request $request, $id){
        $title = $request->title;
        $notebook = Notebook::find($id);
        $notebook->update(['title'=>$title]);
        return redirect()->route('notebooks');

    }
}
