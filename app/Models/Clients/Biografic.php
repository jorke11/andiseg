<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Biografic extends Model {

    protected $table = "biografic";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "status_id",
        "city_expedition_id",
        "city_birth_id",
        "age",
        "civil_status_id",
        "passport",
        "militar_card",
        "classes_id",
        "district",
        "category_id",
        "profession",
        "driving_licence",
        "professional_card",
        "email",
        "eps_id",
        "pensiones_id",
        "phone2"
    ];

}
