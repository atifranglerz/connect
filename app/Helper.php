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

function getCompany($company_id)
{
    $company = \App\Models\Company::where('id',$company_id)->first();

    return ucfirst($company->company);
}

function getCountryByVendor($vendor_id)
{
    $vendor = \App\Models\Vendor::where('id',$vendor_id)->first();

    return ucfirst($vendor->country);
}

function getCityByVendor($vendor_id)
{
    $vendor = \App\Models\Vendor::where('id',$vendor_id)->first();

    return ucfirst($vendor->city);
}
