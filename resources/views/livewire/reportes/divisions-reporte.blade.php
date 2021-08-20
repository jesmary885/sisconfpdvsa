<div>
    @section('content')  
    <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE GENERAL</p>

        <div class="card">
            <div class="card-body">
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
                            <td class="py-2 text-center">{{round($real_total,2) ?? '-'}} %</td>
                            <td class="py-2 text-center">{{round($plan_total,2) ?? '-'}} %</td>
                            <?php 
                                $desviacion = ($plan_total) - ($real_total);
                                if( $desviacion >=1 && $desviacion <=9){
                                    $colord = 'orange';
                                }else if($desviacion >=10) {
                                    $colord = 'red';
                                }else if($desviacion <=1) {
                                    $colord = 'green';
                                }
                            ?>
                            <td class="text-center font-bold" style ="color: {{$colord}}"> {{round(($plan_total) - ($real_total)),2}} % </td>
                            <td class="text-center">{{round((($real_total) / ($plan_total))*100),2}} %</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="py-6">
            <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR NEGOCIO</p>
            <div class="card">
                <div class="card-body">
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
                                    <td class="text-center">{{round($negocio->reportenegocio->real,2) ?? '-'}} %</td>
                                    <td class="text-center">{{round($negocio->reportenegocio->plan,2) ?? '-'}} %</td>
                                    <?php 
                                        $desviacion_d = ($negocio->reportenegocio->plan) - ($negocio->reportenegocio->real);
                                        $cumplimiento_d = (($negocio->reportenegocio->real) / ($negocio->reportenegocio->plan)) * 100;
                                        if( $desviacion_d >=1 && $desviacion_d <=9){
                                            $colord_d = 'orange';
                                        }else if($desviacion_d >=10) {
                                            $colord_d = 'red';
                                        }else if($desviacion_d <=1) {
                                            $colord_d = 'green';
                                        }
                                      
                                    ?>
                                    <td class="text-center font-bold" style ="color: {{$colord_d}}">{{round($desviacion_d,2) ?? '-'}} %</td>
                                    <td class="text-center">{{round($cumplimiento_d,2) ?? '-'}} %</td>
                                </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
</div>