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
use App\Models\Clients\PhotoDetail;
use DB;
use Illuminate\Support\Facades\Input;
use App\Models\Security\Users;
use Image;
use File;
use Auth;
use Mail;
use Log;
use App\Models\Clients\Client;
use App\Models\Clients\DomicileDocumentation;
use App\Models\Clients\DomicileLive;
use App\Models\Clients\DomicileNoLive;

class TraicingController extends Controller {

    public $name;
    public $path;
    public $file;
    public $email;
    public $order;

    public function __construct() {
        $this->middleware("auth");
        $this->name = '';
        $this->path = '';
        $this->file = '';
        $this->email = '';
        $this->order = '';
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
        $features_home = Parameters::where("group", "features_home")->get();
        $status_home = Parameters::where("group", "status_house")->get();
        $service = Parameters::where("group", "service")->get();
        $inventory = Parameters::where("group", "inventory")->get();
        $property = Parameters::where("group", "property")->get();
        $property_type = Parameters::where("group", "property_type")->get();
        $financial_obligation = Parameters::where("group", "financial_obligation")->get();
        $finantial_entities = Parameters::where("group", "finantial_entities")->get();
        $investment_type = Parameters::where("group", "investment_type")->get();
        $cities = Cities::all();

        $cities = Cities::all();
        return view("Clients.Traicing.init", compact("type_document", "cities", "type_study", "questions", "entities", "results", "category", "civil_status", "class_military", "photo"
                        , "eps", "pensiones", "features_home", "status_home", "service", "inventory", "property", "property_type", "financial_obligation", "finantial_entities", "investment_type", "cities"));
    }

    public function create() {
        return "create";
    }

    public function show() {
        return "create";
    }

    public function send(Request $req) {
        $in = $req->all();

        $this->order = DB::table("vorders")->where("id", $in["id"])->first();

        $pdf = \PDF::loadView('Clients.Traicing.pdf', [], (array) $this->order, ['title' => 'Invoice']);
        $pdf->SetProtection(array(), "andiseg", '12345');
        header('Content-Type: application/pdf');

        $this->path = base_path() . '/public/uploads/studies/1/';
        if (!file_exists($this->path)) {
            mkdir($this->path);
            chmod($this->path, 0777);
        }

        $this->file = $this->path . 'pdf_' . $this->order->name . '_' . $this->order->last_name . '.pdf';

        if (!file_exists($this->file)) {
            $pdf->save($this->file);
            chmod($this->file, 0777);
        }

        $input = array();

        $cli = Client::find($this->order->client_id);
        $responsible = Users::find($cli->executive_id);
        $this->email[] = $responsible->email;
        $this->email[] = "jpinedom@hotmail.com";
        $this->email[] = $in["email"];

        Mail::send("Notifications.client", $input, function($msj) {
            $msj->subject("Finalizacion de estudio");
            $msj->to($this->email);
            $msj->attach($this->file, [
                'as' => 'pdf_' . $this->order->name . '_' . $this->order->last_name . '.pdf',
                'mime' => 'application/pdf',
            ]);
        });
        return response()->json(['success' => true]);
    }

