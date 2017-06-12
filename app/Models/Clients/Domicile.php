<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Domicile extends Model {

    protected $table = "domicile";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "order_id",
        "status_id",
        "result_id",
        "concept",
    ];

}
