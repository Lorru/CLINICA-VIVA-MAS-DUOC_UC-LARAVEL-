<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Centromedico;
use App\Especialidad;
use App\Horario;
use App\Profesional;
use App\Reserva;
use Carbon\Carbon;

class ReservaController extends Controller
{
    function __construct()
    {
        $this->middleware('reserva');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centromedico = Centromedico::all();
        $especialidad = Especialidad::all();
        $horaActual = Carbon::now();
        $horario = Horario::where("hora_horario", ">", ($horaActual->hour .":". $horaActual->minute))
                          ->whereNotIn("id_horario", function($query){
                            $fechaActual = Carbon::now();
                            $query->select("id_horario")->where("fecha_reserva", "=", $fechaActual->toDateString())->from("reserva");
                          })
                          ->get();
                          
        return view('reserva.index', compact(['centromedico', 'especialidad', 'horario']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fechaActual = Carbon::now();
        if($request->input('fechaReserva') < $fechaActual->toDateString())
        {
            return redirect()->route('Reserva.index')->with('errorFecha', 'La Fecha Debe Ser Mayor O Igual A La Fecha Actual!');
        }
        else
        {
            $reserva = new Reserva();
            $reserva->id_profesional = $request->input('profesional');
            $reserva->id_horario = $request->input('horario');
            $reserva->rut_paciente = $request->input('rutPaciente');
            $reserva->fecha_reserva = $request->input('fechaReserva');
            $reserva->save();

            return redirect()->route('Reserva.index')->with('creacionReserva', 'La Reserva Se Creo Con Exito');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = Reserva::findOrFail($id);
        $reserva->delete();
        return back();
    }

    public function profesional(Request $request)
    {
        $idEspecialidad = $request->input('idEspecialidad');
        $idCentromedico = $request->input('idCentromedico');
        $profesional = Profesional::where('id_centromedico', '=', $idCentromedico)->where('id_especialidad', '=', $idEspecialidad)->get();
        return response()->json($profesional);    
    }

    public function horarioDisponible(Request $request)
    {
        $fechaActual = Carbon::now();
        $fecha = $request->input('fecha');
        $horaActual = $request->input('horaActual');

        if($fecha == $fechaActual->toDateString())
        {
            
            $horario = Horario::where("hora_horario", ">", $horaActual)
                              ->whereNotIn("id_horario", function($query) use ($request){
                                $fecha = $request->input('fecha');
                                $query->select("id_horario")->where("fecha_reserva", "=", $fecha)->from("reserva");
                              })->get();
            return response()->json($horario);
        }
        else
        {
            $horario = Horario::whereNotIn("id_horario", function($query) use ($request) {
                                $fecha = $request->input('fecha');
                                $query->select("id_horario")->where("fecha_reserva", "=", $fecha)->from("reserva");
                            })->get();
            return response()->json($horario);
        }
    }

    public function horarioDisponibleProfesional(Request $request)
    {
        $fechaActual = Carbon::now();
        $fecha = $request->input('fecha');
        if($fecha == $fechaActual->toDateString())
        {
            $horaActual = $request->input('horaActual');
            $horario = Horario::where("hora_horario", ">", $horaActual)
                              ->whereNotIn("id_horario", function($query) use ($request) {
                                $fecha = $request->input('fecha');
                                $idProfesional = $request->input('idProfesional');
                                $query->select("id_horario")->where("fecha_reserva", "=", $fecha)->where("id_profesional", "=", $idProfesional)->from("reserva");
                              })->get();
            return response()->json($horario);
        }
        else
        {
            $horaActual = $request->input('horaActual');
            $horario = Horario::whereNotIn("id_horario", function($query) use ($request) {
                                $fecha = $request->input('fecha');
                                $idProfesional = $request->input('idProfesional');
                                $query->select("id_horario")->where("fecha_reserva", "=", $fecha)->where("id_profesional", "=", $idProfesional)->from("reserva");
                              })->get();
            return response()->json($horario);
        }        
    }
}
