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
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#crear" data-toggle="tab">Crear</a></li>
                            <li><a href="#todo" data-toggle="tab">Todo</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="crear">
                                @if(session()->has('errorCrearUsuario'))
                                    <div class="mensajes">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-danger">
                                                    <h3>{{ session('errorCrearUsuario') }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(session()->has('creacionUsuario'))
                                    <div class="mensajes">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success">
                                                    <h3>{{ session('creacionUsuario') }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                @if(session()->has('eliminarUsuario'))
                                    <div class="mensajes">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="alert alert-success">
                                                    <h3>{{ session('eliminarUsuario') }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            <form action="{{ route('Usuarios.store') }}" method="post" id="formAgregarUsuario">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre Usuario</label>
                                                <input type="text" name="nombreUsuario" id="nombreUsuario" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Correo Usuario</label>
                                                <input type="email" name="correoUsuario" id="correoUsuario" class="form-control" placeholder="Enter ...">
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
                                                        <option value="{{ $perfil->id_perfil }}">{{ $perfil->nombre_perfil }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="submit" value="Crear" class="btn btn-block btn-success btn-flat">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="todo">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <table class="table table-hover">
                                            <th>Nombre</th>
                                            <th>Perfil</th>
                                            <th>Correo</th>
                                            <th>Acciones</th>
                                            @foreach($usuarios as $usuario)
                                                <tr>
                                                    <td>{{ $usuario->name }}</td>
                                                    <td>{{$usuario->nombre_perfil}}</td>
                                                    <td>{{$usuario->email}}</td>
                                                    <td>
                                                        <a href="{{ route('Usuarios.edit', $usuario->id) }}" class="btn btn-info btn-xs">Editar</a>
                                                        <form action="{{ route('Usuarios.destroy', $usuario->id) }}" style="display: inline" method="post">
                                                            {!! csrf_field() !!}
                                                            {!! method_field('DELETE') !!}
                                                            <input type="submit" class="btn btn-danger btn-xs" value="Eliminar">
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            {!! $usuarios->render() !!}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop