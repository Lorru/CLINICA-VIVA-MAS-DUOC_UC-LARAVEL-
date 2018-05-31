<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Perfil;

class UsuariosController extends Controller
{
    function __construct()
    {
        $this->middleware('admin');
    }    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::join('perfil', 'users.id_perfil', '=', 'perfil.id_perfil')->paginate(5);
        $perfiles = Perfil::all();
        return view('usuarios.index', compact(['usuarios', 'perfiles']));
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
        $correoUsuario = $request->input('correoUsuario');

        $users = User::where("email", "=", $correoUsuario)->get();

        if($users->count() > 0)
        {
            return back()->with('errorCrearUsuario', 'El Usuario Ya Existe!');
        }
        else
        {
            $user = new User;
            $user->name = $request->input('nombreUsuario');
            $user->email = $request->input('correoUsuario');
            $user->password = bcrypt($request->input('claveUsuario'));
            $user->id_perfil = $request->input('perfil');
            $user->save();
            return redirect()->route('Usuarios.index')->with('creacionUsuario', 'El Usuario Se Creo Con Exito!');
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
        $usuario = User::findOrFail($id);
        $perfiles = Perfil::all();
        return view('Usuarios.edit', compact(['usuario', 'perfiles']));
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
        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('nombreUsuario');
        $usuario->email = $request->input('correoUsuario');
        $usuario->password = bcrypt($request->input('claveUsuario'));
        $usuario->id_perfil = $request->input('perfil');
        $usuario->update();
        return back()->with('actualizarUsuario', 'El Usuario Se Actualizo Con Exito!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();
        return redirect()->route('Usuarios.index')->with('eliminarUsuario', 'El Usuario Se Elimino Con Exito!');
    }
}
