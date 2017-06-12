<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Juridic extends Model {

    protected $table = "juridic";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "order_id",
        "status_id",
    ];

}
