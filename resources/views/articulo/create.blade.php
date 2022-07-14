<x-app-layout>

    <div class="content-header">
    <div class="container-fluid">
        <div class="mb-2 row">
            <div class="col-sm-6">
                <h3 class="m-0">
                    Nuevo Articulo
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
                        {{-- <form action="{{ route('articulos.store') }}" method="post" class="was-validated" autocomplete="off"> --}}
                        {{-- <form action="{{ route('articulos.store') }}" method="post" class="needs-validation" autocomplete="off" novalidate> --}}
                        <form action="{{ route('articulos.store') }}" method="post" class="needs-validation" autocomplete="off">
                            @csrf
                            @php $data = ''; @endphp

                            @include('articulo.form.controls')

                            {{-- 
                            <x-formInput name="nombre" label="Nombre" placeholder='label' autofocus :value="$data" />
                            <x-formSelect name="categoria_id" label="Categoria" :value="$categorias" />
                            <x-formInput name="pesoespecifico" label="Factor x" placeholder='label' :value="$data"/>
                            <x-formInput name="delicado" label="Delicado" placeholder='label' :value="$data"/>
                            
                            {{--
                            <div class="form-group">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input type="text" id="nombre" name="nombre" class="form-control @error('nombre') is-invalid @enderror" tabindex="1" autofocus
                                    placeholder="Ingrese nombre articulo " value="{{ old('nombre','') }}" required>

                                    @error('nombre')
                                        <span class="invalid-feedback" role="alert">
                                            <span class="text-danger">{{ $message }}</span>
                                        </span>
                                    @enderror
                            </div>

                            <div class="mt-4 form-group">
                                <label for="" class="form-label">Categorias</label>
                                <select name="categoria_id" id="" class="form-select form-select-sm">
                                    @foreach ($categorias as $categoria)
                                        <option value="{{ $categoria->id }}" @selected(old('categoria_id') == $categoria->id)>
                                            {{ $categoria->descripcion }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mt-4 form-group">
                                <label for="calle_numero" class="form-label">Factor x</label>
                                <input type="text" id="" name="pedoespecifico" class="form-control @error('pedoespecifico') is-invalid @enderror" tabindex="4"
                                    value="{{ old('pesoespecifico','') }}" maxlength="5">

                                @error('pesoespecifico')
                                    <span class="invalid-feedback" role="alert">
                                        <span class="text-danger">{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>

                            <div class="mt-4 form-group">
                                <label for="calle_nombre" class="form-label">Delicado </label>
                                <input type="text" id="" name="delicado" class="form-control @error('delicado') is-invalid @enderror" tabindex="4"
                                    value="{{ old('delicado','') }}" maxlength="100">

                                @error('delicado')
                                    <span class="invalid-feedback" role="alert">
                                        <span class="text-danger">{{ $message }}</span>
                                    </span>
                                @enderror
                            </div>

                          
                         --}}
                            <div class="mt-4 row d-print-none">
                                <div class="text-right col-12">
                                    <a href="{{ route('articulos.index') }}" class="btn btn-secondary" tabindex="5">
                                        <i class="fa fa-fw fa-lg fa-arrow-left"></i>
                                        Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-success" tabindex="6">
                                        <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                        Grabar
                                    </button>
                                </div>
                            </div>
                        </form>

                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</x-app-layout>
