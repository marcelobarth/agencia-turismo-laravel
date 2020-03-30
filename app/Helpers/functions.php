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
