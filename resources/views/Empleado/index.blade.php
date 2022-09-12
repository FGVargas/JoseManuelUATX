@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-primary">

                <div class="panel-body bg-warning">
                    <div>
                        <div class="alert alert-success font-weight-bold text-center"> Listado empleados</div>
                    </div>
                    @if(\Illuminate\Support\Facades\Session::has('success'))
                        <div class="alert alert-danger">
                            {{\Illuminate\Support\Facades\Session::get('success')}}
                        </div>
                    @endif
                    <div class="pull-right">
                    <a href="{{ route('empleado.create')}}" class="btn btn-success">Agregar Empleado</a><br><br>
                    </div>

                    <div class="table-container">
                        <table id="tablaEmpleados" class="table table-bordered table-striped bg-danger">
                            <thead>
                            <th>Codigo empleado</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                            </thead>

                            <tbody>
                            @if($empleados->count())
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{ $empleado->codigo_empleado }}</td>
                                        <td>{{ $empleado->nombre }}</td>
                                        <td>{{ $empleado->paterno . " " . $empleado->materno }}</td>
                                        <td>{{ $empleado->email }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-xs" href="{{route('empleado.show', $empleado->id)}}" ><span class="glyphicon glyphicon-eye-open"></span></a>
                                            <a class="btn btn-warning" href="{{route('empleado.edit',$empleado->id)}}">Editar</a>
                                            <button type="button" class="btn  btn-danger" data-toggle="modal" data-target="#modal-delete-{{$empleado->id}}">Eliminar</button>
                                            @include('Empleado.modalEliminar')
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5"> No hay Registros</td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </div>
@endsection

