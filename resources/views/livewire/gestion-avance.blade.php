<div>
    <div class="card">
      
      @if ($asignacions->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Estrategico</th>
                            <th>Tactivo</th>
                            <th>Operacional</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($asignacions as $asignacion)
                            <tr>
                                <td>{{$asignacion->objestrategico->description}}</td>
                                <td>{{$asignacion->objoperacional->description}}</td>
                                <td>{{$asignacion->objtactico->description}}</td>
                                <td width="10px">
                                    <a href="{{route('avances.edit',$asignacion->id)}}" class="btn btn-primary">Cargar avance</a>
                                </td>
                            </tr>
                        @endforeach 
                    </tbody>
                </table>
            </div>
           
         @else 
             <div class="card-body">
                <strong>No hay asignaciones</strong>
            </div>
         @endif 
            
    </div>
    
</div>
