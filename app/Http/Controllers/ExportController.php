<?php

namespace App\Http\Controllers;

use App\Exports\SalesExport;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;

use Carbon\Carbon;

use App\Models\Sale;
use App\Models\SalesDetails;
use App\Models\User;

class ExportController extends Controller
{
    // Los dejamos en null por si no recibimos nada en esos datos
    public function reportPDF($userId,$reportType,$fi=null,$ff=null){
        $data=[];

        if($reportType==0){//Son Ventas del dia
            $dateFrom=Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
            $dateTo=Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';
        }else{
            $dateFrom=Carbon::parse($fi)->format('Y-m-d').' 00:00:00';
            $dateTo=Carbon::parse($ff)->format('Y-m-d')  .' 23:59:59';
        }

        if($userId==0){
            $data=Sale::join('users as u','u.id','=','sales.user_id')
            ->select('sales.*','u.name as user')
            ->whereBetween('sales.created_at',[$dateFrom,$dateTo])
            ->get();
        }else{
            $data=Sale::join('users as u','u.id','=','sales.user_id')
            ->select('sales.*','u.name as user')
            ->whereBetween('sales.created_at',[$dateFrom,$dateTo])
            ->where('sales.user_id',$userId)
            ->get();
        }

        $user = $userId==0 ? 'Todos' : User::find($userId)->name;
        $pdf = PDF::loadView('pdf.reporte', compact('data','reportType','user','fi','ff'));
        return $pdf->stream('salesReport.pdf');//visualizar PDF
        return $pdf->download('salesReport.pdf');//Descargar PDF
    }

    public function reporteExcel($userId,$reportType,$fi=null,$ff=null){
        $reportName = 'Repote de Ventas_'.uniqid().'.xlsx';
        return Excel::download(new SalesExport($userId,$fi,$ff,$reportType), $reportName);
    }
}
