<div>
    <div class="card">
      @if ($asignacions->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                <th class="w-full text-center">Objetivo Operacional</th>
                                <th class="w-full pr-6 text-left">Avance Real</th>
                                <th class="w-full pr-6">Planificado</th>
                                <th class="w-full pr-6">Desviación</th>
                                <th class="w-full">Cumplimiento</th>
                                <th></th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($asignacions as $asignacion)
                            <tr class="py-2 border">
                                <td class="py-4 pr-4 pl-6">{{$asignacion->objoperacional->description}} </td>
                                <td class="py-2 pl-4">{{round($asignacion->avance->avance_real,2) ?? '-'}} %</td>
                                <td class="py-2 pl-8">{{round($asignacion->avance->avance_plan,2) ?? '-'}} %</td>
                                <?php $desviacion = ($asignacion->avance->avance_plan) - ($asignacion->avance->avance_real);
                                        if ($desviacion <=1) $colord = 'green';   
                                        elseif($desviacion >=2 && $desviacion <=10) $colord = 'orange';
                                        else $colord = 'red';
                                
                                        if ($desviacion > 100) $desviacion = 100;
                                        
                                        if ($asignacion->avance->avance_real == 0) $cumplimiento = (($asignacion->avance->avance_real) / (1)*100);
                                        else $cumplimiento = (($asignacion->avance->avance_real) / ($asignacion->avance->avance_plan)*100);

                                        if ($cumplimiento > 100) $cumplimiento = 100;
                                        ?>
                                        <td class="py-2 pl-8 font-bold" style ="color: {{$colord}}"> {{round($desviacion)}} % </td>
                                        <td class="py-2 pl-8">{{round($cumplimiento)}} %</td>
                                   
                                <td width="10px" class="px-4 items-center">
                                    @livewire('editar-asignacion', ['asignacion' => $asignacion])
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
         @else 
             <div class="card-body">
                <strong>No hay asignaciones</strong>
            </div>
         @endif 
            
    </div>
</div>
