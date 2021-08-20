<div>
    <x-secondary-button wire:click="$set('open', true)">
        Reporte
    </x-secondary-button>

    <x-dialog-modal wire:model="open">
        <x-slot name="title">
            Reporte por región
        </x-slot>

        <x-slot name="content">
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
                                <td class="py-2 text-center">{{round($real_total_r,2) ?? '-'}} %</td>
                                <td class="py-2 text-center">{{round($plan_total_r,2) ?? '-'}} %</td>
                                <?php 
                                    if( $desviacion_r >=1 && $desviacion_r <=9){
                                        $colord = 'orange';
                                    }else if($desviacion_r >=10) {
                                        $colord = 'red';
                                    }else if($desviacion_r <=1) {
                                        $colord = 'green';
                                    }
                                ?>
                                <td class="text-center font-bold" style ="color: {{$colord}}"> {{round($desviacion_r),2}} % </td>
                                <td class="text-center">{{round($cumplimiento_r*100),2}} %</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="py-6">
                <p class="text-gray-500 text-md font-bold bg-white text-center rounded shadow-lg border h-8"> REPORTE POR DIVISIÓN</p>
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped w-full">
                            <thead>
                                <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                    <th>División</th>
                                    <th>Avance Real</th>
                                    <th>Planificado</th>
                                    <th >Desviación</th>
                                    <th >Cumplimiento</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($divisions as $division)
                                    <tr class="py-2 border-collapse border border-gray-300">
                                        <td class="py-2 text-center">{{$division->name}}</td>
                                        <td class="text-center">{{round($division->reportedivision->real,2) ?? '-'}} %</td>
                                        <td class="text-center">{{round($division->reportedivision->plan,2) ?? '-'}} %</td>
                                        <?php 
                                            $desviacion_d = ($division->reportedivision->plan) - ($division->reportedivision->real);
                                            $cumplimiento_d = (($division->reportedivision->real) / ($division->reportedivision->plan)) * 100;
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

        </x-slot>

        <x-slot name=footer>
            <x-button>
                {{ __('Exportar') }}
            </x-button>
        </x-slot>
        
    </x-dialog-modal>
</div>
