@if(session()->has('success')){
   <div class="bg-green-100"role="alert">{{session('success')}}</div>
}
@endif

@if(session()->has('message')){
    <div class="bg-yellow-100"role="alert">{{session('message')}}</div>
 }
 @endif

 @if(session()->has('error')){
    <div class="bg-red-100"role="alert">{{session('error')}}</div>
 }
 @endif
@if ($errors->any())
<ul>
    @foreach ($errors->all() as $error )
<li class="text-red-500">{{$error}}</li>
    @endforeach
</ul>
@endif
