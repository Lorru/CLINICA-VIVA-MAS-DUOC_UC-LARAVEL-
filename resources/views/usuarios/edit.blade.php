@extends('layout')
@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Usuarios</h1>
            <ol class="breadcrumb">
                <li><a href="#">Clinica Viva Mas</a></li>
                <li class="active"><i class="fa fa-group"></i> Usuarios</li>
            </ol>
        </section>
        <section class="content">
            <div class="row box box-body">
                <div class="col-md-12">
                    @if(session()->has('errorActualizarUsuario'))
                        <div class="mensajes">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-danger">
                                        <h3>{{ session('errorActualizarUsuario') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(session()->has('actualizarUsuario'))
                        <div class="mensajes">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert alert-success">
                                        <h3>{{ session('actualizarUsuario') }}</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <form action="{{ route('Usuarios.update', $usuario->id) }}" method="post" id="formActualizarUsuario">
                        {!! csrf_field() !!}
                        {!! method_field('PUT') !!}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nombre Usuario</label>
                                    <input type="text" name="nombreUsuario" value="{{ $usuario->name }}" id="nombreUsuario" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Correo Usuario</label>
                                    <input type="email" name="correoUsuario" value="{{ $usuario->email }}" id="correoUsuario" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" name="claveUsuario" id="claveUsuario" class="form-control" placeholder="Enter ...">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Perfil</label>
                                    <select class="form-control" name="perfil">
                                        @foreach($perfiles as $perfil)
                                            <option value="{{ $perfil->id_perfil }}" {{$usuario->id_perfil == $perfil->id_perfil ? 'selected' : '' }}>{{ $perfil->nombre_perfil }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="submit" value="Actualizar" class="btn btn-block btn-success btn-flat">
                            </div>
                        </div>
                    </form>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <a href="{{ route('Usuarios.index') }}" class="btn btn-block btn-primary btn-flat">Volver</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop