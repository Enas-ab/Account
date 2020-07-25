<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
class Users extends Controller
{
    //
public function list()
{
    //return Session::get('logData');
    $users= User::all();
    return view('list',['users'=>$users]);
}
public function loginsubmit(Request $req)
{
//print_r($req->input());
    User::select('*')->where(
      [
['email','=',$req->email],
['password','=',$req->password]
      ]
  )->get();
  $req->session()->put('logData',[$req->input()]);
  return redirect('/list');
}
public function createsubmit(Request $req)
{
    $user=new User;
    $user->name=$req->name;
    $user->email=$req->email;
    $user->password=$req->password;
   $result= $user->save();
   if($result)
   {
    $req->session()->put('logData',[$req->input()]);
       return redirect('/list');
   }

}

}