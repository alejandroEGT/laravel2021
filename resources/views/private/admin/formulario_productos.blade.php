@extends('private.home')
@section('title', 'Formulario de productos')


@section('content')

    <div class="card mt-4">
        <div class="card-header">
            Formulario de productos
        </div>
        <div class="card-body">
            <form id="formulario">
                <div class="row">
                    <div class="col-lg-6">
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
                        <button class="btn btn-success w-100 mt-4">Registrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/private/productos.js')}}"></script>

@endsection