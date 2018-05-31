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
                            <h4>Reservas Del Paciente {{ $rutPaciente }}</h4>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Rut</th>
                                                <th>Centro Medico</th>
                                                <th>Profesional</th>
                                                <th>Horario</th>
                                                <th>Fecha</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="cuerpoConsulta">
                                            @foreach($reserva as $res)
                                                <tr>
                                                    <td>{{$res->rut_paciente}}</td>
                                                    <td>{{$res->nombre_centromedico}}</td>
                                                    <td>{{$res->nombres_profesional." ".$res->apellidos_profesional}}</td>
                                                    <td>{{$res->hora_horario}}</td>
                                                    <td>{{$res->fecha_reserva}}</td>
                                                    @php  
                                                        $fecha = Carbon\Carbon::now();
                                                    @endphp
                                                    @if($fecha->toDateString() <= $res->fecha_reserva && ($fecha->hour. ":". $fecha->minute <= $res->hora_horario) )
                                                        <td>
                                                            <form action="{{ route('Consulta.destroy', $res->id_reserva) }}" style="display: inline" method="post">
                                                                {!! csrf_field() !!}
                                                                {!! method_field('DELE)TE') !!}
                                                                <input type="submit" class="btn btn-danger btn-xs" value="Cancelar Reserva">
                                                            </form>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        {!! $reserva->appends(['rutPacienteConsultar' => $rutPaciente])->render(); !!}
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@stop