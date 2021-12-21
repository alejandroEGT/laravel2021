@extends('private.home')
@section('title', 'Lista de productos')


@section('content')



<div class="card mt-3">
    <div class="card-header">
        Lista de productos
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="text-center table-success">
                    <tr>
                        <td>Codigo</td>
                        <td>Nombre</td>
                        <td>Descripción</td>
                        <td>categoria</td>
                        <td>Medida</td>
                        @if(Auth::user()->perfil=='1')
                        <td colspan="2">opciones</td>
                        @endif
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach($productos as $p)
                    <tr>
                        <td>{{$p['codigo']}}</td>
                        <td>{{$p['nombre']}}</td>
                        <td>{{$p['descripcion']}}</td>
                        <td>{{$p['categoria']}}</td>
                        <td>{{$p['umedida']}}</td>
                        @if(Auth::user()->perfil=='1')
                        <td>
                            <button onclick="llenar(
                                '<?= $p['id']?>',
                                '<?= $p['codigo']?>',
                                '<?=$p['nombre']?>',
                                '<?=$p['descripcion']?>',
                                '<?=$p['categoria_id']?>',
                                '<?=$p['umedida_id']?>')" 
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
                                            <div class="col-lg-6">
                                            <input id="id" type="hidden" class="form-control">
                                                <label for="">Codigo</label>
                                                <input id="codigo" type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Nombre</label>
                                                <input id="nombre" type="text" class="form-control">
                                            </div>
                                            <div class="col-lg-12">
                                                <label for="">Descripción</label>
                                                <textarea  id="desc" class="form-control" cols="30" rows="10"></textarea>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">Categorias</label>
                                                <select class="form-control" id="categoria">
                                                <option value="">--SELECCIONE--</option>
                                                    @foreach($categorias as $c)
                                                        <option value="{{$c['id']}}">{{$c['nombre']}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-lg-6">
                                                <label for="">U. Medida</label>
                                                <select class="form-control" id="medida">
                                                <option value="">--SELECCIONE--</option>
                                                    @foreach($medidas as $m)
                                                        <option value="{{$m['id']}}">{{$m['nombre']}}</option>
                                                    @endforeach
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
                        @endif
                        @if(Auth::user()->perfil=='1')
                        <td>
                            <button onclick="eliminar(<?=$p['id']?>)" class="btn btn-danger">Eliminar</button>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>
</div>

<script src="{{ asset('js/private/productos.js')}}"></script>
@endsection