<div>
    <div class="card">
        <h1 class="py-12">Registro de Usuarios</h1>
    </div>

    <div class="card w-full">
        <div class="card-body w-full">
         
            <form>

                @if ($mensaje)
                <div class="alert alert-success" role="alert">
                    <strong>Usuario creado correctamente</strong>
                </div>
                    
                @endif
      
          
          
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="nombre">Nombre:</label>
                    <input wire:model="nombre" type="text" class="form-control" placeholder="Ingrese el nombre">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="apellido">Apellido:</label>
                    <input wire:model="apellido" type="text" class="form-control" placeholder="Ingrese el apellido">
                  </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="email">Correo:</label>
                      <input wire:model="email" type="email" class="form-control" placeholder="Ingrese el correo">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="indicador">Indicador</label>
                      <input wire:model="indicador" type="text" class="form-control" placeholder="Ingrese el indicador">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cedula">Cedula:</label>
                        <input wire:model="cedula" type="text" class="form-control" placeholder="Ingrese la cedula">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="telefono">Teléfono</label>
                        <input wire:model="telefono" type="text" class="form-control" placeholder="Ingrese el teléfono">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="region">Region</label>
                        <select wire:model="region_id" class="form-control">
                            <option value="" selected>Seleccionar Región</option>
                            @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="region">Division</label>
                        <select wire:model="division_id" class="form-control">
                            <option value="" selected>Seleccionar División</option>
                            @foreach ($divisions as $division)
                                <option value="{{$division->id}}">{{$division->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="region">Negocio</label>
                        <select wire:model="negocio_id" class="form-control">
                            <option value="" selected>Seleccionar Negocio</option>
                            @foreach ($negocios as $negocio)
                                <option value="{{$negocio->id}}">{{$negocio->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="py-12">
                    <button type="submit" class="btn btn-primary" wire:click="save">
                        Registrar usuario
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('script')
        <script>
            livewire.on('usercreate', function(){
            Swal.fire(
                'Usuario registrado!',
                '',
                'success')
        })
        </script>
    @endpush
  
  

</div>
