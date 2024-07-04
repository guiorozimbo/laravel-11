@extends('admin.layouts.app')
@section('content')
@section('title','Editar os usuários')
<h1>Editar os Usuário {{$user->name}}</h1>


<form action="{{route('users.update',$user->id)}}" method="POST">

   @method('put')
   @include('admin.users.partials.form')
</form>
@endsection
</body>
</html>
