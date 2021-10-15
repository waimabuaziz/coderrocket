<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class Test extends Model implements Authenticatable {

    use\Illuminate\Auth\Authenticatable;

    protected $table = "test";
    protected $primaryKey = "Test_ID";

} // ### End Of Class  ###