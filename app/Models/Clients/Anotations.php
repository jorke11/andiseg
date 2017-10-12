<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Anotations extends Model {

    protected $table = "anotations";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "order_id",
        "status_id",
        "concept_id",
    ];

}
