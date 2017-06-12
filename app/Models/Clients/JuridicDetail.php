<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class JuridicDetail extends Model {

    protected $table = "juridic_detail";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "question_id",
        "juridic_id",
        "si_no",
        "description",
    ];

}
