@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Modificar Docente
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="POST" action="/docentes/{{ $docente->dnidocente }}" autocomplete="off">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            x
                                        </button>
                                        {{ $error }}
                                    </div>
                                @endforeach
                                {!! csrf_field() !!}
                                {!! method_field('PUT') !!}
                                    <div class="form-group">
                                        <label>DNI DOCENTE</label>
                                        <input type="text" class="form-control" value="{!! $docente->dnidocente !!}" name="dnidocente">
                                    </div>


                                    <div class="form-group">
                                        <label>CONTRASEÑA</label>
                                        <input type="password" class="form-control" value="{!! $docente->contraseña !!}" name="contraseña">
                                    </div>


                                    <div class="form-group">
                                        <label>ID DOCENTE</label>
                                        <input type="text" class="form-control" value="{!! $docente->iddocente !!}" name="iddocente">
                                    </div>


                                <div class="form-group">
                                    <label>NOMBRES</label>
                                    <input type="text" class="form-control" value="{!! $docente->nombre !!}" name="nombre" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>APELLIDOS</label>
                                    <input type="text" class="form-control" value="{!! $docente->apellido!!}" name="apellido" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>DIRECCION</label>
                                    <input type="text" class="form-control" value="{!! $docente->direccion !!}" name="direccion">
                                </div>


                                <div class="form-group">
                                    <label>TELEFONO</label>
                                    <input type="tel" class="form-control" value="{!! $docente->telefono !!}" name="telefono">
                                </div>


                                    <div class="form-group">
                                        <label>ESPECIALIDAD</label>
                                        <select id="ESPECIALIDAD" name="especialidad" class="form-control">
                                            @foreach($cursos as $curso)
                                                @if($curso->idcurso==$docente->especialidad)
                                                    <option selected value="{{$curso->idcurso}}">{{$curso->nombre}}</option>
                                                @else
                                                    {{--@if($curso->estado == "HABILITADO")--}}
                                                    <option value="{{$curso->idcurso}}">{{$curso->nombre}}</option>
                                                    {{--@endif--}}
                                                @endif
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <input type="text" class="form-control" value="{!! $docente->email !!}" name="email">
                                    </div>


                                    <div class="form-group">
                                        <label>SEXO</label>

                                        <select class="form-control" id="SEXO" name="sexo">
                                            @if($docente->sexo =="MASCULINO")
                                                <option selected>MASCULINO</option>
                                                <option>FEMENINO</option>
                                            @else
                                                <option>MASCULINO</option>
                                                <option selected>FEMENINO</option>
                                            @endif
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>ESTADO</label>

                                        <select id="ESTADO" name="estado" class="form-control">
                                            @if($docente->estado=="HABILITADO")
                                                <option selected >HABILITADO</option>
                                                <option>INHABILITADO</option>
                                            @else
                                                <option>HABILITADO</option>
                                                <option selected>INHABILITADO</option>
                                            @endif
                                        </select>
                                    </div>
                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onClick="location.href='/docentes'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>