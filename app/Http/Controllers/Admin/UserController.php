<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::paginate(20);//all();
       // dd($users);

        return view('admin.users.index',compact('users'));
    }
    public function create(){
        return view('admin.users.create');
    }
    public function store(StoreUserRequest $request){
        $user = User::create($request->all());
        return redirect()
        ->route('users.index')
        ->with('success','Usuário criado com sucesso');
    }
    public function edit(string $id){

      if (!$user = User::find($id)){
        return redirect()->route('users.index')->with('message','Usuário inválido');
      }
      return view('admin.users.edit',compact('user'));
    }
}
