<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet; charset=utf-8"  />
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Pagos</title>
        <style>
            html {
                font-family: sans-serif;
                font-size: 12px;
            }

            table {
                width: 100%;
                border-spacing: 0;
                border: 1px solid black;
            }

            .celda {
                text-align: center;
                padding: 5px;
                border: 0.1px solid black;
            }

            th {
                padding: 5px;
                text-align: center;
                border-color: #0088cc;
                border: 0.1px solid black;
            }

            .title {
                font-weight: bold;
                padding: 5px;
                font-size: 20px !important;
                text-decoration: underline;
            }

            p>strong {
                margin-left: 5px;
                font-size: 13px;
            }

            thead {
                font-weight: bold;
                background: #0088cc;
                color: white;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div>
            <p align="center" class="title"><strong>Reporte Orden de Pagos</strong></p>
        </div>
        <div style="margin-top:20px; margin-bottom:20px;">
            
        </div>
        @if(!empty($order))
            <div class="">
                <div class=" ">
                    @php
                        $acum_total=0;                        
                        $acum_total_usd=0;
                    @endphp
                    <table class="">
                        <thead>
                            <tr>
                                <th class="">#</th>
                                <th class="">Nombre Paciente</th>
                                <th class="">DNI</th>
                                <th class="">Descripción</th>
                                <th class="">Monto</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $key => $value)
                                <tr>
                                    <td class="celda">{{$loop->iteration}}</td>
                                    <td class="celda">{{$value->patient->name}}</td>
                                    <td class="celda">{{$value->patient->number}}</td>
                                    <td class="celda">{{$value->description}}</td>
                                    <td class="celda">{{$value->monto}}</td>
                                </tr>
                                @php
                                $acum_total += $value->monto;
                                @endphp
                            @endforeach
                            <tr>
                                <td class="celda" colspan="3"></td>
                                <td class="celda" >Totales PEN</td>                              
                                <td class="celda">{{$acum_total}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <div class="callout callout-info">
                <p>No se encontraron registros.</p>
            </div>
        @endif
    </body>
</html>
