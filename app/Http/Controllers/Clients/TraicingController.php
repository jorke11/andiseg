<?php

namespace App\Http\Controllers\Clients;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Administration\Parameters;
use App\Models\Administration\Cities;
use App\Models\Clients\Orders;
use App\Models\Clients\Biografic;
use App\Models\Clients\AcademicDetail;
use App\Models\Clients\Academic;
use App\Models\Clients\Juridic;
use App\Models\Clients\JuridicDetail;
use App\Models\Clients\Anotations;
use App\Models\Clients\AnotationsDetail;
use App\Models\Clients\Laboral;
use App\Models\Clients\LaboralDetail;
use App\Models\Clients\Domicile;
use App\Models\Clients\Photo;
use DB;
use Illuminate\Support\Facades\Input;

class TraicingController extends Controller {

    public $name;
    public $path;

    public function __construct() {
        $this->name = '';
        $this->path = '';
    }

    public function index() {
        $type_document = Parameters::where("group", "type_document")->get();
        $type_study = Parameters::where("group", "type_study")->get();
        $questions = Parameters::where("group", "questions")->get();
        $entities = Parameters::where("group", "anotations")->get();
        $results = Parameters::where("group", "results")->get();
        $category = Parameters::where("group", "category")->get();
        $civil_status = Parameters::where("group", "civil_status")->get();
        $class_military = Parameters::where("group", "class_military")->get();
        $photo = Parameters::where("group", "photo")->get();
        $eps = Parameters::where("group", "eps_id")->get();
        $pensiones = Parameters::where("group", "pension_id")->get();

        $cities = Cities::all();
        return view("Clients.Traicing.init", compact("type_document", "cities", "type_study", "questions", "entities", "results", "category", "civil_status", "class_military", "photo", "eps", "pensiones"));
    }

    public function create() {
        return "create";
    }

