@extends('admin.layouts.app')
@section('content')
@section('title','Criar novos usuários')
<h1>Novo Usuário</h1>
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
@endif
<form action="{{route('users.store')}}" method="POST">
    @csrf()
    <input type="text" name="name" placeholder="Nome" value="{{old('name')}}">
    <input type="email" name="email" placeholder="E-mail" value="{{old('email')}}">
    <input type="password" name="password" placeholder="Senha">
    <button type="submit" style="background-color: red">Enviar</button>
</form>
@endsection
</body>
</html>
