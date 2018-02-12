<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class DomicileDocumentation extends Model {

    protected $table = "domicile_documentation";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "order_id",
        "document_id",
        "document",
        "expedition_date",
        "classes_id",
        "category_id",
        "district",
    ];

}