    public function preview($id) {
        $sql = "
                select o.id,o.name,o.last_name,o.document,bir.description city_birthday,exp.description city_expedition,o.client,o.position,
                0.type_document,b.passport,b.militar_card,cla.description class_militar,b.district,b.age,civ.description civil_status,
                b.profession,b.professional_card,o.address,o.neighborhood,cit.description city,o.phone,b.phone2,b.email,o.mobil,
                b.driving_licence,cat.description category,pen.description pension,eps.description eps,o.comment
                from vorders o
                LEFT JOIN biografic b ON b.order_id=o.id
                LEFT JOIN cities cit ON cit.id=o.city_id
                LEFT JOIN cities bir ON bir.id=b.city_birth_id
                LEFT JOIN cities exp ON exp.id=b.city_expedition_id
                LEFT JOIN parameters cla ON cla.code=b.classes_id and cla.group='class_military'
                LEFT JOIN parameters civ ON civ.code=b.civil_status_id and civ.group='civil_status'
                LEFT JOIN parameters cat ON cat.code=b.category_id and cat.group='category'
                LEFT JOIN parameters pen ON pen.code=b.pensiones_id and pen.group='pension_id'
                LEFT JOIN parameters eps ON eps.code=b.eps_id and eps.group='eps_id'
                WHERE o.id=" . $id;
        $biog = DB::select($sql);
        $biog = (array) $biog[0];

        $sql = "
            select d.id,es.description type_study,d.obtained_title,d.institution,res.description concept
            from academic_detail d
            JOIN academic a ON a.id=d.academic_id
            JOIN parameters es ON es.code=d.study_id and es.group='type_study'
            JOIN parameters res ON res.code=d.concept_id and res.group='results'
            WHERE a.order_id=" . $id;
        $aca = DB::select($sql);
        $aca = (array) $aca;
        $biog["academic"] = $aca;
        $sql = "
            select d.id,d.description,CASE WHEN si_no=true THEN 'SI' ELSE 'NO' END si_no,q.description question
            from juridic_detail d   
            JOIN juridic j ON j.id=d.juridic_id
            JOIN parameters q ON q.code=d.question_id and q.group='results'
            WHERE j.order_id=" . $id;
        $jur = DB::select($sql);
        $jur = (array) $jur;
        $biog["juridic"] = $jur;

        $sql = "
            select d.id, p.description as entity, d.verification_code, d.certificate, d.anotation,d.img
            from anotation_detail d
            JOIN anotations a ON a.id=d.anotation_id
            JOIN parameters as p ON p.code=d.entity_id and p.group='anotations'
            WHERE a.order_id=" . $id;
        $anotation = DB::select($sql);
        $anotation = (array) $anotation;
        $biog["anotations"] = $anotation;

        $sql = "
            SELECT d.id, p.description as result, d.business, d.activity, d.phone,d.position, d.fentry, d.fdeparture, d.contact, d.concept
            from laboral_detail d
            JOIN laboral l ON l.id=d.laboral_id
            JOIN parameters as p ON p.code=d.result_id and p.group='results'
            WHERE l.order_id=" . $id;
        $laboral = DB::select($sql);
        $laboral = (array) $laboral;
        $biog["laboral"] = $laboral;

        $sql = "
            select d.img,f.description typephoto,d.thumbnail
            from photo_detail  d
            JOIN photo p ON p.id=d.photo_id
            JOIN parameters as f ON f.code=d.typephoto_id and f.group='photo'
            WHERE p.order_id=" . $id;

        $photo = DB::select($sql);
        $photo = (array) $photo;
        $biog["photo"] = $photo;

        $pdf = \PDF::loadView('Clients.Traicing.pdf', [], $biog, ['title' => 'Estudio seguridad']);
//        $pdf->SetProtection(array(), $id, '12345');
        header('Content-Type: application/pdf');
//        return $pdf->download('factura_' . $dep["invoice"] . '_' . $cli["business_name"] . '.pdf');
//        return view("Clients.Traicing.pdf");
        return $pdf->stream('estudio.pdf');
    }

