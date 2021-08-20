<div >
        <x-table-responsive>

            <div>

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
                                    <a href="{{route('reporte.usuario',$user)}}" class="text-blue-600 font-bold hover:text-blue-900">Reporte</a>
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


