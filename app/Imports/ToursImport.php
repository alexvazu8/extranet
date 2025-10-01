<?php

namespace App\Imports;

use App\Models\Tour;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ToursImport implements ToCollection, WithHeadingRow
{
 
    public function collection(Collection $rows)
    {
        $registros = [];
        
        foreach ($rows as $row) {
            // Validación de campos requeridos
            if (empty($row['tour_id']) || empty($row['fecha_de']) || empty($row['fecha_hasta'])|| empty($row['adultos'])|| empty($row['costo_adulto'])) {
                continue;
            }

            try {
                $fechaDe = $this->excelToDate($row['fecha_de']);
                $fechaHasta = $this->excelToDate($row['fecha_hasta']);

                // Validar rango de fechas (máximo 2 años)
                if ($fechaHasta < $fechaDe || $fechaDe->diffInDays($fechaHasta) > 730) {
                    continue;
                }

                // Convertir horas
                // $horaInicio = $this->excelToTime($row['hora_inicio_atencion']);
                // $horaFin = $this->excelToTime($row['hora_final_atencion']);

                // Generar todas las fechas del rango
                while ($fechaDe <= $fechaHasta) {
                    $registros[] = [
                        'Cantidad_adultos' => $row['adultos'] ?? 0,
                        'Cantidad_menores' => $row['menores'] ?? 0,
                        'Costo_adulto' => (float) str_replace(',', '', $row['costo_adulto']),
                        'Costo_menor' => (float) str_replace(',', '', $row['costo_menor']),
                        'Edad_menor' => $row['edad_menores_hasta'] ?? null,
                        'Fecha_disponible' => $fechaDe->format('Y-m-d'),
                        'Cupo' => $row['cupo'] ?? null,
                        'Release' => $row['release'] ?? null,
                        'Tours_id' => $row['tour_id'] ?? null,
                        'cierre' => $row['cierre'] ?? null,
                        'created_at' => now(),
                        'updated_at' => now()
                    ];

                    $fechaDe->addDay();
                    
                    // Insertar en bloques de 500 para no sobrecargar memoria
                    if (count($registros) >= 500) {
                        DB::table('tours_contrato_cupos')->insert($registros);
                        $registros = [];
                    }
                }
            } catch (\Exception $e) {
                Log::error('Error procesando fila', ['error' => $e->getMessage()]);
                continue;
            }
        }

        // Insertar los registros restantes
        if (!empty($registros)) {
            DB::table('tours_contrato_cupos')->insert($registros);
        }
    }

    private function excelToDate($serial)
    {
        $excelBugOffset = ($serial >= 60) ? 1 : 0;
        
        return Carbon::createFromFormat('Y-m-d', '1899-12-31')
            ->addDays($serial - $excelBugOffset)
            ->startOfDay();
    }

    private function excelToTime($fraction)
    {
        $hours = $fraction * 24;
        $minutes = ($hours - floor($hours)) * 60;
        return sprintf("%02d:%02d", floor($hours), floor($minutes));
    }
}
