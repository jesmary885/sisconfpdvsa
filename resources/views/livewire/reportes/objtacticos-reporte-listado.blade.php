<div >
    <x-table-responsive>

        <div class="flex items-center">
            <p class="text-gray-500 text-lg font-bold text-center ml-2">Corte del año:</p>
            <select wire:model="ano_id" class="w-52 form-control h-8 text-m text-center ml-4">
                <option value="" selected>Seleccionar año</option>
                @foreach ($anos as $ano)
                <option value="{{$ano->id}}">{{$ano->ano}}</option>
                @endforeach
                </select> 
        </div>

        <div class="pt-4">
            <x-input type="text" 
                wire:model="search" 
                class="w-full h-12 px-2 mb-4 font-semibold"
                placeholder="Ingrese el nombre del Objetivo a buscar" />
        </div>
        <div class="card">
        @if ($objtacticos->count())
        <div class="card-body">
            
            <table class="table table-striped w-full">
                <thead>
                    <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-12">
                        <th >ID</th>
                        <th >Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($objtacticos as $objtactico)
                        <tr class="border-collapse border border-gray-300">
                            <td class="p-4 text-center">
                                {{ $objtactico->id }}
                            </td>
                            <td class="text-left px-4">
                                    {{$objtactico->description}}
                            </td>
                            <td class="px-4" > 
                                <a href="{{route('reporte.objtactico', ['objtactico' => $objtactico, 'anoreporte' => $anor])}}" class="text-blue-600 font-bold hover:text-blue-900">Repotactico                          
                                {{-- <a href="{{route('reporte.objtactico',$objtactico)}}" class="text-blue-600 font-bold hover:text-blue-900">Reporte</a> --}}
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        @else
            <div class="px-6 py-4">
                No hay ningún registro coincidente
            </div>
        @endif

        @if ($objtacticos->hasPages())
            
            <div class="px-6 py-4">
                {{ $objtacticos->links() }}
            </div>
            
        @endif
    </div>
            

    </x-table-responsive>

</div>