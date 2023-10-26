<?php

namespace App\services;


use Illuminate\Support\Carbon;

class MainService
{
public function dateFormat($create_at){

    return Carbon::parse($create_at)->format('d-m-y || H:i');
}
}