    public function getEmails($id) {
        $order = DB::table("vorders")->where("id", $id)->first();
        $cli = Client::find($order->client_id);
        $responsible = Users::find($cli->executive_id);
        $email[] = $responsible->email;
        return response()->json(['success' => true, "data" => $order, "email" => implode($email, ',')]);
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

            $photo = Photo::where("order_id", $input["order_id"])->first();
            $input["photo_id"] = $photo->id;
            $file = Input::file('photo');

            $image = Image::make(Input::file('photo'));
            $path = public_path() . '/uploads/' . $input["typephoto_id"] . "/";

            File::makeDirectory($path, $mode = 0777, true, true);

            $input["img"] = 'uploads/' . $input["typephoto_id"] . '/' . $file->getClientOriginalName();
            $image->save($path . $file->getClientOriginalName());

            $image->resize(240, 200);
            $input["thumbnail"] = 'uploads/' . $input["typephoto_id"] . '/thumb_' . $file->getClientOriginalName();
            $image->save($path . 'thumb_' . $file->getClientOriginalName());

            unset($input["id"]);
            $result = PhotoDetail::create($input);

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

    public function updateFinish(Request $req, $id) {
        $in = $req->all();

        $academic = Academic::where("order_id", $id)->first();
        $academic->status_id = 3;
        $academic->save();
        $juridic = Juridic::where("order_id", $id)->first();
        $juridic->status_id = 3;
        $juridic->save();
        $Anotations = Anotations::where("order_id", $id)->first();
        $Anotations->status_id = 3;
        $Anotations->save();
        $laboral = Laboral::where("order_id", $id)->first();
        $laboral->status_id = 3;
        $laboral->save();
        $Photo = Photo::where("order_id", $id)->first();
        $Photo->status_id = 3;
        $Photo->save();

        $order = Orders::find($id);
        $order->status_id = 3;
        $order->comment = $in["comment"];
        $order->finalized = date("Y-m-d H:i:s");
        $order->save();

        $data = Orders::find($id);

        return response()->json(["success" => true, "data" => $data]);
    }

    public function editAcademic($id) {
        $header = Academic::where("order_id", $id)->first();
        $detail = $this->getDetailAcademic($header->id);

        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function destroyAcademic($id) {
        $row = AcademicDetail::Find($id);
        $order = $row->academic_id;
        $result = $row->delete();
        if ($result) {
            $detail = $this->getDetailAcademic($order);
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getDetailAcademic($id_academic) {
        return AcademicDetail::select("academic_detail.id", "p.description as study", "academic_detail.obtained_title", "academic_detail.institution", "res.description as concept")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("academic_detail.study_id and p.group='type_study'"))
                        ->join(DB::raw("parameters as res"), "res.code", DB::raw("academic_detail.concept_id and res.group='results'"))
                        ->where("academic_detail.academic_id", $id_academic)
                        ->get();
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

    public function editJuridic($id) {
        $header = Juridic::where("order_id", $id)->first();
        $detail = $this->getDetailJuridic($header->id);
        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function getDetailJuridic($id_juridic) {

        return JuridicDetail::select("juridic_detail.id", "p.description as question", "juridic_detail.si_no", "juridic_detail.description")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("juridic_detail.question_id and p.group='questions'"))
                        ->where("juridic_detail.juridic_id", $id_juridic)
                        ->get();
    }

    public function destroyJuridic($id) {
        $row = JuridicDetail::Find($id);
        $order = $row->juridic_id;
        $result = $row->delete();
        if ($result) {
            $detail = $this->getDetailJuridic($order);
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function storeAnotations(Request $request) {
        if ($request->ajax()) {
            $input = $request->all();
            $input["anotation_id"] = $input["id"];
            unset($input["id"]);

            $file = Input::file('photo');

            $image = Image::make(Input::file('photo'));
            $path = public_path() . '/uploads/anotations/' . $input["anotation_id"] . "/";

            File::makeDirectory($path, $mode = 0777, true, true);

            $input["img"] = 'uploads/anotations/' . $input["anotation_id"] . '/' . $file->getClientOriginalName();
            $image->save($path . $file->getClientOriginalName());
            unset($input["photo"]);

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

    public function destroyAnotations($id) {
        $row = AnotationsDetail::Find($id);
        $order = $row->anotation_id;
        $result = $row->delete();
        if ($result) {
            $detail = $this->getDetailAnotations($order);
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getDetailAnotations($id_anotation) {
        return AnotationsDetail::select("anotation_detail.id", "p.description as entity", "anotation_detail.verification_code", "anotation_detail.certificate", "anotation_detail.anotation", "anotation_detail.img")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("anotation_detail.entity_id and p.group='anotations'"))
                        ->where("anotation_detail.anotation_id", $id_anotation)
                        ->get();
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

    public function editLaboral($id) {
        $header = Laboral::where("order_id", $id)->first();
        $detail = $this->getDetailLaboral($header->id);
        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function editPoligraphy($id) {
        $header = Orders::find($id);
        $resp["order_id"] = $header->id;
        $resp["img"] = $header->img;
        return response()->json(["data" => $resp]);
    }

    public function getDetailLaboral($id_laboral) {
        return LaboralDetail::select("laboral_detail.id", "p.description as result", "laboral_detail.business", "laboral_detail.activity", "laboral_detail.phone"
                                , "laboral_detail.position", "laboral_detail.fentry", "laboral_detail.fdeparture", "laboral_detail.contact", "laboral_detail.concept")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("laboral_detail.result_id and p.group='results'"))
                        ->where("laboral_detail.laboral_id", $id_laboral)
                        ->get();
    }

    public function destroyLaboral($id) {
        $row = LaboralDetail::Find($id);
        $order = $row->laboral_id;
        $result = $row->delete();
        if ($result) {
            $detail = $this->getDetailLaboral($order);
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
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
        $header = Photo::where("order_id", $id)->first();
        $detail = $this->getDetailPhoto($id);
        return response()->json(["header" => $header, "detail" => $detail]);
    }

    public function deletePhoto($id) {
        $photo = PhotoDetail::find($id);
        \File::delete(array($photo->img, $photo->thumbnail));
        $photo->delete();
        return response()->json(["success" => true]);
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

    public function addDomicileDocument(Request $req) {
        $in = $req->all();
        $result = DomicileDocumentation::create($in);

        if ($result) {
            $detail = DomicileDocumentation::where("order_id", $in["order_id"])->get();
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function addDomicileLive(Request $req) {
        $in = $req->all();
        $result = DomicileLive::create($in);

        if ($result) {
            $detail = DomicileLive::where("order_id", $in["order_id"])->get();
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function addDomicileNoLive(Request $req) {
        $in = $req->all();
        $result = DomicileNoLive::create($in);

        if ($result) {
            $detail = DomicileNoLive::where("order_id", $in["order_id"])->get();
            return response()->json(['success' => true, "detail" => $detail]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function getDetailPhoto($order_id) {
        return PhotoDetail::select("photo_detail.id", "p.description as type_photo", "photo_detail.img")
                        ->join("photo", "photo.id", "photo_detail.photo_id")
                        ->join(DB::raw("parameters as p"), "p.code", DB::raw("photo_detail.typephoto_id and p.group='photo'"))
                        ->where("order_id", $order_id)->get();
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

    public function updatePoligraphy(Request $request) {
        $in = $request->all();

        $row = Orders::Find($in["order_id"]);
        $file = Input::file('photo');

//        $image = Image::make(Input::file('photo'));
        $mime = Input::file('photo')->getMimeType();
        $extension = strtolower(Input::file('photo')->getClientOriginalExtension());
        $fileName = uniqid() . '.' . $extension;

        $path = public_path() . '/uploads/polygraphy/' . $in["order_id"] . "/";

        File::makeDirectory($path, $mode = 0777, true, true);

        $input["img"] = 'uploads/polygraphy/' . $in["order_id"] . '/' . $file->getClientOriginalName();

        switch ($mime) {
            case "image/jpeg":
            case "image/png":
            case "image/gif":
            case "application/pdf":
                if (\Request::file('photo')->isValid()) {
                    \Request::file('photo')->move($path, $file->getClientOriginalName());
                    $row->img = $input["img"];
                    $result = $row->save();
                }
                break;
            default:
                return response()->json(['success' => true, "msg" => "Extension file is not valid"]);
        }


//        $image->save($path . $file->getClientOriginalName());


        if ($result) {
            $row = Orders::Find($in["order_id"]);
            return response()->json(['success' => true, "data" => $row]);
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

    public function updateAcademicOk(Request $request, $id) {
        $row = Academic::FindOrFail($id);
        $input = $request->all();
        $input["status_id"] = 3;
        $result = $row->fill($input)->save();

        if ($result) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateJuridicOk(Request $request, $id) {
        $row = Juridic::FindOrFail($id);
        $input = $request->all();
        $input["status_id"] = 3;
        $result = $row->fill($input)->save();

        if ($result) {
            return response()->json(['success' => true, "header" => $result]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateAnotationsOk(Request $request, $id) {
        $row = Anotations::FindOrFail($id);
        $input = $request->all();
        $input["status_id"] = 3;
        $result = $row->fill($input)->save();

        if ($result) {
            return response()->json(['success' => true, "header" => $result]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateLaboralOk(Request $request, $id) {
        $row = Laboral::FindOrFail($id);
        $input = $request->all();
        $input["status_id"] = 3;
        $result = $row->fill($input)->save();

        if ($result) {
            return response()->json(['success' => true, "header" => $result]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updatePhotoOk(Request $request, $id) {
        $row = Photo::FindOrFail($id);
        $input = $request->all();
        $input["status_id"] = 3;
        $result = $row->fill($input)->save();

        if ($result) {
            return response()->json(['success' => true, "header" => $result]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function updateDomicile(Request $request, $id) {
        $row = Domicile::FindOrFail($id);

        $input = $request->all();
        $input["quantity_child"] = ($input["quantity_child"] == "") ? null : $input["quantity_child"];
        $input["time_married"] = ($input["time_married"] == "") ? null : $input["time_married"];
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
