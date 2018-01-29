<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Nota;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Notas = Nota::join('alumnos as alumno', 'notas.alumno_id', '=', 'alumno.dnialumno')    
        ->select('notas.*') // stop the joined table from overwriting columns with the same name
        ->with('alumno') 
        ->orderBy('apellido', 'asc')
        ->get();
        
        //$Notas = Nota::all();
        return view('Notas.index',['Notas'=>$Notas]);
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
        foreach ($request->get('p2') as $key => $value) {
            $asistencia = Nota::find($request->get('id')[$key]);
            $asistencia->p1 = $request->get('p1')[$key];
            $asistencia->p2 = $request->get('p2')[$key];
            $asistencia->p3 = $request->get('p3')[$key];
            $asistencia->update();
        }
        return redirect('/notas')->with('mensaje','todas las notas se actualizaron');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
