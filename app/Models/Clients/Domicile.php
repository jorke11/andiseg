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
        "name",
        "last_name",
        "document_id",
        "document",
        "city_expedition_id",
        "expedition_date",
        "city_birth_id",
        "birth_date",
        "blood_group",
        "age",
        "civil_status_id",
        "time_married",
        "quantity_child",
        "address",
        "neighborhood",
        "location",
        "stratum",
        "email",
        "mobil",
        "aspiration",
        "phone",
        
    ];

}
