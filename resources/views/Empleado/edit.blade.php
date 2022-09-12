@extends('layouts.app')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2" >
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h3 class="panel-title"> Editar Datos</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{route('empleado.update',$empleado->id)}}" role="form">
                            {{csrf_field()}}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.name') }}</label>
                                        <input type="text" name="nombre" id="nombre" class="form-control input-sm" placeholder="Nombre del empleado" value="{{ old('nombre',$empleado->nombre) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.lastname_1') }}</label>
                                        <input type="text" name="paterno" id="paterno" class="form-control input-sm" placeholder="Apellido paterno del empleado" value="{{ old('paterno',$empleado->paterno) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.lastname_2') }}</label>
                                        <input type="text" name="materno" id="materno" class="form-control input-sm" placeholder="Apellido materno del empleado" value="{{ old('materno',$empleado->materno) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.email') }}</label>
                                        <input type="email" name="email" id="email" class="form-control input-sm" placeholder="example@algo.com" value="{{ old('email',$empleado->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.telephone') }}</label>
                                        <input type="tel" name="telefono" id="telefono" class="form-control input-sm" placeholder="246 000 00 00" value="{{ old('telefono',$empleado->telefono) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.birthdate') }}</label>
                                        <input type="date" name="nacimiento" id="nacimiento" class="form-control input-sm" value="{{ old('nacimiento',$empleado->nacimiento) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.address') }}</label>
                                        <input type="text" name="direccion" id="direccion" class="form-control input-sm" placeholder="Av Siempre Viva #27" value="{{ old('direccion', $empleado->direccion)}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.salary') }} </label>
                                        <input type="number" name="salario" id="salario" class="form-control input-sm" placeholder="Salario del empleado" value="{{ old('salario', $empleado->salario) }}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label> {{ trans('forms.form_create.currency') }} </label>
                                        <select class="form-control" id="tipo_moneda" name="tipo_moneda">
                                            <option value="{{old('tipo_moneda',$empleado->tipo_moneda)}}"> {{old('tipo_moneda',$empleado->tipo_moneda)}}</option>
                                            @foreach($listMonedas as $moneda)
                                                <option value="{{$moneda}}">{{$moneda}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('forms.form_create.code') }}</label>
                                        <label class="form-control input-sm">{{$empleado->codigo_empleado}}</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6 col-xs-12">
                                <label for="campo_genero_h" class="form-label">Genero</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_h" {{$empleado->genero == 'masculino' ? 'checked': ''}} value="masculino">
                                    <label>{{ trans('forms.form_create.male') }}</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="genero" id="genero_m" {{$empleado->genero == 'femenino' ? 'checked': ''}} value="femenino">
                                    <label>{{ trans('forms.form_create.female') }}</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-success" >Guardar</button>
                                    <a href="{{ route('empleado.index')  }}" class="btn btn-danger"> Atras</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </section>

    </div>

@endsection