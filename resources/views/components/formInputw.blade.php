{{--
placeholder -> ''
            -> label
            -> algun valor
. Definir valor OLD para la Edicion
. Definir algunos parametros de validacion
. Validacion Date (ver complementos)
 --}}

 @props([
    'label',
    'name',
    'type' => 'text',
    'placeholder' => '0',
])

<div class="mb-4 form-group">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>
    <input type="{{ $type }}"
        name="{{ $name }}"
        @error($name)
            {{ $attributes->merge(['class' => 'form-control is-invalid']) }}
        @else
            {{ $attributes->merge(['class' => 'form-control']) }}
        @enderror
        placeholder="{{ $placeholder == 'label' ? $label : ($placeholder == '0' ? '' : $placeholder)}}">

        @error($name)
            <span class="invalid-feedback" role="alert">
                <span class="text-danger">{{ $message }}</span>
            </span>
        @enderror
</div>
