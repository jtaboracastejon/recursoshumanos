<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ventas</title>
    <link rel="stylesheet" href="{{asset('css/custom_pdf.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_page.css')}}">
</head>
<body>
    <section class="header" style="top:-287px;">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td colspan=2 class="text-center">
                    <span style="font-size: 25px; font-weight: bold;">Sistema Rocket Resto POS</span>
                </td>
            </tr>
            <tr>
                <td width="30%" style="vertical-align:top; padding-top: 10px; position: relative;">
                    <img src="{{asset('assets/img/cork-logo.png')}}" alt="" class="invoice-logo">
                </td>
                <td width="70%" class="text-left text-company" style="vertical-align: top; padding-top: 10px;">
                    @if ($reportType == 0)
                    <span style="font-size:16px"><Strong>Reporte de Ventas del Dia</Strong></span>
                    @else
                    <span style="font-size:16px"><Strong>Reporte de Ventas por Fechas</Strong></span>
                    @endif
                    <br>
                    @if ($reportType != 0)
                    <span style="font-size:16px"><Strong>Reporte Generado desde : {{$fi}} hasta {{$ff}}</Strong></span>
                    @else
                    <span style="font-size:16px"><Strong>Reporte Generado {{\Carbon\Carbon::now()->format('d-M-Y')}}</Strong></span>
                    @endif
                    <br>
                    <span style="font-size: 14px">Usuario:{{$user}}</span>
                </td>
            </tr>
        </table>
    </section>
    <section style="margin-top:-110px;">
        <table celpadding="0" cellspacing="0" class="table-items" width="100%">
            <thead>
                <tr>
                    <th width="10%">FOLIO</th>
                    <th width="12%">IMPORTE</th>
                    <th width="10%">ITEMS</th>
                    <th width="12%">ESTATUS</th>
                    <th>USUARIO</th>{{-- Toma el espacio restante disponible al no poner width --}}
                    <th width="18%">FECHA</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td align="center">{{$item->id}}</td>
                        <td align="center">{{number_format($item->total,2)}}</td>
                        <td align="center">{{$item->items}}</td>
                        <td align="center">{{$item->status}}</td>
                        <td align="center">{{$item->user}}</td>
                        <td align="center">{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-center">
                        <span>
                            <b>TOTALES</b>
                        </span>
                        <td colspan="1" class="text-center">
                            <span><strong>${{number_format($data->sum('total'),2)}}</strong></span>
                        </td>
                        <td class="text-center">
                            {{$data->sum('items')}}
                        </td>
                        <td colspan="3"></td>
                    </td>
                </tr>
            </tfoot>
        </table>
    </section>

    <section class="footer">
        <table celpadding="0" cellspacing="0" class="table-items" width="100%">
            <tr>
                <td width="20%">
                    <span>Sistema Rocket RestoPOS V1</span>
                </td>
                <td width="60%" class="text-center">
                    <span>Powered by: Rocket Solutions</span>
                </td>
                <td class="text-center" width="20%">
                    Pagina <span class="pagenum"></span>
                </td>
            </tr>
        </table>
    </section>

</body>
</html>
  9
routes/web.php
