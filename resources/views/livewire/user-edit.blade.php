<div>
    <div class="card">
        <h1 class="py-12 ml-4">Actualizar usuario</h1>
    </div>

    <div class="card w-full">
            <div class="card-body w-full">
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nombre">Nombre:</label>
                    <input wire:model.defer="nombre" type="text" name="nombre" class="form-control" >
                    <x-input-error for="nombre" />
                  </div>
                  <div class="form-group col-md-6">
                    <label for="apellido">Apellido:</label>
                    <input wire:model.defer="apellido" type="text" class="form-control">
                    <x-input-error for="apellido" />
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="email">Correo:</label>
                      <input wire:model="email" type="email" class="form-control" placeholder="Ingrese el correo">
                      <x-input-error for="email" />
                    </div>
                    <div class="form-group col-md-6">
                      <label for="indicador">Indicador</label>
                      <input wire:model="indicador" type="text" class="form-control" placeholder="Ingrese el indicador">
                      <x-input-error for="indicador" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cedula">Cédula:</label>
                        <input wire:model="cedula" type="text" class="form-control" placeholder="Ingrese la cedula">
                        <x-input-error for="cedula" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input wire:model="telefono" type="text" class="form-control" placeholder="Ingrese el teléfono">
                        <x-input-error for="telefono" />
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="region">Región</label>
                        <select wire:model="region_id" class="form-control">
                            <option value="" selected>Seleccionar Región</option>
                            @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="region_id" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="region">División</label>
                        <select wire:model="division_id" class="form-control">
                            <option value="" selected>Seleccionar División</option>
                            @foreach ($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="division_id" />
                    </div>
                    <div class="form-group col-md-4">
                        <label for="region">Negocio</label>
                        <select wire:model="negocio_id" class="form-control">
                            <option value="" selected>Seleccionar Negocio</option>
                            @foreach ($negocios as $negocio)
                                <option value="{{$negocio->id}}">{{$negocio->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error for="negocio_id" />
                    </div>
                </div>
                <div class="py-12 flex">
                    <button type="submit" class="btn btn-primary" wire:click="save">
                        Actualizar usuario
                    </button>
                    <a href="{{route('admin.users.index')}}" class="btn btn-primary"><i class="fas fa-undo-alt"></i> Regresar</a>
                </div>
        </div>
    </div>
</div>

