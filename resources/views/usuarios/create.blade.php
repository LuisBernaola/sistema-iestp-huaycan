@extends('layouts.app') 
@section('contenido') 
<h2>Nuevo usuario</h2> 
<form method="POST" action="{{route('usuarios.store')}}">@csrf 
<label>Nombre</label><input name="name" class="form-control mb-2" value="{{old('name')}}" required> <label>Correo</label><input type="email" name="email" class="form-control mb-2" value="{{old('email')}}" required> 
<label>Contraseña</label><input type="password" name="password" class="form-control mb-2" required> 
<label>Confirmar contraseña</label><input type="password" name="password_confirmation" class="form-control mb-
2" required> 
<button class="btn btn-success">Guardar</button> 
<a class="btn btn-secondary" href="{{route('usuarios.index')}}">Cancelar</a> </form> 
@endsection 
