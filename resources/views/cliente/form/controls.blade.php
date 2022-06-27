<x-formInput name="razonsocial" label="Razón Social" placeholder='label' :value="$data" autofocus />
<x-formInput name="contacto" label="Contacto" placeholder='label' :value="$data"/>
<x-formInput name="correo" type="text" label="Correo Electrónico" placeholder='label' :value="$data"/>
<x-formInput name="telefono1" label="Telefono" placeholder='label' :value="$data"/>
<x-formInput name="telefono2" label="Telefono" placeholder='label' :value="$data"/>
<x-formInput name="cuit" label="CUIT" placeholder='label' maxlength="11" :value="$data"/>
<x-formSelect name="iva_id" label="IVA" :value="$ivas" sel="{{ $data == '' ? '1' : $cliente->iva_id }}" />
<x-formInput name="calle_nombre" label="Nombre calle" placeholder='label' :value="$data"/>
<x-formInput name="calle_numero" label="Número" placeholder='label' :value="$data" maxlength="5"/>
<x-formInput name="codigo_postal" label="Código Postal" placeholder='label' :value="$data"/>
<x-formInput name="fecha_alta" type="date" label="Fecha alta" placeholder='label' :value="$data"/>
<x-formArea name="observaciones" rows="4" cols="30" label="Observaciones" placeholder='label' :value="$data"/>
