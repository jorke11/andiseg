<?php

namespace App\Http\Controllers\Administration;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration\Cities;
use App\Models\Security\Users;
use Illuminate\Support\Facades\Auth;
use App\Models\Administration\Parameters;
use App\Models\Administration\Department;
use DB;

class SeekController extends Controller {

    public function getCity(Request $req) {
        $in = $req->all();
        $query = Cities::select("id", DB::raw("initcap(description) as text"));
        if (isset($in["q"]) && $in["q"] == "0") {
            $query->where("id", Auth::user()->city_id)->get();
        } else if (isset($in["id"])) {
//            if ($in["id"] != '')
            $query->where("id", $in["id"])->get();
        } else {
            $query->where("description", "ilike", "%" . $in["q"] . "%")->get();
        }

        $result = $query->get();

        return response()->json(['items' => $result, "pages" => count($result)]);
    }

    public function getDepartment(Request $req) {
        $in = $req->all();
        $query = Department::select("id", "description as text");
        if (isset($in["q"]) && $in["q"] == "0") {
            $query->where("id", Auth::user()->city_id)->get();
        } else if (isset($in["id"])) {
            $query->where("id", $in["id"])->get();
        } else {
            $query->where("description", "ilike", "%" . $in["q"] . "%")->get();
        }

        $result = $query->get();

        return response()->json(['items' => $result, "pages" => count($result)]);
    }

}
