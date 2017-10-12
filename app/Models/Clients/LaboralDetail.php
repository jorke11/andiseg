<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class LaboralDetail extends Model {

    protected $table = "laboral_detail";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "laboral_id",
        "business",
        "activity",
        "phone",
        "position",
        "fentry",
        "fdeparture",
        "contact",
        "concept",
        "result_id",
        "position_contact",
    ];

}
