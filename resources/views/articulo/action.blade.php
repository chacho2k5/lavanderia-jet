<form action="{{ route('articulos.destroy', $id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="text-right">
        <a href="{{ route('articulos.show', $id) }}" class="btn px-1 text-success btn-sm" data-toggle="tooltip" title='Ver'><i class="fas fa-eye fs-6"></i></a>
        <a href="{{ route('articulos.edit', $id) }}" class="btn px-1 text-primary btn-sm" data-toggle="tooltip" title='Editar'><i class="fas fa-edit fs-6"></i></a>
        <button type="submit" class="btn text-danger btn-sm" data-toggle="tooltip" title='Borrar'
            onclick="return confirm('Esta seguro de borrar? {{ $id }} ')">
            <i class="fa fa-trash fs-6"></i>
        </button>
        {{-- <a href="{{ route('articulos.destroy', $id) }}" class="px-1 text-danger" data-toggle="tooltip" title='Eliminar'><i class="fas fa-trash fs-5"></i></a> --}}
        {{-- <a href="javascript:void(0)" class="px-1 text-danger" onclick="deletearticulos(event.target, {{ $id }})" data-toggle="tooltip" title='Borrar'><i class="fa fa-trash fs-5"></i></a> --}}
    </div>
    
</form>

{{-- <div class="text-right">
    <a href="{{ route('articulos.show', $id) }}" class="px-1 text-success" data-toggle="tooltip" title='Ver'><i class="fas fa-eye fs-5"></i></a>
    <a href="{{ route('articulos.edit', $id) }}" class="px-1 text-primary" data-toggle="tooltip" title='Editar'><i class="fas fa-edit fs-5"></i></a>
    <a href="javascript:void(0)" class="px-1 text-danger" onclick="deletearticulos(event.target, {{ $id }})" data-toggle="tooltip" title='Borrar'><i class="fa fa-trash fs-5"></i></a>
</div> --}}

{{-- <a href="{{ route('articulos.show', $id) }}" class="btn btn-outline-success btn-xs" data-toggle="tooltip" title='Ver'><i class="fas fa-eye"></i></a>
<a href="{{ route('articulos.edit', $id) }}" class="btn btn-outline-primary btn-xs" data-toggle="tooltip" title='Editar'><i class="fas fa-edit"></i></a>
<a href="javascript:void(0)" class="btn btn-outline-danger btn-xs" onclick="deletearticulos(event.target, {{ $id }})" data-toggle="tooltip" title='Borrar'><i class="fa fa-trash"></i></a> --}}
{{--
<a href="{{ route('articulos.show', $id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" title='Ver'><i class="glyphicon glyphicon-edit"></i></a>
<a href="{{ route('articulos.edit', $id) }}" class="glyphicon glyphicon-edit" data-toggle="tooltip" title='Editar'><i class="fas fa-edit"></i></a>
<a href="javascript:void(0)" class="glyphicon glyphicon-edit" onclick="deletearticulos(event.target, {{ $id }})" data-toggle="tooltip" title='Borrar'><i class="fa fa-trash"></i></a>
 --}}
{{--
"<span class='px-1 btnShow text-success' style='cursor:pointer'>"+
    "<i class='fas fa-eye fs-5'></i>"+
"</span>"+
"<span class='px-1 btnEditar text-primary' style='cursor:pointer'>"+
    "<i class='fas fa-pencil-alt fs-5'></i>"+
"</span>"+
"<span class='px-1 btnEliminar text-danger' style='cursor:pointer'>"+
    "<i class='fas fa-trash fs-5'></i>"+
"</span>"+
 --}}
