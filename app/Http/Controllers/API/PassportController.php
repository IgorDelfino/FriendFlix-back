<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;

class PassportController extends Controller
{
    public $successStatus = 200;
    public function register(Request $request){    
        $newUser = new User;
        $newUser->name = $request->name;
        $newUser->email = $request->email;
        $newUser->password = bcrypt($request->password);
        $newUser->date_birth = $request->date_birth;
        $newUser->user_name = $request->user_name;
        $newUser->followers = $request->followers;
        $newUser->following = $request->following;
        $newUser->save();
        $success['token'] = $newUser->createToken('MyApp')->accessToken;
        $success['name'] = $newUser->name;
        return response()->json(['success'=>$success]);
    }
    public function login(Request $request){
        if(Auth::attempt(['user_name' => request('user_name'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->accessToken;
            return response()->json(['success'=>$success], $this->successStatus);        
        }
        else{
            return response()->json(['error'=>'unauthorized'], 401);
        }
    }
    public function getDetails(){
        $user = Auth::user();
        return response() -> json(['success'=>$user],$this -> successStatus);
    }
    public function logout(){
        $accessToken = Auth::user()->token;
        DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update(['revoked' => true]);
        $accessToken->revoke();
        return response()-json(null,204);
    }
}

