<?php
use App\Models\Festivos;
use Carbon\Carbon;
function calculateDeadline($startingDate, $numberOfDaysToAdd)
{
    $holidays = Festivos::orderBy('fecha')->get();
    $festivos_fechas = $holidays->pluck('fecha');
    $festivos_string = strval($festivos_fechas);
    $fechas_array = explode(',', $festivos_string);

    foreach ($fechas_array as $key => $fecha) {
        $fechas_array[$key] = trim($fecha, '"');
    }

    $deadlineDate = $startingDate;

    for ($i = 1; $i <= $numberOfDaysToAdd; $i++) {
        $nextDay = date('Y-m-d', strtotime($startingDate . " +$i day"));
        if (date('N', strtotime($nextDay)) >= 6) {
            $numberOfDaysToAdd++;
            continue;
        }

        if (in_array($nextDay, $fechas_array)) {
            $numberOfDaysToAdd++;
            continue;
        }

        $deadlineDate = $nextDay;
    }

    return $deadlineDate;
}
?>
