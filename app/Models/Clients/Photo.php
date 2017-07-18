<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

    protected $table = "photo";
    protected $primaryKey = "id";
    protected $fillable = ["id", "order_id", "photo_id", "status_id", "img","thumbnail"];

}
