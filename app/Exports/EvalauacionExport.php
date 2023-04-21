<?php

namespace App\Exports;

use App\Models\Sale;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;      // Para Trabajar con colleciones y obtencion de datos
use Maatwebsite\Excel\Concerns\WithHeadings;        // Para definir los nombres de las columnas - encabezados
use PhpOffice\phpSpreadsheet\Worksheet\Worksheet;   //Para interactuar con el libros
use Maatwebsite\Excel\Concerns\WithCustomStartCell; //Para definir la celda donde inicia el reporte
use Maatwebsite\Excel\Concerns\WithTitle;           //Para colocar nombre a las hojas del libros del
use Maatwebsite\Excel\Concerns\WithStyles;          //Para dar formato a las celdas



class SalesExport implements FromCollection, WithHeadings, WithCustomStartCell, WithTitle, WithStyles
{
    protected $userId, $dateFrom, $dateTo, $reportType;

    function __construct($userId,$fi,$ff,$reportType){
        $this->userId = $userId;
        $this->dateFrom = $fi;
        $this->dateTo = $ff;
        $this->reportType = $reportType;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data=[];
        if($this->reportType==1){
            $from=Carbon::parse($this->dateFrom)->format('Y-m-d').' 00:00:00';
            $to=Carbon::parse($this->dateTo)->format('Y-m-d').' 23:59:59';
        }else{

            $from=Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
            $to=Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';
        }

        if($this->userId==0){
            $data=Sale::join('users as u','u.id','=','sales.user_id')
            ->select('sales.id','sales.total','sales.items','sales.status','u.name as user','sales.created_at')
            ->whereBetween('sales.created_at',[$from,$to])
            ->get();
        }else{
            $data=Sale::join('users as u','u.id','=','sales.user_id')
            ->select('sales.id','sales.total','sales.items','sales.status','u.name as user','sales.created_at')
            ->whereBetween('sales.created_at',[$from,$to])
            ->where('sales.user_id', $this->$userId)
            ->get();
        }

        return $data;
    }

    //Estableciendo las cabeceras del reporte

    public function headings() : array{
        return[
            'FOLIO',
            'IMPORTE',
            'ITEMS',
            'ESTATUS',
            'USUARIO',
            'FECHA'
        ];
    }

    //Estableciendo en que celda empezaremos a imprimir el reporte
    public function startCell(): string{
        return 'A2';
    }

    public function styles(Worksheet $sheet){
        return [
            2=>['font'=>['bold'=>true]], //El 2 es la fila en la que se aplicaran los estilos
        ];
    }

    //Estableciendo el nombre de la hoja del reporte
    public function title(): string{
        return 'Reporte de Ventas';
    }
}
