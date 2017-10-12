<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class AnotationsDetail extends Model {

    protected $table = "anotation_detail";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "entity_id",
        "anotation_id",
        "verification_code",
        "certificate",
        "anotation",
        "img",
    ];

}
