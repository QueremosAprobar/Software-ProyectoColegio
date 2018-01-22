<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Requests\ApoderadoFormRequest;
use App\Apoderado;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apoderados = Apoderado::all();
        return view('apoderados.index',['apoderados'=>$apoderados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('apoderados.create');
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
        $apoderado=new Apoderado;
        $apoderado->dniapoderado=$request->get('dniapoderado');
        $apoderado->nombre=$request->get('nombre');
        $apoderado->apellido=$request->get('apellido');
        $apoderado->sexo=$request->get('sexo');
        $apoderado->direccion=$request->get('direccion');
        $apoderado->estadocv=$request->get('estadocv');        
        $apoderado->telefono=$request->get('telefono');
        $apoderado->save();
        return redirect('/apoderados')->with('mensaje','Se inserto correctamente!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function show($dniapoderado)
    {
        //
        $apoderado=Apoderado::findOrFail($dniapoderado);
        //return view('alumnos.show',compact('alumno'));
        return view('apoderados.show',['apoderado'=>$apoderado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function edit($dniapoderado)
    {
        //
        $apoderado=Apoderado::findOrFail($dniapoderado);
        //return View('alumnos.edit',compact('alumno'));
        return view('apoderados.edit',['apoderado'=>$apoderado]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $dniapoderado)
    {
        $apoderado=Apoderado::findOrFail($dniapoderado);
        $apoderado->nombre=$request->get('nombre');
        $apoderado->apellido=$request->get('apellido');
        $apoderado->sexo=$request->get('sexo');
        $apoderado->direccion=$request->get('direccion');
        $apoderado->estadocv=$request->get('estadocv');        
        $apoderado->telefono=$request->get('telefono');        
        $apoderado->save();
        return redirect('/apoderados')->with('mensaje','Se modifico correctamente!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $dniapoderado
     * @return \Illuminate\Http\Response
     */
    public function destroy($dniapoderado)
    {
        $apoderado=Apoderado::findOrFail($dniapoderado);
        $apoderado->delete();
        return redirect('/apoderados')->with('mensaje','El apoderado con id:'.$dniapoderado.',se elimino correctamente!!');
        //DB::table('alumnos')->where('id',$dniapoderado)->delete();
        //return redirect('/alumnos');
    }
}
