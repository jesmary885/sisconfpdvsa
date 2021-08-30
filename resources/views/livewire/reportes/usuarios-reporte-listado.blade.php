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
            <x-input-error for="ano_id" />
        </div>

        <div class="pt-4">
            <x-input type="text" 
                wire:model="search" 
                class="w-full h-12 px-2 mb-4 font-semibold"
                placeholder="Ingrese el nombre o indicador del usuario a buscar" />
        </div>

        <div class="card">
            @if ($users->count())
                <div class="card-body">
                    <table class="table table-striped w-full">
                        <thead>
                            <tr class="text-gray-500 text-md font-bold bg-white rounded shadow-lg border h-12">
                                <th >ID</th>
                                <th >Nombre y apellido</th>
                                <th >Email</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="border-collapse border border-gray-300">
                                    <td class="p-4 text-center">
                                        {{ $user->id }}
                                    </td>
                                    <td class="text-center">
                                        {{$user->name}} {{$user->apellido}}
                                    </td>
                                    <td class="text-center">
                                        {{$user->email}} 
                                    </td>
                                    <td >
                                        <div x-show="count === 1" >
                                            <a href="{{route('reporte.usuario', ['usuario' => $user, 'anoreporte' => $anor])}}" class="text-blue-600 font-bold hover:text-blue-900">Reporte</a>  
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

            @if ($users->hasPages())
                <div class="px-6 py-4">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </x-table-responsive>
</div>