    public function store(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            unset($input["id"]);
//            $user = Auth::User();
            $input["status_id"] = 1;
            $result = Orders::create($input);
            if ($result) {
                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function storeExcel(Request $request) {
        if ($request->ajax()) {

            $input = $request->all();
            $this->name = '';
            $this->path = '';
            $file = array_get($input, 'file_excel');
            $this->name = $file->getClientOriginalName();
            $this->name = str_replace(" ", "_", $this->name);
            $this->path = "uploads/products/" . date("Y-m-d") . "/" . $this->name;
            $file->move("uploads/products/" . date("Y-m-d") . "/", $this->name);

            return response()->json(["success" => true]);
        }
    }

    public function storePhoto(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();

//            dd($input);

            $file = Input::file('photo');

            $image = \Image::make(Input::file('photo'));
            $path = public_path() . '/uploads/' . $input["photo_id"] . "/";

            \File::makeDirectory($path, $mode = 0777, true, true);

            $input["img"] = 'uploads/' . $input["photo_id"] . '/' . $file->getClientOriginalName();
            $image->save($path . $file->getClientOriginalName());

            $image->resize(240, 200);
            $input["thumbnail"] = 'uploads/' . $input["photo_id"] . '/thumb_' . $file->getClientOriginalName();
            $image->save($path . 'thumb_' . $file->getClientOriginalName());

            $input["status_id"] = 1;
            $result = Photo::create($input);

            if ($result) {
                $detail = $this->getDetailPhoto($input["order_id"]);
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function storeAcademic(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            $input["academic_id"] = $input["id"];
            unset($input["id"]);
//            $user = Auth::User();

            $result = AcademicDetail::create($input);
            if ($result) {
                $header = Academic::where("order_id", $input["order_id"])->first();
                $detail = $this->getDetailAcademic($header->id);
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function storeJuridic(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            $input["juridic_id"] = $input["id"];
            unset($input["id"]);

            unset($input["id"]);
//            $user = Auth::User();

            $result = JuridicDetail::create($input);
            if ($result) {
                $header = Juridic::where("order_id", $input["order_id"])->first();
                $detail = $this->getDetailJuridic($header->id);
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function storeAnotations(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            $input["anotation_id"] = $input["id"];
            unset($input["id"]);

            unset($input["id"]);
//            $user = Auth::User();

            $result = AnotationsDetail::create($input);
            if ($result) {
                $header = Anotations::where("order_id", $input["order_id"])->first();
                $detail = $this->getDetailAnotations($header->id);
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function storeLaboral(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            $input["laboral_id"] = $input["id"];
            unset($input["id"]);

            unset($input["id"]);
//            $user = Auth::User();

            $result = LaboralDetail::create($input);
            if ($result) {
                $header = Laboral::where("order_id", $input["order_id"])->first();
                $detail = $this->getDetailLaboral($header->id);
                return response()->json(['success' => true, "detail" => $detail]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }

    public function edit($id) {
        $row = Biografic::
                        select("biografic.id", "o.name", "o.last_name", "o.document", "o.document_id", "o.address", "o.phone", "o.mobil", "o.city_id", DB::raw("biografic.*"), "o.neighborhood")
                        ->join(DB::raw("orders o"), "o.id", "biografic.order_id")
                        ->where("order_id", $id)->first();

        return response()->json($row);
    }

    public function editPhoto($id) {
        $detail = $this->getDetailPhoto($id);
        return response()->json(["detail" => $detail]);
    }

    public function deletePhoto($id) {
        $photo = Photo::find($id);
        \File::delete(array($photo->img, $photo->thumbnail));
        $photo->delete();
        return response()->json(["success" => true]);
    }

    public function editAcademic($id) {
        $header = Academic::where("order_id", $id)->first();
        $detail = $this->getDetailAcademic($header->id);

        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function editJuridic($id) {
        $header = Juridic::where("order_id", $id)->first();
        $detail = $this->getDetailJuridic($header->id);
        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function editLaboral($id) {
        $header = Laboral::where("order_id", $id)->first();
        $detail = $this->getDetailLaboral($header->id);
        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function editAnotations($id) {
        $header = Anotations::where("order_id", $id)->first();
        $detail = $this->getDetailAnotations($header->id);
        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function editDomicile($id) {
        $header = Domicile::where("order_id", $id)->first();
        return response()->json(["header" => $header]);
    }

    public function getDetailLaboral($id_laboral) {
        return LaboralDetail::select("laboral_detail.id", "p.description as result", "laboral_detail.business", "laboral_detail.activity", "laboral_detail.phone"
                                , "laboral_detail.position", "laboral_detail.fentry", "laboral_detail.fdeparture", "laboral_detail.contact", "laboral_detail.concept")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("laboral_detail.result_id and p.group='results'"))
                        ->where("laboral_detail.laboral_id", $id_laboral)
                        ->get();
    }

    public function getDetailPhoto($order_id) {
        return Photo::select("photo.id", "p.description as type_photo", "photo.img")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("photo.photo_id and p.group='photo'"))
                        ->where("order_id", $order_id)->get();
    }

    public function getDetailAnotations($id_anotation) {
        return AnotationsDetail::select("anotation_detail.id", "p.description as entity", "anotation_detail.verification_code", "anotation_detail.certificate", "anotation_detail.anotation")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("anotation_detail.entity_id and p.group='anotations'"))
                        ->where("anotation_detail.anotation_id", $id_anotation)
                        ->get();
    }

    public function getDetailJuridic($id_juridic) {

        return JuridicDetail::select("juridic_detail.id", "p.description as question", "juridic_detail.si_no", "juridic_detail.description")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("juridic_detail.question_id and p.group='questions'"))
                        ->where("juridic_detail.juridic_id", $id_juridic)
                        ->get();
    }

    public function getDetailAcademic($id_academic) {
        return AcademicDetail::select("academic_detail.id", "p.description as study", "academic_detail.obtained_title", "academic_detail.institution", "academic_detail.concept")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("academic_detail.study_id and p.group='type_study'"))
                        ->where("academic_detail.academic_id", $id_academic)
                        ->get();
    }

    public function update(Request $request, $id) {
        $row = Orders::FindOrFail($id);
        $input = $request->all();
        $result = $row->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateBiografic(Request $request, $id) {
        $row = Biografic::FindOrFail($id);

        $input = $request->all();
        $result = $row->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateBiograficOk(Request $request, $id) {
        $row = Biografic::FindOrFail($id);
        $input = $request->all();
        $input["status_id"] = 3;
        $result = $row->fill($input)->save();

        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateDomicile(Request $request, $id) {
        $row = Domicile::FindOrFail($id);

        $input = $request->all();
        $result = $row->fill($input)->save();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function destroy($id) {
        $row = Orders::FindOrFail($id);
        $result = $row->delete();
        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

}
