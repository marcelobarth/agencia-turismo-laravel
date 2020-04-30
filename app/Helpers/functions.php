<?php

/** Formata datas para o padrão brasileiro. */
function formatDateAndTime($value, $format = 'd/m/Y')
{
    return Carbon\Carbon::parse($value)->format($format);
}

/** Formata moeda para o padrão real Brasil. */
function formatCoin($value)
{
    return number_format($value, 2, ', ', ' . ');
}

function getInfoAirport($city)
{
    //Explode as informações de $city em um array pelo -.
    $dataCity = explode(' - ', $city);
    $idAirport = $dataCity[0];

    $dataCity = explode(' / ', $dataCity[1]);
    $cityName = $dataCity[0];
    $airportName = $dataCity[1];

    return [
        'id_airport'    => $idAirport,
        'name_airport'  => $airportName,
        'name_city'     => $cityName,
    ];
}

/**
 * Get all contraints on specific table
 * @param $table Name table
 * @param $column Add condition on query with column name
 */
// if (!function_exists('getContraintsInTable')) {
//     function getContraintsInTable($table, $column)
//     {
//         $sql = "
//             SELECT
//                 dc.name as name
//             FROM sys.tables t
//             INNER JOIN sys.default_constraints dc ON t.object_id = dc.parent_object_id
//             INNER JOIN sys.columns c ON dc.parent_object_id = c.object_id AND c.column_id = dc.parent_column_id
//             WHERE
//                 t.Name = '$table' AND c.name = '$column'
//         ";

//         return \DB::select($sql);
//     }
// }

/**
 * Drop constraints on specific table
 * @param $table Name table
 * @param $column Add condition on query with column name
 */
// if (!function_exists('dropConstraints')) {
//     function dropConstraints($table, $column)
//     {
//         $constraints = getContraintsInTable($table, $column);

//         foreach ($constraints as $constraint) {
//             \DB::statement("IF EXISTS(select 1 from sys.objects where name = '$constraint->name') ALTER TABLE $table DROP CONSTRAINT $constraint->name");
//         }
//     }
// }
