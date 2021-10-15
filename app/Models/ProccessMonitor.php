<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class ProccessMonitor extends Model implements Authenticatable {

    use\Illuminate\Auth\Authenticatable;

    protected $table = "proccessmonitor";
    protected $primaryKey = "ID";

} // ### End Of Class  ###