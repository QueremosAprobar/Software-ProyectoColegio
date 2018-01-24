@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-lg-12">
        </div>
        {{--/.col-lg-12--}}
    </div>
    {{--/.row--}}
    <div class="row" >
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    Ingrese los datos del Docente
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <form role="form" method="post" action="/docentes" autocomplete="off">
                                @foreach($errors->all() as $error)
                                    <div class="alert alert-danger">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                            x
                                        </button>
                                        {{ $error }}
                                    </div>
                                @endforeach
                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">

                                <div class="form-group">
                                    <label>DNI DOCENTE</label>
                                    <input type="text" class="form-control" name="dnidocente" placeholder="12345678">
                                </div>


                                <div class="form-group">
                                    <label>CONTRASEÑA</label>
                                    <input type="password" class="form-control" name="contraseña" placeholder="***********" >
                                </div>


                                <div class="form-group">
                                    <label>ID DOCENTE</label>
                                    <input type="text" class="form-control" name="iddocente" placeholder="D001" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>NOMBRES</label>
                                    <input type="text" class="form-control"  name="nombre" placeholder="" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>APELLIDOS</label>
                                    <input type="text" class="form-control" name="apellido" placeholder=""  onkeyup="javascript:this.value=this.value.toUpperCase();">
                                </div>


                                <div class="form-group">
                                    <label>DIRECCION</label>
                                    <input type="text" class="form-control" name="direccion">
                                </div>


                                <div class="form-group">
                                    <label>TELEFONO</label>
                                    <input type="tel" class="form-control" name="telefono" placeholder="974000000">
                                </div>

                                <div class="form-group">
                                    <label>NIVEL</label>
                                    {{--<input type="text" class="form-control" name="nivel" >--}}
                                    <select id="NIVEL" name="NIVEL" class="form-control">
                                        <option>INICIAL</option>
                                        <option>PRIMARIA</option>
                                        <option>SECUNDARIA</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>ESPECIALIDAD</label>
                                    {{--<input type="text" class="form-control" name="especialidad">--}}
                                    <select id="ESPECIALIDAD"  name="especialidad"  class="form-control">
                                        @foreach($cursos as $curso)
                                            {{--@if($curso->estado == "HABILITADO")--}}
                                            <option value="{{$curso->idcurso}}">{{$curso->nombre}}</option>
                                            {{--@endif--}}
                                        @endforeach
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>EMAIL</label>
                                    <input type="email" class="form-control" name="email"  placeholder="nombre@example.com" >
                                </div>


                                <div class="form-group">
                                    <label>SEXO</label>
                                    {{--<input type="text" class="form-control" name="sexo" >--}}
                                    <select id="SEXO" name="sexo" class="form-control">
                                        <option>MASCULINO</option>
                                        <option>FEMENINO</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>ESTADO</label>
                                    {{--<input type="text" class="form-control" name="estado" >--}}
                                    {{--           value="{{old('estado')}}"       --}}
                                    <select id="ESTADO" name="estado"  class="form-control" >
                                        <option>HABILITADO</option>
                                        <option>INHABILITADO</option>
                                    </select>
                                </div>


                                <button type="submit" class="btn btn-success">Guardar</button>
                                <button type="reset" class="btn btn-warning">Limpiar</button>
                                <button type="button" class="btn btn-danger" onclick="location.href='/docentes'">Volver</button>
                            </form>
                        </div>
                        @stop
                    </div>
                </div>
            </div>
        </div>
    </div>
