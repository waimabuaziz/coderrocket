<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Upload_Subscription_Report extends Model implements Authenticatable {

    use\Illuminate\Auth\Authenticatable;

    protected $table = "upload_subscription_report";
    protected $primaryKey = "ID";

} // ### End Of Class  ###