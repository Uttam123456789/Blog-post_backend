<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class Categorycontroller extends Controller
{
    public function store(Request $req){
        $data = new Category;
        $data->name = $req->input('name');
        $data->user_id = $req->input('user');
        $data->save();
        return ['category added'];
        
    }
    public function destroy($id){
        $data = Category::find($id);
        $data->delete();
        return $data;
    }
    public function update(Request $req , $id)
    {
        $data = Category::find($id);
        $data->name	= $req->input('name');
        $data->update();
        return "updated";
    }


    public function view(){
        $data = Category::all();
        return $data;
    }
}
