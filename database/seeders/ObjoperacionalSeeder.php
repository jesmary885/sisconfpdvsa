<?php

namespace Database\Seeders;

use App\Models\Objoperacional;
use Illuminate\Database\Seeder;

class ObjoperacionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $objoperacionals = [
            [
                'description' => '1.1.1  Analizar el "Contexto Operacional" de los activos ',
                'objtactico_id' => '1',
            ],
            [
                'description' => '1.1.2  Jerarquizar los activos por Análisis',
                'objtactico_id' => '1',
            ],
            [
                'description' => '1.1.3  Elaborar los Análisis de Modos y Efectos de Fallas (AMEF) de los activos',
                'objtactico_id' => '1',
            ],
            [
                'description' => '1.1.4  Aplicar Análisis Causa Raíz (ACR) en eventos recurrentes y/o de alto impacto en las operaciones',
                'objtactico_id' => '1',
            ],
            [
                'description' => '1.1.5  Elaborar los Indicadores de Desempeño de Activos (Equipos Dinámicos - Niveles de Confiabilidad)',
                'objtactico_id' => '1',
            ],
            [
                'description' => '1.1.6  Realizar Análisis de Oportunidades de Mejora en los activos críticos',
                'objtactico_id' => '1',
            ],
            [
                'description' => '1.2.1  Elaborar estudios de Confiabilidad / Disponibilidad / Mantenibilidad (Estudios de pronósticos - RAM) de los sistemas medulares',
                'objtactico_id' => '2',
            ],
            [
                'description' => '1.2.2  Aplicar Análisis Costo - Riesgo - Beneficio para la optimización de inversión de Capital, Frecuencias de Mantenimiento / Inspección e inventario de repuestos',
                'objtactico_id' => '2',
            ],
            [
                'description' => '1.2.3  Aplicar Análisis económico y de Costo del Ciclo de Vida en los activos',
                'objtactico_id' => '2',
            ],
            [
                'description' => '1.2.4  Elaborar Estudios de Carga - Resistencia para la determinación de la Vida remanente de los activos',
                'objtactico_id' => '2',
            ],
            [
                'description' => '1.2.5  Elaborar Análisis Probabilístico de Riesgos para la reducción de la incertidumbre en los procesos',
                'objtactico_id' => '2',
            ],
            [
                'description' => '1.2.6  Elaborar estudios de Confiabilidad Humana para la determinación de la influencia del factor humano en los procesos productivos',
                'objtactico_id' => '2',
            ],
            [
                'description' => '2.1.1 Evaluar la correspondencia de los planes de mantenimiento de las instalaciones criticas de acuerdo al contexto operacional vigente',
                'objtactico_id' => '3',
            ],
            [
                'description' => '2.1.2 Ajustar los planes de mantenimiento los activos de acuerdo a su Contexto Operacional',
                'objtactico_id' => '3',
            ],
            [
                'description' => '2.1.3 Medir la efectividad en la ejecución de los planes de mantenimiento Validados y ajustados',
                'objtactico_id' => '3',
            ],
            [
                'description' => '2.2.1 Elaborar planes de mantenimiento basados en la metodología Mantenimiento Centrado en Confiabilidad (MCC)',
                'objtactico_id' => '4',
            ],
            [
                'description' => '2.2.2 Elaborar planes de mantenimiento basados en la metodología Inspección Basada en Riesgos (IBR)',
                'objtactico_id' => '4',
            ],
            [
                'description' => '3.1.1 SAP PM - Documentar el proceso de definición de taxonomía de los activos de acuerdo a la Norma MM-01-01-07',
                'objtactico_id' => '5',
            ],
            [
                'description' => '3.1.2 Centinela - Fomentar la importancia del registro de datos confiables en forma oportuna y de calidad',
                'objtactico_id' => '5',
            ],
            [
                'description' => '3.1.3 SMRCO (SMI) - Documentar todas las recomendaciones derivadas de los estudios de Confiabilidad',
                'objtactico_id' => '5',
            ],
            [
                'description' => '3.1.4 SCIA - Promover la implementación del sistema en los activos de producción de la corporación ',
                'objtactico_id' => '5',
            ],
            [
                'description' => '3.2.1 Utilizar medios visuales informativos en las distintas áreas operativas para mostrar información básica y logros de la gerencia confiabilidad operacional',
                'objtactico_id' => '6',
            ],
            [
                'description' => '3.2.1 Utilizar medios visuales informativos en las distintas áreas operativas para mostrar información básica y logros de la gerencia confiabilidad operacional',
                'objtactico_id' => '6',
            ],
            [
                'description' => '3.2.3 Participar en foros/entrevistas de radio y televisión del circuito Pdvsa',
                'objtactico_id' => '6',
            ],
            [
                'description' => '3.2.4 Transmitir información de interés a través de las redes sociales oficiales de Pdvsa',
                'objtactico_id' => '6',
            ],
        ];

        foreach ($objoperacionals as $objoperacional) {
            Objoperacional::create($objoperacional);
        }
    }
}