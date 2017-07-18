<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Academic extends Model {

    protected $table = "academic";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "order_id",
        "status_id",
    ];

}
