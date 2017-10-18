<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class DomicileLive extends Model {

    protected $table = "domicile_live";
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
