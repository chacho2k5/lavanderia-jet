<x-formInput name="descripcion" label="Nombre" placeholder='label' :value="$data" autofocus />
<x-formSelect name="categoria_id" label="Categoria" :value="$categorias" sel="{{ $data == '' ? '1' : $articulo->categoria_id }}" />
<x-formInput name="pesoespecifico" label="Factor x" placeholder='label' :value="$data" maxlength="5"/>
<x-formInput name="delicado" label="Delicado" placeholder='label' :value="$data"/>

