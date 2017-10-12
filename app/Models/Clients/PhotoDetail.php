<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class PhotoDetail extends Model {

    protected $table = "photo_detail";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "photo_id",
        "img",
        "typephoto_id",
        "thumbnail",
    ];

}
