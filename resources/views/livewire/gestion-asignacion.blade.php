<div class="container">
 

    <p class=" text-gray-500 text-lg font-bold">Registro de Asignación</p>

    {{--Objetivo Estrategico--}}

    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">Objetivo Estrategico: </p>
        </div>
            <div class="col-span-3 pt-5">
                <select wire:model="objestrategicos_id" class="w-full form-control mt-4 h-8 text-xs">
                    <option value="" selected>Seleccione un Objetivo Estrategico</option>
            
                    @foreach ($objestrategicos as $objestrategico)
                        <option value="{{$objestrategico->id}}">{{$objestrategico->description}}</option>
                    @endforeach
                </select>
            </div>
    </div>
    

      {{--Objetivo Estrategico--}}
      <div class="grid grid-cols-4">
        <div class="items-center pr-4">
            <p class="text-gray-700 mt-6">Objetivo Tactico: </p>
        </div>
            <div class="items-center col-span-3 pt-2">
                <select wire:model="objtacticos_id" class="w-full form-control mt-4 h-8 text-xs">
                    <option value="" selected disabled>Seleccione un Objetivo Tactico</option>
            
                    @foreach ($tacticos as $tactico)
                        <option value="{{$tactico->id}}">{{$tactico->description}}</option>
                    @endforeach
                </select>
            </div>
       

      </div>

      

     {{--Objetivo Operacional--}}
     <div class="grid grid-cols-4">
        <div class="tems-center pt-4">
            <p class="text-gray-700 pr-8">Objetivo Operacional: </p>
        </div>
            <div class="col-span-3 pt-2">
                <select wire:model="objoperacionals_id" class="w-full form-control mt-4 h-8 text-xs">
                    <option value="" selected disabled>Seleccione un Objetivo Operacional</option>
            
                    @foreach ($operacionals as $operacional)
                        <option value="{{$operacional->id}}">{{$operacional->description}}</option>
                    @endforeach
                </select>
            </div>
     </div>

     <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
         <p class="text-gray-700 pr-8">Conformación de ENT:</p>
        </div>
            <div class="col-span-3 pt-6 w-full">
                 <div class="flex justify-items-stretch w-full mr-6"> 
                    <div>
                        <x-input.date wire:model.lazy="input_conformacion_i" id="input_conformacion_i" placeholder="Seleccione la fecha" class="px-6" />
                    </div>
                   <div class="ml-12">
                        <x-input.date wire:model.lazy="input_conformacion_f" id="input_conformacion_f" placeholder="Seleccione la fecha" class="px-6" />
                    </div>
                </div> 
            </div>
     </div>

      <div class="grid grid-cols-4">
        <div class="tems-center pt-4">
         <p class="text-gray-700 pr-8">Recopilación de información, Desarrollo y Analisis:</p>
        </div>
            <div class="col-span-3 pt-6 w-full">
                <div class="flex justify-items-stretch w-full mr-6">
                    <div>
                        <x-input.date wire:model.lazy="input_recopilacion_i" id="input_recopilacion_i" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                    <div class="ml-12">
                        <x-input.date wire:model.lazy="input_recopilacion_f" id="input_recopilacion_f" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                </div>
            </div>
     </div>

     <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
         <p class="text-gray-700 pr-8">Información Preliminar:</p>
        </div>
            <div class="col-span-3 pt-6 w-full">
                <div class="flex justify-items-stretch w-full mr-6">
                    <div>
                        <x-input.date wire:model.lazy="input_inf_i" id="input_inf_i" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                    <div class="ml-12">
                        <x-input.date wire:model.lazy="input_inf_f" id="input_inf_f" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                </div>
            </div>
     </div>

     <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
         <p class="text-gray-700 pr-8">Divulgación y Publicación:</p>
        </div>
            <div class="col-span-3 pt-6 w-full">
                <div class="flex justify-items-stretch w-full mr-6">
                    <div>
                        <x-input.date wire:model.lazy="input_divulgacion_i" id="input_divulgacion_i" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                    <div class="ml-12">
                        <x-input.date wire:model.lazy="input_divulgacion_f" id="input_divulgacion_f" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                </div>
            </div>
     </div>

     <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
         <p class="text-gray-700 pr-8">Carga de Recomendaciones:</p>
        </div>
            <div class="col-span-3 pt-6 w-full">
                <div class="flex justify-items-stretch w-full mr-6 pr-4">
                    <div>
                        <x-input.date wire:model.lazy="input_carga_i" id="input_carga_i" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                    <div class="ml-12">
                        <x-input.date wire:model.lazy="input_carga_f" id="input_carga_f" placeholder="Seleccione la fecha" class="px-6"/>
                    </div>
                </div>
            </div>
     </div> 

     @if ($saved)
            <script type="text/javascript"> 
            window.alert("La asignacion se ha registrado correctamente");
            </script>
    @endif

      {{--Region--}}

    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">Región del Usuario: </p>
        </div>
            <div class="col-span-3 pt-5">
                <select wire:model="region_id" class="w-full form-control mt-4 h-8 text-xs" >
                    <option value="" selected>Seleccionar Región</option>
            
                    @foreach ($regions as $region)
                        <option value="{{$region->id}}">{{$region->name}}</option>
                    @endforeach
                </select>
            </div>
    </div>

        {{-- División --}}
    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">División del Usuario: </p>
        </div>
            <div class="col-span-3 pt-5">
                <select wire:model="division_id" class="w-full form-control mt-4 h-8 text-xs">
                    <option value="" selected>Seleccionar División</option>
            
                    @foreach ($divisions as $division)
                        <option value="{{$division->id}}">{{$division->name}}</option>
                    @endforeach
                </select>
            </div>
    </div>

         {{-- Negocio --}}
         <div class="grid grid-cols-4">
            <div class="items-center pt-4">
                <p class="text-gray-700 mt-6">Negocio del Usuario: </p>
            </div>
                <div class="col-span-3 pt-5">
                    <select wire:model="negocio_id" class="w-full form-control mt-4 h-8 text-xs">
                        <option value="" selected>Seleccionar Negocio</option>
                
                        @foreach ($negocios as $negocio)
                            <option value="{{$negocio->id}}">{{$negocio->name}}</option>
                        @endforeach
                    </select>
                </div>
        </div>

         {{-- Usuario --}}
         <div class="grid grid-cols-4">
            <div class="items-center pt-4">
                <p class="text-gray-700 mt-6">Usuario: </p>
            </div>
                <div class="col-span-3 pt-5">
                    <select wire:model="usuario_id" class="w-full form-control mt-4 h-8 text-xs">
                        <option value="" selected>Seleccionar Usuario</option>
                
                        @foreach ($usuarios as $usuario)
                            <option value="{{$usuario->id}}">{{$usuario->name }} {{$usuario->apellido}}</option>
                        @endforeach
                    </select>
                </div>
        </div>

        <div class="py-12">
            <x-button
                wire:click="save">
                Cargar Asignación
            </x-button>
        </div>


</div>
