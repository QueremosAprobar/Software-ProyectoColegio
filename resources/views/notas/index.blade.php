@extends('layout.layout')

@section('estilos')
    <!-- Datatables CSS -->
    <script src={{
    URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{
    URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>

@stop

<script type="text/javascript">

function myFunction(id) {
    alert("Hello\nHow are you? " + id);
}
function p(i){
    var num1 = parseFloat(document.getElementsByName('p1[]')[i].value);
    var num2 = parseFloat(document.getElementsByName('p2[]')[i].value);
    var num3 = parseFloat(document.getElementsByName('p3[]')[i].value);

    var pro =(num1+num2+num3)/3;
    if(!isNaN(pro)){
        if (pro >= 10.5) {        
            document.getElementsByName("observa")[i].innerHTML = "<span style='color: blue;'>Aprobado</span>";
            document.getElementsByName('promedio')[i].innerHTML = "<span style='color: blue;'>"+(Math.floor(pro * 100) / 100).toFixed(2)+"</span>";
        }else{
            document.getElementsByName("observa")[i].innerHTML = "<span style='color: red;'>Desaprobado</span>";
            document.getElementsByName('promedio')[i].innerHTML = "<span style='color: red;'>"+ (Math.floor(pro * 100) / 100).toFixed(2)+"</span>";
        }
    }
}

function iniciar(){
    var s = 0;
    for (var a = 0; a <= parseInt(<?php echo \App\Nota::count() ?>) ; a++) {
            p(s);
        s++;
    }
}

window.onload = iniciar;

</script>

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Seleccione su Curso
                <SELECT NAME="selCombo" SIZE=1 onChange="javascript:alert('prueba');"> 
                    <OPTION VALUE="1">Link1</OPTION>
                    <OPTION VALUE="2">Link2</OPTION>
                    <OPTION VALUE="3">Link3</OPTION>
                    <OPTION VALUE="4">Link4</OPTION> 
                </SELECT>
            </h3>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading"></div>
                <!--.panel-heading-->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        @if($Notas->isEmpty())
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                    x
                                </button>
                                No se tiene ninguna nota
                                <a href="#" class="alert-link">Ingrese Notas</a>
                            </div>
                        @else
                            @if(session('mensaje'))
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                                        x
                                    </button>
                                    {{ session('mensaje') }}
                                </div>
                            @endif


                            <table class="table table-striped table-bordered table-hover" idcurso="dataTables-example">
                                <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Apellidos y Nombres</th>
                                    <th>Primera Parcial</th>
                                    <th>Segunda Parcial</th>
                                    <th>Tercera Parcial</th>
                                    <th>promedio</th>
                                    <th>Observaciones</th>
                                </tr>
                                </thead>

                                <tbody>  
                                <?php 
                                    $i = 0;
                                ?>                                
                                @foreach($Notas as $Nota)
                                    {!!Form::model($Notas, ['route'=> ['notas.update', $Nota->id], 'method'=>'PUT'])!!}
                                    {{Form::token()}}
                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $Nota->id }}</td>
                                        <td>{{ $Nota->alumno->apellido }}  {{ $Nota->alumno->apellido }}</td>
                                        <input type="hidden" name="id[]" value="{{$Nota->id}}">                                      
                                        <td>                     
                                           <input type="number"  name="p1[]" onchange="p(<?= $i ?>);" min="0.00"
                                                max="20.00" step="0.01" value={{ $Nota->p1 }} />
                                            <a title="Editar" >
                                                <span class="glyphicon glyphicon-pencil"></span>                                                
                                            </a>
                                        </td>
                                        <td> 
                                            <input type="number"  name="p2[]" onchange="p(<?= $i ?>);"min="0.00"
                                                max="20.00" step="0.01" value={{ $Nota->p2 }} />   
                                            <a title="Editar" >
                                                <span class="glyphicon glyphicon-pencil"></span>                                                
                                            </a>
                                        </td>
                                        <td>
                                            <input type="number"  name="p3[]" onchange="p(<?= $i ?>);" min="0.00"
                                                max="20.00" step="0.01" value={{ $Nota->p3 }} />
                                            <a title="Editar" >
                                                <span class="glyphicon glyphicon-pencil"></span>                                                
                                            </a>
                                        </td>
                                        <td><span name="promedio"></span></td>
                                        <td><span style='color: red' name="observa"></span></td>                                      
                                    </tr>
                                    <?php $i++; ?>
                                @endforeach

                                </tbody>

                            </table>

                        @endif
                    </div>
                    <!--.table-rsponsive-->
                </div>
            </div>

        </div>

    </div>
{!!Form::submit('Actualizar', ['class'=>'btn btn-primary'])!!}{!!Form::close()!!} 


<?php
    $variablephp = \App\Nota::count();
?>
<a>{{ $variablephp }}</a>
@stop

@section('js')
    <!--Datatables JavaScript-->
    <script src={{ URL::asset('bower_components/DataTables/media/js/jquery.dataTables.min.js') }}></script>


    <script src={{ URL::asset('bower_components/dataTables-plugins/integration/bootstrap/3/.dataTables.bootstrap.min.js') }}></script>


@stop

@section('jsope')

    <!--Page-Level Demo Scripts - Tables- Use for reference-->
    <script>
        $(document).ready(function () {
            $('dataTables-example').DataTable({
                responsive:true
            });
        });
    </script>
@stop