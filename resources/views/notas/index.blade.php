@extends('layout.layout')

@section('estilos')
    <!-- Datatables CSS -->
    <script src={{
    URL::asset('bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') }}></script>
    <!-- DataTables Responsive CSS -->

    <script src={{
    URL::asset('bower_components/datatables-responsive/css/dataTables.responsive.css') }}></script>

@stop

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Notas
                <button type="button" class="btn btn-primary" onclick="location.href='Notas/create'">
                    Nuevo
                </button>
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
                                    <th>idcurso</th>
                                    <th>dnialumno</th>
                                    <th>p1</th>
                                    <th>p2</th>
                                    <th>p3</th>
                                    <th>promedio</th>
                                    <th>Operaciones</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($Notas as $Nota)

                                    <tr class="odd gradeA" rol="row">
                                        <td>{{ $Nota->idcurso }}</td>
                                        <td>{{ $Nota->dnialumno }}</td>
                                        <td>{{ $Nota->p1 }}</td>
                                        <td>{{ $Nota->p2 }}</td>
                                        <td>{{ $Nota->p3 }}</td>
                                        <td>{{ $Nota->promedio }}</td>
                                        
                                    </tr>
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