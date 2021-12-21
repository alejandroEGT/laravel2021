@extends('private.home')
@section('title', 'Lista de usuarios')


@section('content')
<div class="card mt-3">
    <div class="card-header">
        Lista de usuarios
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-center table-success">
                    <tr>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Email</td>
                        <td>Perfil</td>
                        <td colspan="2">opciones</td>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($users as $u)
                    <tr>
                        <td>{{$u['nombre']}}</td>
                        <td>{{$u['apellido']}}</td>
                        <td>{{$u['email']}}</td>
                        <td>{{ ($u['perfil']==1)?'Admin':'Usuario' }}</td>
                        <td>
                            <button onclick="llenar(
                                '<?= $u['id']?>',
                                '<?=$u['nombre']?>',
                                '<?=$u['apellido']?>',
                                '<?=$u['email']?>',
                                '<?=$u['perfil']?>' )" 
                                class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</button>
                        
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                                    <button id="btn_close" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- EDITAR -->
                                    <form id="formulario-update">
                                        
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <input id="id" type="hidden" class="form-control">
                                                <label for="">Nombre</label>
                                                <input id="nombre" type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="">Apellido</label>
                                                <input id="apellido" type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="">Email</label>
                                                <input id="email" type="email" class="form-control">
                                            </div>

                                            <div class="col-lg-12">
                                                <label for="">Perfil</label>
                                                <select id="perfil" class="form-control">
                                                    <option value="">--SELECCIONE--</option>
                                                    <option value="1">(1) - Admin</option>
                                                    <option value="2">(2) - Usuario</option>
                                                </select>
                                            </div>
                                            
                                            <div class="col-lg-12">
                                                <button class="btn btn-success w-100 mt-4">Actualizar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                
                                </div>
                            </div>
                            </div>
                        </td>
                        <td>
                            <button onclick="eliminar(<?=$u['id']?>)" class="btn btn-danger">Eliminar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>
</div>

<script src="{{ asset('js/private/usuarios.js')}}"></script>
@endsection
