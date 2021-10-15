<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Upload_Package_Sale extends Model implements Authenticatable {

    use\Illuminate\Auth\Authenticatable;

    protected $table = "upload_package_sale";
    protected $primaryKey = "ID";

} // ### End Of Class  ###