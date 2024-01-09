<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{
    public function index (Request $request){
        return view('saveItem', ['listItems' => ListItem::all()]);
    }

    public function saveItem (Request $request){
        $data = $request->all();

        $newListItem = new ListItem;
        $newListItem->name = $data['todo'];
        $newListItem->is_complete = 0;
        $newListItem->save();


        return redirect('/');
    }

    public function markComplete($id){
        $listItem = ListItem::find($id);

        $listItem->is_complete = 1;
        $listItem->save();
        return redirect('/');
    }

    public function markNotYet($id){
        $listItem = ListItem::find($id);

        $listItem->is_complete = 0;
        $listItem->save();
        return redirect('/');
    }

    public function delete($id){
        ListItem::where('id', $id)->firstorfail()->delete();
        return redirect('/');
    }
}
