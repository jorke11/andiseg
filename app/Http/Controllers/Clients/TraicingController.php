<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TraicingController extends Controller {

    public function index() {
        return view("Clients.Traicing.init");
    }

}
