<p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>
    <table class="table table-striped w-full">
        <thead>
            <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                <th>Avance Real</th>
                <th>Planificado</th>
                <th >Desviación</th>
                <th >Cumplimiento</th>

            </tr>
        </thead>
        <tbody>
            <tr class="py-2 border-collapse border border-gray-300">
                <td class="py-2 text-center">{{$reporte->reporte_real}} %</td>
                <td class="py-2 text-center">{{$reporte->reporte_plan}} %</td>
                <td class="text-center font-bold"> {{$reporte->reporte_desviacion}} % </td>
                <td class="text-center">{{$reporte->reporte_cumplimiento}} %</td>
            </tr>
        </tbody>
    </table>

    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR NEGOCIO</p>
    <table class="table table-striped w-full">
        <thead>
            <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                <th>Negocio</th>
                <th>Avance Real</th>
                <th>Planificado</th>
                <th >Desviación</th>
                <th >Cumplimiento</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($negocios as $negocio)
                <tr class="py-2 border-collapse border border-gray-300">
                    <td class="py-2 text-center">{{$negocio->name}}</td>
                    <td class="text-center">{{round($negocio->reportenegocio->real,2)}} %</td>
                    <td class="text-center">{{round($negocio->reportenegocio->plan,2)}} %</td>
                    <?php 
                        if($negocio->reportenegocio->plan == '0'){
                            $desviacion_d = 0;
                            $cumplimiento_d = 0;
                        }
                        else{
                            $desviacion_d = ($negocio->reportenegocio->plan) - ($negocio->reportenegocio->real);
                            $cumplimiento_d = (($negocio->reportenegocio->real) / ($negocio->reportenegocio->plan)) * 100;
                            if($desviacion_d > 100){
                                $desviacion_d = 100;
                            }
                            if($cumplimiento_d > 100){
                                $cumplimiento_d = 100;
                            }
                        }
                    ?>
                    <td class="text-center font-bold">{{round($desviacion_d,2)}} %</td>
                    <td class="text-center">{{round($cumplimiento_d,2)}} %</td>
                </tr>
            @endforeach 
        </tbody>
    </table>