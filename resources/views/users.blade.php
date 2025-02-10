@extends('layouts.main')

@section('title','Lista de usuários')




@section('content')

<div class="container">

    <h1 class="fw-bold fs-1 text-danger">Lista de usuários </h1>
</div>

@foreach ($users as $user)
    <p>{{$user}}</p>
    @if(isset($user))
     <form action={{route('users.destroy',$user)}} method="post">
        @csrf
        @method('DELETE')
        <div class="form-item center">
            <button type="submit" class="btn btn-danger">Delete</button>
        </div>

     </form>
    @endif
@endforeach



@endsection
