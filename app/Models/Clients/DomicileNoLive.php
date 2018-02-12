<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class DomicileNoLive extends Model {

    protected $table = "domicile_nolive";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "order_id",
        "name",
        "relationship",
        "age",
        "occupation",
    ];

}
