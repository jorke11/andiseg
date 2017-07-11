function Client() {
    var table;
    this.init = function () {
        $("#btnNew").click(this.new);
        $("#btnSave").click(this.save);

        $("#tabManagement").click(function () {
            $(".input-clients").cleanFields({disabled: true});
            $("#btnSave").attr("disabled", true);
        })

        $("#document").blur(this.verification)
        table = obj.table();

        $("#btnUpload_code").click(this.uploadExcelCode)
    }


    this.uploadExcelCode = function () {
        console.log("")
        $("#frmFileCode #client_id").val($("#frm #id").val());
        var formData = new FormData($("#frmFileCode")[0]);

        $.ajax({
            url: '/clients/uploadExcelCode',
            method: 'POST',
            data: formData,
            dataType: 'JSON',
            processData: false,
            cache: false,
            contentType: false,
            success: function (data) {
                console.log(data);
                obj.setDetailExcel(data.data)
            }
        })

    }

    this.verification = function () {
        $("#verification").val(obj.calcularDigitoVerificacion(this.value));
    }

    this.calcularDigitoVerificacion = function (myNit) {
        var vpri,
                x,
                y,
                z;

        // Se limpia el Nit
        myNit = myNit.replace(/\s/g, ""); // Espacios
        myNit = myNit.replace(/,/g, ""); // Comas
        myNit = myNit.replace(/\./g, ""); // Puntos
        myNit = myNit.replace(/-/g, ""); // Guiones

        // Se valida el nit
        if (isNaN(myNit)) {
            toastr.error("El nit/cédula '" + myNit + "' no es válido(a).")
            return "";
        }
        ;

        // Procedimiento
        vpri = new Array(16);
        z = myNit.length;

        vpri[1] = 3;
        vpri[2] = 7;
        vpri[3] = 13;
        vpri[4] = 17;
        vpri[5] = 19;
        vpri[6] = 23;
        vpri[7] = 29;
        vpri[8] = 37;
        vpri[9] = 41;
        vpri[10] = 43;
        vpri[11] = 47;
        vpri[12] = 53;
        vpri[13] = 59;
        vpri[14] = 67;
        vpri[15] = 71;

        x = 0;
        y = 0;
        for (var i = 0; i < z; i++) {
            y = (myNit.substr(i, 1));
            // console.log ( y + "x" + vpri[z-i] + ":" ) ;

            x += (y * vpri [z - i]);
            // console.log ( x ) ;    
        }

        y = x % 11;
        // console.log ( y ) ;

        return (y > 1) ? 11 - y : y;
    }

    this.new = function () {
        $(".input-clients").cleanFields();
        $("#btnSave").attr("disabled", false);
    }

    this.save = function () {
        toastr.remove();
        var frm = $("#frm");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frm #id").val();
        var msg = '';
        var token = $("input[name=_token]").val();

        var validate = $(".input-clients").validate();

        if (validate.length == 0) {
            if (id == '') {
                method = 'POST';
                url = "clients";
                msg = "Created Record";
            } else {
                method = 'PUT';
                url = "clients/" + id;
                msg = "Edited Record";
            }

            $.ajax({
                url: url,
                method: method,
                headers: {'X-CSRF-TOKEN': token},
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        $("#modalNew").modal("hide");
                        $(".input-clients").setFields({data: data});
                        table.ajax.reload();
                        toastr.success(msg);
                    }
                }, error: function (xhr, ajaxOptions, thrownError) {
                    toastr.error(xhr.responseJSON.msg);
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.showModal = function (id) {
        var frm = $("#frmEdit");
        var data = frm.serialize();
        var url = "/clients/" + id + "/edit";
        $("#modalNew").modal("show");
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $(".input-clients").setFields({data: data});
            }
        })
    }

    this.delete = function (id) {
        toastr.remove();
        if (confirm("Deseas eliminar")) {
            var token = $("input[name=_token]").val();
            var url = "/clients/" + id;
            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': token},
                method: "DELETE",
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        table.ajax.reload();
                        toastr.warning("Ok");
                    }
                }, error: function (err) {
                    toastr.error("No se puede borrra Este registro");
                }
            })
        }
    }

    this.table = function () {
        return $('#tbl').DataTable({
            processing: true,
            serverSide: true,
            ajax: "/api/listClients",
            columns: [
                {data: "id"},
                {data: "business_name"},
                {data: "type_document"},
                {data: "document"},
                {data: "verification"},
                {data: "person"},
                {data: "regimen"},
                {data: "department"},
                {data: "city"},
                {data: "address"},
                {data: "mobil"},
                {data: "status_id"},
            ],

            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
                    mRender: function (data, type, full) {
                        return '<a href="#" onclick="obj.show(' + full.id + ')">' + data + '</a>';
                    }
                }
            ],
        });
    }

    this.show = function (id) {
        var frm = $("#frm");
        var data = frm.serialize();
        var url = "/clients/" + id + "/edit";

        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $('#myTabs a[href="#manager"]').tab('show');
                $(".input-clients").setFields({data: data});
            }
        })
    }

}

var obj = new Client();
obj.init();