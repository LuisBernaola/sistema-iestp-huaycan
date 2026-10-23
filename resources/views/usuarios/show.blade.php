@extends('layouts.app') 
@section('contenido') 
<h2>Detalle de usuario</h2> 
<p><b>ID:</b> {{ $usuario->id }}</p> 
<p><b>Nombre:</b> {{ $usuario->name }}</p> 
<p><b>Correo:</b> {{ $usuario->email }}</p> 
<a class="btn btn-secondary" href="{{route('usuarios.index')}}">Volver</a> @endsection 
