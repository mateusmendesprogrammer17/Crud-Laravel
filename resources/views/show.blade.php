@extends('layouts.main')



@section('title', $user->name)






@section('content')

<div class="container">
    <h1 class="fw-bold fs-1 text-danger">Detalhes do usuário {{$user->name}}</h1>
    <p>Nome: {{$user->name}}</p>
    <p>Email: {{$user->email}}</p>
    <p>Senha: {{$user->password}}</p>


@endsection