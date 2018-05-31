@extends('layout')
@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Reserva</h1>
            <ol class="breadcrumb">
                <li><a href="#">Clinica Viva Mas</a></li>
                <li class="active"><i class="fa fa-calendar"></i> Reserva</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#crear" data-toggle="tab">Crear</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="crear">
                                @if(session()->has('creacionReserva'))
                                <div class="mensajes">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-success">
                                                <h3>{{ session('creacionReserva') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(session()->has('errorFecha'))
                                <div class="mensajes">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                <h3>{{ session('errorFecha') }}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <form action="{{ route('Reserva.store') }}" method="post" id="formCrearReserva">
                                    {!! csrf_field() !!}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rut</label>
                                                <input type="text" name="rutPaciente" id="rutPaciente" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Centro Medico</label>
                                                <select class="form-control" name="centromedico" id="centromedico">
                                                    @foreach($centromedico as $centro)
                                                        <option value="{{$centro->id_centromedico}}">{{$centro->nombre_centromedico. " ".$centro->direccion_centromedico }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Especialidad</label>
                                                <select class="form-control" name="especialidad" id="especialidad">
                                                    @foreach($especialidad as $espe)
                                                        <option value="{{$espe->id_especialidad}}">{{$espe->nombre_especialidad}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Fecha de Reserva</label>
                                                <input type="date" class="form-control" name="fechaReserva" id="fechaReserva">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class='form-group'>
                                                <label>Profesional</label>
                                                <select class='form-control' name='profesional' id='profesional'></select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Horario</label>
                                                <select class="form-control" name="horario" id="horario">
                                                    @foreach($horario as $hora)
                                                        <option value="{{$hora->id_horario}}">{{$hora->hora_horario}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="submit" value="Crear" id="btnCrearReserva" class="btn btn-block btn-success btn-flat">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop