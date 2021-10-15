<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Upload_Cash_Recharge extends Model implements Authenticatable {

    use\Illuminate\Auth\Authenticatable;

    protected $table = "upload_cash_recharge";
    protected $primaryKey = "ID";

} // ### End Of Class  ###