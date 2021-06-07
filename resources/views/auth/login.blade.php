@extends('layouts.app')

@section('headTitle', config('app.name') . ' :: Login')

@push('styles')
    <link href="{{ asset('css/adm/login.css') }}" rel="stylesheet">
@endpush

@section('content')
<main class="position-relative d-flex justify-content-center align-items-center" style="height: 100vh;">
    <ol class="breadcrumb bg-white position-absolute by-osole border-bottom-0 border-rigth-0 m-0 rounded-0">
        <li class="breadcrumb-item" aria-current="page">Último cambio: {{ env('APP_DATE') }}</li>
        <li class="breadcrumb-item" aria-current="page">V. {{ env('APP_VERSION') }}</li>
        <li class="breadcrumb-item" aria-current="page"><a style="color:inherit" href="{{ URL::to('/') }}">Página<i class="ml-2 fas fa-external-link-alt"></i></a></li>
        <li class="breadcrumb-item" aria-current="page"><a target="_blank" href="{{ env('APP_UAUTHOR') }}" style="color:inherit">By {{ env('APP_AUTHOR') }}</a></li>
        <li class="breadcrumb-item" aria-current="page"><a target="_blank" href="mailto:{{ env('APP_UAMAIL') }}" style="color:inherit">{{ env('APP_UAMAIL') }}</a></li>
    </ol>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5 shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center">Panel Administrativo<br/><strong>{{ config('app.name') }}</strong></h5>
                        <form class="form-signin" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="form-label-group">
                                <input type="text" name="username" id="username" class="form-control" placeholder="Usuario" required autofocus value="{{ old('username') }}">
                                <label for="username"><i class="fas fa-user mr-2"></i>Usuario</label>
                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>
                                <label for="password"><i class="fas fa-key mr-2"></i>Contraseña</label>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Acceso<i class="fas fa-sign-in-alt ml-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection