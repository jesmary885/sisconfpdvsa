<div class="container">
    <p class=" text-gray-500 text-lg font-bold">Registro de Asignación</p>

    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">Objetivo Estrategico: </p>
        </div>
        <div class="col-span-3 pt-5 px-4">
            <select wire:model="objestrategicos_id" class="w-full form-control mt-4 h-8 text-xs outline-none">
                <option value="" selected>Seleccione un Objetivo Estrategico</option>
                @foreach ($objestrategicos as $objestrategico)
                    <option value="{{$objestrategico->id}}">{{$objestrategico->description}}</option>
                @endforeach
            </select>
            <x-input-error for="objestrategicos_id" />
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="items-center pr-4">
            <p class="text-gray-700 mt-6">Objetivo Tactico: </p>
        </div>
        <div class="items-center col-span-3 pt-2 px-4">
            <select wire:model="objtacticos_id" class="w-full form-control mt-4 h-8 text-xs outline-none">
                <option value="" selected disabled>Seleccione un Objetivo Tactico</option>
                @foreach ($tacticos as $tactico)
                    <option value="{{$tactico->id}}">{{$tactico->description}}</option>
                @endforeach
            </select>
            <x-input-error for="objtacticos_id" />
        </div>
    </div>

     <div class="grid grid-cols-4">
        <div class="tems-center pt-4">
            <p class="text-gray-700 pr-8">Objetivo Operacional: </p>
        </div>
        <div class="col-span-3 pt-2 px-4">
            <select wire:model="objoperacionals_id" class="w-full form-control mt-4 h-8 text-xs outline-none">
                <option value="" selected disabled>Seleccione un Objetivo Operacional</option>
                @foreach ($operacionals as $operacional)
                    <option value="{{$operacional->id}}">{{$operacional->description}}</option>
                @endforeach
            </select>
            <x-input-error for="objoperacionals_id" />
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
            <p class="text-gray-700 pr-8">Conformación de ENT:</p>
        </div>
        <div class="col-span-3 pt-6 w-full">
            <div class="flex justify-items-stretch w-full mr-6 px-4"> 
                <div>
                    <x-input.date wire:model.lazy="input_conformacion_i" id="input_conformacion_i" placeholder="Seleccione la fecha" class="px-4 outline-none" />
                    <x-input-error for="input_conformacion_i" />
                </div>
                <div class="ml-12">
                    <x-input.date wire:model.lazy="input_conformacion_f" id="input_conformacion_f" placeholder="Seleccione la fecha" class="px-4 outline-none" />
                    <x-input-error for="input_conformacion_f" />
                </div>
            </div> 
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="tems-center pt-4">
            <p class="text-gray-700 pr-8">Recopilación de información</p>
        </div>
        <div class="col-span-3 pt-6 w-full">
            <div class="flex justify-items-stretch w-full mr-6 px-4">
                <div>
                    <x-input.date wire:model.lazy="input_recopilacion_i" id="input_recopilacion_i" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_recopilacion_i" />
                </div>
                <div class="ml-12">
                    <x-input.date wire:model.lazy="input_recopilacion_f" id="input_recopilacion_f" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_recopilacion_f" />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
            <p class="text-gray-700 pr-8">Desarrollo y análisis</p>
        </div>
        <div class="col-span-3 pt-6 w-full">
            <div class="flex justify-items-stretch w-full mr-6 px-4">
                <div>
                    <x-input.date wire:model.lazy="input_inf_i" id="input_inf_i" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_inf_i" />
                </div>
                <div class="ml-12">
                    <x-input.date wire:model.lazy="input_inf_f" id="input_inf_f" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_inf_f" />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
            <p class="text-gray-700 pr-8">Elaboración del informe preliminar</p>
        </div>
        <div class="col-span-3 pt-6 w-full">
            <div class="flex justify-items-stretch w-full mr-6 px-4">
                <div>
                    <x-input.date wire:model.lazy="input_divulgacion_i" id="input_divulgacion_i" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_divulgacion_i" />
                </div>
                <div class="ml-12">
                    <x-input.date wire:model.lazy="input_divulgacion_f" id="input_divulgacion_f" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_divulgacion_f" />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
            <p class="text-gray-700 pr-8">Divulgación, publicación y carga en el SMI</p>
        </div>
        <div class="col-span-3 pt-6 w-full">
            <div class="flex justify-items-stretch w-full mr-6 px-4">
                <div>
                    <x-input.date wire:model.lazy="input_carga_i" id="input_carga_i" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_carga_i" />
                </div>
                <div class="ml-12">
                    <x-input.date wire:model.lazy="input_carga_f" id="input_carga_f" placeholder="Seleccione la fecha" class="px-4 outline-none"/>
                    <x-input-error for="input_carga_f" />
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">Región del Usuario: </p>
        </div>
        <div class="col-span-3 pt-5 px-4">
            <select wire:model="region_id" class="w-full form-control mt-4 h-8 text-xs outline-none" >
                <option value="" selected>Seleccionar Región</option>
                @foreach ($regions as $region)
                    <option value="{{$region->id}}">{{$region->name}}</option>
                @endforeach
            </select>
            <x-input-error for="region_id" />
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">División del Usuario: </p>
        </div>
        <div class="col-span-3 pt-5 px-4">
            <select wire:model="division_id" class="w-full form-control mt-4 h-8 text-xs outline-none">
                <option value="" selected>Seleccionar División</option>
                @foreach ($divisions as $division)
                    <option value="{{$division->id}}">{{$division->name}}</option>
                @endforeach
            </select>
            <x-input-error for="division_id" />
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">Negocio del Usuario: </p>
        </div>
        <div class="col-span-3 pt-5 px-4">
            <select wire:model="negocio_id" class="w-full form-control mt-4 h-8 text-xs outline-none">
                <option value="" selected>Seleccionar Negocio</option>
                @foreach ($negocios as $negocio)
                    <option value="{{$negocio->id}}">{{$negocio->name}}</option>
                @endforeach
            </select>
            <x-input-error for="negocio_id" />
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="items-center pt-4">
            <p class="text-gray-700 mt-6">Usuario: </p>
        </div>
        <div class="col-span-3 pt-5 px-4">
            <select wire:model="usuario_id" class="w-full form-control mt-4 h-8 text-xs outline-none">
                <option value="" selected>Seleccionar Usuario</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{$usuario->id}}">{{$usuario->name }} {{$usuario->apellido}}</option>
                @endforeach
            </select>
            <x-input-error for="usuario_id" />
        </div>
    </div>

    <div class="grid grid-cols-4">
        <div class="tems-center pt-6">
            <p class="text-gray-700 pr-8">Instalación:</p>
        </div>
        <div class="col-span-3 pt-6 w-full">
            <div class="flex justify-items-stretch w-full px-4">
                <div class="w-full">
                    <x-input wire:model="instalacion" class="block mt-1 outline-none w-full px-2" type="text" name="instalacion" id="instalacion" required />
                </div>
                
            </div>
        </div>
    </div>

    <div class="py-12">
        <x-button
            wire:click="save">
            Cargar Asignación
        </x-button>
    </div>
</div>
