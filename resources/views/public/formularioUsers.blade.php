@extends('public.app')
@section('title', 'Formulario de usuario')


@section('content')
    
<div class="card">
    <div class="card-header">Formulario de usuarios</div>
    <div class="card-body">
    
      <form id="formulario">
        <div class="row">
            <div class="col-lg-3">
                <label for="">Nombres</label>
                <input id="nombres" type="text" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="">Apellidos</label>
                <input id="apellidos" type="text" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="">Perfil</label>
                <select id="perfil" class="form-control">
                    <option value="">--SELECCIONE--</option>
                    <option value="1">(1) - Admin</option>
                    <option value="2">(2) - Usuario</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <label for="">Email</label>
                <input id="email" type="email" class="form-control">
            </div>
            <div class="col-lg-3">
                <label for="">Password</label>
                <input id="password" type="password" class="form-control">
            </div>
            <div class="col-lg-3">
                <button type="submit" class="btn btn-success mt-4 W-100">Registrar</button>
            </div>
        </div>
      </form>
    
    </div>
</div>

<script src="{{ asset('js/public/formulario_user.js')}}"></script>

@endsection

