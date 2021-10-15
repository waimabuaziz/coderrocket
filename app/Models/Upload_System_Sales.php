<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Upload_System_Sales extends Model implements Authenticatable {

    use\Illuminate\Auth\Authenticatable;

    protected $table = "upload_system_sales";
    protected $primaryKey = "ID";

} // ### End Of Class  ###