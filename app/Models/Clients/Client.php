<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Client extends Model {

    protected $table = "clients";
    protected $primaryKey = "id";
    protected $fillable = ["id", "business_name", "document_id", "document", "verification", "person_id", "regimen_id", "department_id",
        "city_id", "address", "mobil", "status_id", "insert_id", "executive_id"];

}
