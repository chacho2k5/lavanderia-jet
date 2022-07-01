
@extends('layouts.admin')

@section('css')
@stop
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h3 class="m-0">
                    Modificar Cliente
                </h3>
            </div>
        </div>
    </div>
</div>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('clientes.edit', $cliente->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="razonsocial" class="form-label">Razón Social</label>
                                <input type="text" id="razonsocial" name="razonsocial" class="form-control {{ $errors->has('razonsocial') ? 'is-invalid' : '' }}" tabindex="1" autofocus
                                    placeholder="Ingrese la Razón Social" value="{{ old('razonsocial',$cliente->razonsocial) }}">
                                @if ($errors->has('razonsocial'))
                                    <span class="text-danger">
                                        <strong>{{ $errors->first('razonsocial') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">CUIL</label>
                                <input type="text" id="descripcion" name="descripcion" class="form-control" tabindex="2">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">IVA</label>
                                <input type="text" id="cantidad" name="cantidad" class="form-control" tabindex="3">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Correo</label>
                                <input type="text" id="precio" name="precio" class="form-control" tabindex="4">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Calle</label>
                                <input type="text" id="precio" name="precio" class="form-control" tabindex="4">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Numero</label>
                                <input type="text" id="precio" name="precio" class="form-control" tabindex="4">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha de alta</label>
                                <input type="text" id="precio" name="precio" class="form-control" tabindex="4">
                            </div>
                            <div class="mt-2 row d-print-none">
                                <div class="text-right col-12">
                                    <a href="{{ route('clientes.index') }}" class="btn btn-secondary" tabindex="5">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Regresar
                                    </a>
                                    <button type="submit" class="btn btn-success" tabindex="6">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                        Guardar
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('js')
@stop
