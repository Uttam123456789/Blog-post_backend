<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class Postcontroller extends Controller
{
    public function store(Request $req){
        $data = new Post;
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extensions = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extensions;
            $file->move('uploads/post', $fileName);
            // $filePath = 'uploads/post' . $fileName;
            $data->image=$fileName;
     }
     $data->title = $req->input('title');
     $data->desc = $req->input('desc');
     $data->user_id = $req->input('user_id');
     $data->category_id = $req->input('category_id');
     $data->save();
     return ['posted'=>'successfully'];
    // return $req;
    }

    public function destroy($id){
        $data = Post::find($id);
        $data->delete();
        return "Deleted Successfully";
    }


    public function update(Request $req , $id)
    {
        $data = Post::find($id);
        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extensions = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extensions;
            $file->move('uploads/post', $fileName);
            
            // $filePath = 'uploads/post/' . $fileName;
            $data->image=$fileName;
     }
     $data->title = $req->input('title');
     $data->desc = $req->input('desc');
        $data->update();
        return "updated";
        // return $data;
    }
    public function view(){
        

        $data = Post::all();
        return $data;

    }
}
