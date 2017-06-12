<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Laboral extends Model {

    protected $table = "laboral";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "order_id",
        "status_id",
    ];

}
