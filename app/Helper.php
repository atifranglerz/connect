<?php

function keywords(){
    $keyword = 'Repair My Car';
    return $keyword;
}
function descriptions()
{
    $description = 'Repair My Car';
    return $description;
}

function modelYear($model_year_id)
{
    $modelYear = \App\Models\ModelYear::where('id',$model_year_id)->first();

    return $modelYear->model_year;
}
