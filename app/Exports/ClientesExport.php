<?php

namespace App\Exports;

use App\Cliente;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientesExport implements FromCollection,WithHeadings
{
   
    public function headings(): array{
        return [
            'Id',
            'Razon Social',
            'Contacto',
            'Cuit',
        ];
    }
    public function collection()
    {
         $users = DB::table('Cliente')->select('id','razonsocial','contacto','cuit')->get();
         return $clientes;

    }
}
​     