<div x-data="{ count: 0 }">
    <x-table-responsive>
        <div class="flex items-center">
            <p class="text-gray-500 text-lg font-bold text-center ml-2">Corte del año:</p>
            <select wire:model="ano_id" x-on:click="count = 1" class="w-52 form-control h-8 text-m text-center ml-4">
                <option value="" selected>Seleccionar año</option>
                @foreach ($anos as $ano)
                <option value="{{$ano->id}}">{{$ano->ano}}</option>
                @endforeach
        </select> 
       
        </div>     

        <div class="pt-4">
            <x-input type="text" 
                wire:model.defer="search" 
                class="w-full h-12 px-2 font-semibold"
                placeholder="Ingrese el nombre de la región a buscar" />
        </div>
        <div class="card">
            @if ($regions->count())
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
                            @foreach ($regions as $region)
                                <tr class="border-collapse border border-gray-300">
                                    <td class="p-4 text-center">
                                        {{ $region->id }}
                                    </td>
                                    <td class="text-center">
                                            {{$region->name}}
                                    </td>
                                    <td >        
                                      {{-- @livewire('reportes.regions-reporte', ['region' => $region,'ano' => $this->anoSelect])--}}
                                    <div x-show="count === 1" >
                                        <a href="{{route('reporte.region', ['region' => $region, 'anoreporte' => $anor])}}" class="text-blue-600 font-bold hover:text-blue-900">Reporte</a>
                                    </div>
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
            @if ($regions->hasPages())
                <div class="px-6 py-4">
                    {{ $regions->links() }}
                </div>
            @endif
        </div>  

       
    </x-table-responsive>

{{-- 
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('#select_ano'). select2()
            $('#select_ano').on('change',function(e){
                var aID= $('#select_ano').select2("val")
                var anos= $('#select_ano option:selected').text()
                @this.set('anoSelectId', aID)
                @this.set('anoSelect', anos)
            });
        });
    </script>  --}}
</div>




