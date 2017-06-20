<?php

namespace App\Http\Controllers\Security;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clients\Client;
use App\Models\Administration\Parameters;
use App\Models\Security\Users;

class UsersController extends Controller {

    public function index() {
        $client_id = Client::all();
        $role_id = Parameters::where("group", "role_id")->get();
        return view("Security.Users.init", compact("client_id", "role_id"));
    }

    public function create() {
        return "create";
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
            unset($input["confirmation"]);

            if ($input["password"] != '') {
                $input["password"] = bcrypt($input["password"]);
            } else {
                unset($input["password"]);
            }

            $input["status_id"] = 1;

            $result = Users::create($input);
            if ($result) {
                return response()->json(['success' => true, "data" => $result]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function edit($id) {
        $row = Client::FindOrFail($id);
        return response()->json($row);
    }

    public function update(Request $request, $id) {
        $row = Client::FindOrFail($id);
        $input = $request->all();
        $result = $row->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id) {
        $row = Client::FindOrFail($id);
        $result = $row->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
