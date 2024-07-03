@extends('admin.layouts.app')
@section('content')
@section('title','Editar os usuários')
<h1>Editar os Usuário {{$user->name}}</h1>
<x-alert/>

<form action="{{route('users.update',$user->id)}}" method="POST">
    @csrf()
    <input type="text" name="name" placeholder="Nome" value="{{$user->name}}">
    <input type="email" name="email" placeholder="E-mail" value="{{$user->email}}">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit" style="background-color: red">Enviar</button>
</form>
@endsection
</body>
</html>
