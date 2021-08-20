<div >
    <x-table-responsive>

        <div>

            <x-input type="text" 
                wire:model="search" 
                class="w-full h-12 px-2 mb-4 font-semibold"
                placeholder="Ingrese el nombre del Objetivo a buscar" />

        </div>
        <div class="card">
        @if ($objestrategicos->count())
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
                    @foreach ($objestrategicos as $objestrategico)
                        <tr class="border-collapse border border-gray-300">
                            <td class="p-4 text-center">
                                {{ $objestrategico->id }}
                            </td>
                            <td class="text-left px-4">
                                    {{$objestrategico->description}}
                            </td>
                            <td class="px-4" >                           
                                <a href="{{route('reporte.objestrategico',$objestrategico)}}" class="text-blue-600 font-bold hover:text-blue-900">Reporte</a>
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

        @if ($objestrategicos->hasPages())
            
            <div class="px-6 py-4">
                {{ $objestrategicos->links() }}
            </div>
            
        @endif
    </div>
            

    </x-table-responsive>

</div>
