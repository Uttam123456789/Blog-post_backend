<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller
{
    public function store(Request $req)
    {

        $data = new User;
        // $req->validate([
        //     'name'=>'required',
        //     'email'=>'required|unique:users|email',
        //     'image'

        // ]);

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extensions = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extensions;
            $file->move('uploads', $fileName);
            $filePath = 'uploads/' . $fileName;
            $data->image=$filePath;
     }      
     $data->name = $req->input('name');
     $data->email = $req->input('mail');
     $data->role= $req->input('role');
     $data-> password  = HASH::make($req->input('password'));
     $data->save();

    
                   return "success";

    }

public function loginUser(Request $req){
    if(Auth::attempt([
        'email'=> $req->email,
        'password'=> $req->password
    ])){
    $user = Auth::user(); 
    $token = $user->createToken('API Token')->accessToken;
    
    return response([ 'user' => $user->email, 'userId' => $user->user_id, 'token' => $token]);
    // return $req;
    }
    else{
    return response()->json(['error'=>'Unauthorized Access'],202);
    }
   
    }
   public function home()
    {
        return ['hi'=>'uttam'];
    }

    public function logoutUser(Request $req)
    {

        $token = $req->user()->token();
        $token->revoke();
        return ['message'=> 'You have successfully logout!!'];
        // return $token;
    }

    public function update(Request $req , $id){
        $data = new User;

        if ($req->hasFile('image')) {
            $file = $req->file('image');
            $extensions = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extensions;
            $file->move('uploads', $fileName);
            $filePath = 'uploads/' . $fileName;
     }
        $data = User::find($id);
              $data->email= $req->input('mail');
              $data->image=$filePath;
              $data->update();

        return ['update'=>"successfully"]; 

    } 
    public function list($id)
       {

        $data = User::find($id);
                return $data;
        // return "hi";
       
       }
       public function detail(){
          $data =Post::where("category_id", 2)->get();
          
        //   $data->find(1);

          return $data;
        
      
       }
}
