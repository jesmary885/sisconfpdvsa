<?php

namespace App\Http\Livewire;

use App\Models\Avance;
use Livewire\Component;

class EditarAsignacion extends Component
{
    public $asignacion,$conformacion,$recopilacion,$informacion,$divulgacion,$recomendaciones;
    public $open = false;

    protected $rules = [
        'conformacion' => 'required|numeric',
        'recopilacion' => 'required|numeric',
        'informacion' => 'required|numeric',
        'divulgacion' => 'required|numeric',
        'recomendaciones' => 'required|numeric',
    ];

    public function render()
    {
        return view('livewire.editar-asignacion');
    }

    public function update()
    {

        $rules = $this->rules;
        $this->validate($rules);

        $avance = Avance::where('asignacion_id',$this->asignacion->id)->first();

        $conformacion = $this->conformacion * 0.10;
        $recopilacion = $this->recopilacion * 0.50;
        $informacion = $this->informacion * 0.20;
        $divulgacion = $this->divulgacion * 0.15;
        $recomendaciones = $this->recomendaciones * 0.05;
        $sumreal= $conformacion + $recopilacion + $informacion + $divulgacion + $recomendaciones;
        if($sumreal > 100){
            $sumreal = 100;
        }
        $desviacion = ($avance->avance_plan) - $sumreal;
        if($desviacion > 100){
            $desviacion = 100;
        }
        $cumplimiento = (($sumreal / ($avance->avance_plan)) * 100);
        if($cumplimiento > 100){
            $cumplimiento = 100;
        }
        $avance->avance_real = $sumreal;
        $avance->asignacion_id = $this->asignacion->id;
        $avance->avance_plan = $avance->avance_plan;
        $avance->avance_desviacion = $desviacion;
        $avance->avance_cumplimiento = $cumplimiento;
        $avance->save();

        return redirect()->route('home.avance');
    }
}
