@extends('layouts.app') 
@section('titulo','Usuarios') 
@section('contenido') <h2>Usuarios</h2> 
<a class="btn btn-primary mb-3" href="{{ route('usuarios.create') }}">Nuevo</a> 
<table class="table table-bordered table-striped"> 
<thead><tr><th>ID</th><th>Nombre</th><th>Correo</th><th>Acciones</th></tr></thead> <tbody>@foreach($usuarios as $usuario) 
<tr><td>{{ $usuario->id }}</td><td>{{ $usuario->name }}</td> 
<td>{{ $usuario->email }}</td><td> 
<a href="{{route('usuarios.show',$usuario)}}" class="btn btn-info btn-sm">Ver</a> 
<a href="{{route('usuarios.edit',$usuario)}}" class="btn btn-warning btn-sm">Editar</a> <form method="POST" action="{{route('usuarios.destroy',$usuario)}}" class="d-inline"> 
@csrf @method('DELETE') 
<button class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar usuario?')">Eliminar</button> </form></td></tr>@endforeach</tbody></table> @endsection 
