{!!Form::open(["id"=>"frmFile","file"=>true])!!}
<div class="row">
    <div class="col-lg-1">Archivo</div>
    <div class="col-lg-1">
        <input id="file_excel" name="file_excel" type="file">
    </div>
</div>
<div class="row">
    <div class="col-lg-1">
        <button class="btn btn-success" id="btnUpload" type="button">Subir</button>

    </div>
</div>
{!!Form::close()!!}

<div class="row">
    <div class="col-lg-4">
        <table class="table table-bordered" id="tblUpload">
            <thead>
                <tr>
                    <th>Codigo</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</div>