@extends('layout')
@section('contenido')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>Consulta</h1>
            <ol class="breadcrumb">
                <li><a href="#">Clinica Viva Mas</a></li>
                <li class="active"><i class="fa fa-th-list"></i> Consulta</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#crear" data-toggle="tab">Consulta</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="crear">
                                <form action="{{ route('consultarReserva') }}" method="GET" id="formRealizarConsulta">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Rut</label>
                                                <input type="text" name="rutPacienteConsultar" id="rutPacienteConsultar" class="form-control" placeholder="Enter ...">
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding-top:4px;">
                                            <br>
                                            <input type="submit" value="Consultar" id="btnConsultarReserva" class="btn btn-block btn-success btn-flat">
                                        </div>
                                    </div>
                                </form>
                                @if(session()->has('errorConsulta'))
                                <div class="mensajes">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="alert alert-danger">
                                                <h3>{{session('errorConsulta')}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop