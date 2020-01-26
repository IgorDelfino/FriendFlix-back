<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function createUser(Request $request){
      $user = new User;

      $user->name =$request->name;
      $user->email =$request->email;
      $user->password =$request->password;
      $user->phone_number =$request->phone_number;
      $user->num_amigos =$request->num_amigos;

      $user->save();

      return response()->json([$user]);
    }
    public function listUser(){
      $user = User::all();
      return response()->json($user);

    }
    public function showUser($id){
      $user = User::findOrFail($id);
      return response()->json([$user]);
    }
    public function updateUser(Request $request, $id){
      $user = User::find($id);

      if($user){
        if($request->name){
          $user->name =$request->name;
        }
        if($request->email){
          $user->email =$request->email;
        }
        if($request->password){
          $user->password =$request->password;
        }
        if($request->phone_number){
          $user->phone_number =$request->phone_number;
        }
        if($request->num_amigos){
          $user->num_amigos =$request->num_amigos;
        }
        $user-> save();
        return response()->json([$user]);
      }
      else{
          return response()->json(['User nao existe']);
      }
    }
    public function deleteUser($id){
          User::destroy($id);
          return response()->json(['User deletado']);
        }


}
