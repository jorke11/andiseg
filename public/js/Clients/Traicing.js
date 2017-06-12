function Traicing() {
    var table, idorder;
    this.init = function () {
        $("#btnNew").click(this.new);
        $("#btnSave").click(this.save);
        $("#btnSaveBiografic").click(this.saveBiografic);

        $("#btnSaveAcademic").click(this.saveAcademic);
        $("#tabAcademic").click(this.loadAcademic)

        $("#tabJuridic").click(this.loadJuridic)
        $("#btnSaveJurific").click(this.saveJuridic);

        $("#tabAnotations").click(this.loadAnotations)
        $("#btnSaveAnotations").click(this.saveAnotations);

        $("#tabLaboral").click(this.loadLaboral)
        $("#btnSaveLoboral").click(this.saveLaboral);

        $("#tabDomicile").click(this.loadDomicile)
        $("#btnSaveDomicile").click(this.saveDomicile);
        table = obj.table();
    }

    this.new = function () {
        $(".input-traicing").cleanFields();
    }

    this.loadDomicile = function () {
        $.ajax({
            url: 'traicing/domicile/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                $(".input-domicile").setFields({data: data.header});
                obj.tableAnotations(data.detail)
            }
        })
    }

    this.loadAnotations = function () {
        $.ajax({
            url: 'traicing/anotations/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                $(".input-anotations").setFields({data: data.header});
                obj.tableAnotations(data.detail)
            }
        })
    }

    this.loadLaboral = function () {
        $.ajax({
            url: 'traicing/laboral/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                $(".input-laboral").setFields({data: data.header});
                obj.tableLaboral(data.detail)
            }
        })
    }

    this.loadJuridic = function () {
        $.ajax({
            url: 'traicing/juridic/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                $(".input-juridic").setFields({data: data.header});
                obj.tableJuridic(data.detail)
            }
        })
    }

    this.loadAcademic = function () {
        $.ajax({
            url: 'traicing/academic/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                $(".input-academic").setFields({data: data.header});
                obj.tableAcademic(data.detail)
            }
        })
    }

    this.tableLaboral = function (data) {
        var html = "";
        $("#tblLaboral tbody").empty();
        $.each(data, function (i, val) {
            html += "<tr><td>" + val.result + "</td><td>" + val.activity + "</td><td>" + val.phone + "</td><td>" + val.position + "</td>";
            html += "<td>" + val.fentry + "</td><td>" + val.fdeparture + "</td><td>" + val.contact + "</td><td>" + val.concept + "</td><td>" + val.result + "</td></tr>";
        })
        $("#tblLaboral tbody").html(html);
    }

    this.tableAnotations = function (data) {
        var html = "";
        $("#tblAnotations tbody").empty();
        $.each(data, function (i, val) {
            html += "<tr><td>" + val.entity + "</td><td>" + val.verification_code + "</td><td>" + val.certificate + "</td><td>" + val.anotation + "</td></tr>";
        })
        $("#tblAnotations tbody").html(html);
    }

    this.tableAcademic = function (data) {
        var html = "";
        $("#tblAcademic tbody").empty();
        $.each(data, function (i, val) {
            html += "<tr><td>" + val.study + "</td><td>" + val.obtained_title + "</td><td>" + val.institution + "</td><td>" + val.concept + "</td></tr>";
        })
        $("#tblAcademic tbody").html(html);
    }

    this.tableJuridic = function (data) {
        var html = "";
        $("#tblJuridic tbody").empty();
        $.each(data, function (i, val) {
            val.si_no = (val.si_no == true) ? 'SI' : 'NO';
            html += "<tr><td>" + val.question + "</td><td>" + val.si_no + "</td><td>" + val.description + "</td></tr>";
        })
        $("#tblJuridic tbody").html(html);
    }

    this.saveLaboral = function () {
        toastr.remove();
        var frm = $("#frmLaboral");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmLaboral #id").val();
        var msg = '';

        var validate = $(".input-laboral").validate();

        if (validate.length == 0) {
            method = 'PUT';
            url = "traicing/laboral/";
            msg = "Add Record";

            var token = $("input[name=_token]").val();

            $.ajax({
                url: url,
                method: "POST",
                headers: {'X-CSRF-TOKEN': token},
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        obj.tableLaboral(data.detail);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.saveAnotations = function () {
        toastr.remove();
        var frm = $("#frmAnotations");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmAnotations #id").val();
        var msg = '';

        var validate = $(".input-anotations").validate();

        if (validate.length == 0) {
            method = 'PUT';
            url = "traicing/anotations/";
            msg = "Add Record";

            var token = $("input[name=_token]").val();

            $.ajax({
                url: url,
                method: "POST",
                headers: {'X-CSRF-TOKEN': token},
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        obj.tableAnotations(data.detail);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.saveJuridic = function () {
        toastr.remove();
        var frm = $("#frmJuridic");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmAcademic #id").val();
        var msg = '';

        var validate = $(".input-juridic").validate();

        if (validate.length == 0) {
            method = 'PUT';
            url = "traicing/juridic/";
            msg = "Add Record";

            var token = $("input[name=_token]").val();

            $.ajax({
                url: url,
                method: "POST",
                headers: {'X-CSRF-TOKEN': token},
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        obj.tableJuridic(data.detail);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.saveAcademic = function () {
        toastr.remove();
        var frm = $("#frmAcademic");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmAcademic #id").val();
        var msg = '';

        var validate = $(".input-academic").validate();

        if (validate.length == 0) {
            url = "traicing/academic/";
            msg = "Add Record";

            var token = $("input[name=_token]").val();

            $.ajax({
                url: url,
                method: "POST",
                headers: {'X-CSRF-TOKEN': token},
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        obj.tableAcademic(data.detail);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.saveBiografic = function () {
        toastr.remove();
        var frm = $("#frmBiografic");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmBiografic #id").val();
        var msg = '';

        var validate = $(".input-traicing").validate();

        if (validate.length == 0) {
            method = 'PUT';
            url = "traicing/biografic/" + id;
            msg = "Edited Record";

            $.ajax({
                url: url,
                method: method,
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        $(".input-biografic").setFields({data: data});
                        table.ajax.reload();
                        toastr.success(msg);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }
    
    this.saveDomicile = function () {
        toastr.remove();
        var frm = $("#frmDomicile");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmDomicile #id").val();
        var msg = '';

        var validate = $(".input-domicile").validate();

        if (validate.length == 0) {
            method = 'PUT';
            url = "traicing/domicile/" + id;
            msg = "Edited Record";

            $.ajax({
                url: url,
                method: method,
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        toastr.success(msg);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.save = function () {
        toastr.remove();
        var frm = $("#frm");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frm #id").val();
        var msg = '';

        var validate = $(".input-traicing").validate();

        if (validate.length == 0) {
            if (id == '') {
                method = 'POST';
                url = "traicing";
                msg = "Created Record";
            } else {
                method = 'PUT';
                url = "traicing/" + id;
                msg = "Edited Record";
            }

            $.ajax({
                url: url,
                method: method,
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        $("#modalNew").modal("hide");
                        $(".input-traicing").setFields({data: data});
                        table.ajax.reload();
                        toastr.success(msg);
                    }
                }
            })
        } else {
            toastr.error("Fields Required!");
        }
    }

    this.showModal = function (id) {
        var frm = $("#frmEdit");
        var data = frm.serialize();
        var url = "/traicing/" + id + "/edit";
        $("#modalNew").modal("show");
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $(".input-biografic").setFields({data: data});
            }
        })
    }

    this.delete = function (id) {
        toastr.remove();
        if (confirm("Deseas eliminar")) {
            var token = $("input[name=_token]").val();
            var url = "/traicing/" + id;
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
            ajax: "/api/listOrders",
            columns: [
                {data: "id"},
                {data: "name"},
                {data: "last_name"},
                {data: "document"},
                {data: "phone"},
                {data: "movil"},
                {data: "address"},
                {data: "type_document"},
                {data: "city"},
                {data: "department"},
                {data: "status"},
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
        var url = "/traicing/" + id + "/edit";

        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $('#myTabs a[href="#manager"]').tab('show');
                $(".input-biografic").setFields({data: data});
            }
        })
    }

}

var obj = new Traicing();
obj.init();