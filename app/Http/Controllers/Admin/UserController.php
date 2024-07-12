<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

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
        $user = User::create($request->validated());
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
    public function update(UpdateUserRequest $request, string $id){

      if (!$user = User::find($id)){
        return back()->route('users.index')->with('message','Usuário não encontrado');
      }
     $data=$request->only('name','email');
      if ($request->password){
        $data ['password']= bcrypt($request->password);
      };

        $user->update($data);

        return redirect()
         ->route('users.index')
        ->with('success','Usuário editado com sucesso');
        }
        public function show(string $id){
            if (!$user = User::find($id)){
                return redirect()->route('users.index')->with('message','Usuário não encontrado com sucesso');
            }
            return view('admin.users.show',compact('user'));
        }
        public function destroy(string $id){
            if(Gate::allows('is-admin')){
                return back()->with('message','Você não tem permissão para deletar este usuário');
  
            }
            if (!$user = User::find($id)){
                return redirect()->route('users.index')->with('message','Usuário não encontrado');
            }


          if(Auth::user()->id === $user->id){
            return back()->with('message','Você mão pode deletar o seu próprio perfil');
          }
            $user->delete();

            return redirect()
            ->route('users.index')
            ->with('success','Usuário excluído com sucesso');
        }
}
