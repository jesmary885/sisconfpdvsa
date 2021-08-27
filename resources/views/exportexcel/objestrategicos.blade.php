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
