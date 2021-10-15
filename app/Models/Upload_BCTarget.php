<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Upload_BCTarget extends Model implements Authenticatable {

    use\Illuminate\Auth\Authenticatable;

    protected $table = "upload_bctarget";
    protected $primaryKey = "BCTarget_ID";

} // ### End Of Class  ###