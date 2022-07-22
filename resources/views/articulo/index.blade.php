{{-- @extends('layouts.admin') --}}

<x-app-layout>

<x-slot name='css'>
    <link rel="stylesheet" href="{{ asset('css/datatables.custom.css') }}" class="rel">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/datatables.min.css"/>
</x-slot>

{{--
@section('header')
    <div class="flex-wrap pt-3 pb-2 mb-3 d-flex justify-content-between flex-md-nowrap align-items-center border-bottom">
            <p class="h3">ARTICULOS</p>
        <div style="background-color: #2b76e7"></div>
    </div>
@endsection
 --}}

    <div class="content-header">
        <div class="container-fluid">
            <div class="mb-2 row">
                <div class="col-sm-6">
                    <h3 class="m-0">
                        Listado de Articulos
                    </h3>
                </div>
            </div>

            @if ($message = Session::get('success'))
                <div class="alert alert-success mt-3">
                    <span>{{ $message }}</span>
                </div>
            @endif
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="table" class="table pt-1 table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Descripcion</th>
                                        <th>Categoria</th>
                                        <th>Factor x</th>
                                        <th>Delicado</th>
                                        <th width="100px">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<x-slot name='js'>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jszip-2.5.0/dt-1.12.1/af-2.4.0/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/cr-1.5.6/date-1.1.2/fc-4.1.0/fh-3.2.3/kt-2.7.0/r-2.3.0/rg-1.2.0/rr-1.2.8/sc-2.0.6/sb-1.3.3/sp-2.0.1/sl-1.4.0/datatables.min.js"></script>

    <script>
        // Este function capaz q ni hace falta #chacho
        $(function() {
            // Setting defaults
            $.extend( $.fn.dataTable.defaults, {
                searching: true,
                ordering:  true,
                // "language": {
                //    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
                // }
                "language": {
                    "info": "_TOTAL_ registros",
                    "search": "Buscar",
                    "paginate": {
                        "next": "Sig.",
                        "previous": "Ant.",
                        "first": "Primero",
                        "last": "Último"
                    },
                    "lengthMenu": 'Mostrar <select>'+
                        '<option value="10">10</option>'+
                        '<option value="30">30</option>'+
                        '<option value="-1">Todos</option>'+
                        '</select> registros',
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "emptyTable": "No hay datos",
                    "zeroRecords": "No hay conincidencias",
                    "infoEmpty": "",
                    "infoFiltered": ""
                }

            } );
        });

        // $.fn.dataTable.ext.buttons.alert = {
        //     className: 'buttons-alert',
        //     action: function ( e, dt, node, config ) {
        //         alert( 'hola mundo !!!' );
        //         // location.href = "{{ route('articulos.index') }}";
        //     }
        // };

        $(document).ready(function() {
            $('#table').DataTable({
                "processing": true,
                "responsive": true,
                "autoWidth": false,
                "serverSide": true,
                "pageLength": 30,
                // "dom": 'Bfrtilp',
                // "dom": '<"top"Bf>rt<"bottom"p><"clear">',
                dom: 'Bfrtip',
        //         buttons: [
        //             {
        //                 text: '<i class="fa-solid fa-user nav-icon"></i>&nbsp;&nbsp;Agregar Cliente',
        //                 className: 'btn btn-success btn-sm opacity-75',
        //                 action: function(e, dt, node, config) {
        //                     alert('Nuevo cliente');
        //                 }
        //             },
        //             {
        //                 extend: 'spacer',
        //             },

        //         'copy',
        //     'csv',
        //     'excel',
        //     'pdf',
        //     {
        //         extend: 'print',
        //         className: 'excelButton',
        //         text: 'Print all (not just selected)',
        //         exportOptions: {
        //             modifier: {
        //                 selected: null
        //             }
        //         }
        //     }
        // ],
        select: true,
                // "buttons": [
                //     {
                //         text: 'Agregar Cliente',
                //         className: 'addNewRecord',
                //         action: function(e, dt, node, config) {
                //             alert('Nuevo cliente');
                //         }
                //     },
                //     'excel', 'print', 'pdf'
                // ],
                "buttons":[
                    {
                        name: 'btnArticulo',
                        text: 'Agregar Articulo',
                        action: function ( e, dt, node, conf ) {
                            location.href = "{{ route('articulos.create') }}";
                        },
                        // className: 'btn btn-primary btn-sm rounded opacity-75'
                        className: 'btnArticulo text-white btn-sm rounded opacity-75'
                    },
                    // {
                    //     extend: 'spacer',
                    //     style: '',
                    //     text: ''
                    // },
                    {
                        name: 'btngrupo',
                        extend: 'excelHtml5',
                        text:   '<i class="fas fa-file-excel"></i>&nbsp;&nbsp;Excel',
                        titleAttr: 'Exportar a Excel',
                        // className: 'btn btn-outline-info btn-sm rounded opacity-75'
                        className: 'btn btn-success btn-sm rounded opacity-75'
                    },
                    // {
                    //     extend: 'spacer',
                    //     style: '',
                    //     text: ''
                    // },
                    {
                        // extend: 'pdfHtml5',
                        name: 'btngrupo',
                        extend: 'pdf',
                        text:   '<i class="fas fa-file-pdf"></i>&nbsp;&nbsp;PDF',
                        titleAttr: 'Exportar a PDF',
                        // className: 'btn btn-outline-danger btn-sm rounded opacity-75'
                        className: 'btn btn-danger btn-sm rounded opacity-75'
                    },
                    // {
                    //     extend: 'spacer',
                    //     style: 'bar',
                    //     text: ''
                    // },
                    //{
                        // name: 'btnPrint',
                    //    extend: 'print',
                     //   text:   '<i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir',
                     //   titleAttr: 'Imprimir',
                     //   className: 'btn btn-warning btn-sm rounded opacity-75'
                   // }
                ],

                // "dataType": json,
                // type: POST,
                "ajax": "{{ route('dt.articulos') }}",
                "columns": [
                    {data: 'descripcion', name: 'descripcion'},
                    {data: 'categoria.descripcion', name: 'categoria.descripcion'},
                    {data: 'categoria.factor', name: 'categoria.factor'},
                    {data: 'delicado', name: 'delicado'},
                    // {data: 'delicado', name: 'delicado',
                    //  'render': function(data,type){

                    //    if (type === 'display') {
                    //        var delicado = '';

                    //        switch (data){

                    //                case 1:
                    //                 delicado = 'SI';
                    //                 break;
                    //                case 0:
                    //                 delicado = 'NO';
                    //                 break;
                    //            //    default : status_name = 'Desconocido'; break;
                    //        }
                    //     return delicado;
                    //    }
                    //  }
                    // },

                    {data: 'actions', name: 'actions', searchable: false, orderable: false, className: ''},
                    // {data: null, render: function(data, type, row) {
                    //         return "<center>"+
                    //                     "<span class='px-1 btnShow text-success' style='cursor:pointer'>"+
                    //                         "<i class='fas fa-eye fs-5'></i>"+
                    //                     "</span>"+
                    //                     "<span class='px-1 btnEditar text-primary' style='cursor:pointer'>"+
                    //                         "<i class='fas fa-pencil-alt fs-5'></i>"+
                    //                     "</span>"+
                    //                     "<span class='px-1 btnEliminar text-danger' style='cursor:pointer'>"+
                    //                         "<i class='fas fa-trash fs-5'></i>"+
                    //                     "</span>"+
                    //                     "</center>"
                    // }},
                ],
                order: [1, 'asc'],
                // "scrollX": true
                // "scrollY": "300px",
                "scrollY": '45vh',
                "scrollCollapse": true,
                // "paging": false,
                "pagingType": "full_numbers",
                // "dom": 'Bfrtilp',
                // "dom": '<"top"f>rt<"bottom"ip><"clear">'
                // "dom": '<"top"Bf>rt<"bottom"p><"clear">'
                // "dom": '<"top"Bf><"toolbar">rt<"bottom"p><"clear">'
                // "dom": '<"toolbar">Bfrt<"bottom"p><"clear">'

                // "dom": '<"top"Bf>rt<"bottom"p><"clear">'

                // "dom": '<Bf<t>ip>'
                // "dom": '<"wrapper"flipt>'

            });
            // $("div.toolbar").html('<b>Custom tool bar! Text/images etc.</b>');

        });    //////////// document.ready principal

    </script>
</x-slot>

</x-app-layout>
