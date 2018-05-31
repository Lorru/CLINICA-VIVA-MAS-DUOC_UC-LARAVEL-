<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reserva;

class ConsultaController extends Controller
{
    function __construct()
    {
        $this->middleware('consulta');
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('consulta.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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
        $reserva = Reserva::where('id_reserva', '=', $id);
        $reserva->delete();
        return back();
    }

    public function consultarReserva(Request $request)
    {
        $rutPaciente = $request->input('rutPacienteConsultar');
        $reserva = Reserva::join('horario', 'reserva.id_horario', '=', 'horario.id_horario')
                        ->join('profesional', 'reserva.id_profesional', '=', 'profesional.id_profesional')
                        ->join('centromedico', 'profesional.id_centromedico', '=', 'centromedico.id_centromedico')
                        ->where('reserva.rut_paciente' , '=', $rutPaciente)
                        ->paginate(5);
        
        if($reserva->count() > 0)
        {
            return view('consulta.show', compact(['reserva', 'rutPaciente']));
        }else
        {
            return redirect()->route('Consulta.index')->with('errorConsulta', 'No Se Encontraron Reservas Para El RUT Ingresado!');
        }
    }
}
