<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    {{-- @extends('layouts.admin') --}}

    <<table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>DESCRIPCION</th>
                <th>CATEGORIA</th>
                <th>DELICADO</th>
            </tr>
        </thead>
        <tbody>

         @foreach ($articulos as $articulo)
             
            <tr>
                <td scope="row">{{$artiuclo->id}}/td>
                <td>{{$articulo->descripcion}}</td>
                <td>{{$articulo->categoria}}</td>
                <td>{{$articulo->delicado}}</td>
            </tr>
         @endforeach
   
        </tbody>
    </table>

</div>
