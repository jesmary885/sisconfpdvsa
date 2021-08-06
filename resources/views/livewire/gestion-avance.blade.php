<div>
    <div class="card">
      @if ($asignacions->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-8">
                                <th class="w-full">Objetivo Operacional</th>
                                <th class="w-full pr-6">Avance Real</th>
                                <th class="w-full pr-6">Planificado</th>
                                <th class="w-full pr-6">Desviación</th>
                                <th class="w-full">Cumplimiento</th>
                                <th></th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($asignacions as $asignacion)
                            <tr class="py-2 border">
                                <td class="py-4 pr-4 pl-6">{{$asignacion->objoperacional->description}}</td>
                                <td class="py-2 pl-4">{{round($asignacion->avance->avance_real,2) ?? '-'}}</td>
                                <td class="py-2 pl-8">{{round($asignacion->avance->avance_plan,2) ?? '-'}}</td>
                                <td class="py-2 pl-8">{{round($asignacion->avance->avance_desviacion,2) ?? '-'}}</td>
                                <td class="py-2 pl-8">{{round($asignacion->avance->avance_cumplimiento,2) ?? '-'}}</td>
                                <td width="10px" class="px-4 items-center">
                                  <a href="{{route('asignacions.edit',$asignacion)}}" class="btn btn-primary px-4 text-red-500 text-sm font-bold">Editar</a>
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
