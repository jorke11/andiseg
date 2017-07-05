<?php

namespace App\Models\Clients;

use Illuminate\Database\Eloquent\Model;

class AcademicDetail extends Model {

    protected $table = "academic_detail";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "academic_id",
        "study_id",
        "obtained_title",
        "institution",
        "concept_id",
    ];

}
