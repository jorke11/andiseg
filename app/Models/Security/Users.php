<?php

namespace App\Models\Security;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {

    protected $table = "users";
    protected $primaryKey = "id";
    protected $fillable = [
        "id",
        "name",
        "last_name",
        "email",
        "password",
        "role_id",
        "client_id",
        "document",
        "status_id",
    ];

}
