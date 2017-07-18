<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model {

    protected $table = "orders";
    protected $primaryKey = "id";
    protected $fillable = ["id", "name", "last_name", "document", "document_id", "department_id","city_id", "address", "mobil", "phone",
        "status_id","neighborhood","cost_center","position","insert_id","insert_id","schema_id","event_id"];

}
