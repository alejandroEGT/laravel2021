@extends('public.app')
@section('title', 'Formulario de usuario')


@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    Log in
                </div>
                <div class="card-body">
                    <form id="formulario">
                        <label for="">Email</label>
                        <input id="email" type="text" class="form-control">

                        <label for="">Password</label>
                        <input id="password" type="password" class="form-control">

                        <button class="btn btn-success w-100 mt-3">Log in</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/public/login.js')}}"></script>
@endsection