function Traicing() {
    var table, idorder;
    this.init = function () {
        $("#btnNew").click(this.new);
        $("#btnSave").click(this.save);

        $("#btnSaveBiografic").click(this.saveBiografic);
        $("#btnOkBiografic").click(this.saveBiograficOk);

        $("#btnSaveAcademic").click(this.saveAcademic);
        $("#btnOkAcademic").click(this.saveAcademicOk);
        $("#tabAcademic").click(this.loadAcademic)

        $("#tabJuridic").click(this.loadJuridic)
        $("#btnOkJuridic").click(this.saveJuridicOk);
        $("#btnSaveJurific").click(this.saveJuridic);

        $("#tabAnotations").click(this.loadAnotations)
        $("#btnSaveAnotations").click(this.saveAnotations);
        $("#btnOkAnotations").click(this.saveAnotationsOk);

        $("#tabLaboral").click(this.loadLaboral)
        $("#btnSaveLaboral").click(this.saveLaboral);
        $("#btnOkLaboral").click(this.saveLaboralOk);

        $("#tabDomicile").click(this.loadDomicile)
        $("#btnSaveDomicile").click(this.saveDomicile);

        $("#tabPhoto").click(this.loadPhoto)
        $("#btnSavePhoto").click(this.savePhoto);
        $("#btnOkPhoto").click(this.savePhotoOk);
        $("#finish").click(this.finish)
        table = obj.table();
    }

    this.new = function () {
        $(".input-traicing").cleanFields();
    }
    this.finish = function () {
        var token = $("input[name=_token]").val();
        $.ajax({
            url: 'traicing/finish/' + $("#frmBiografic #order_id").val(),
            method: "PUT",
            dataType: 'JSON',
            headers: {'X-CSRF-TOKEN': token},
            success: function (data) {
                if (data.success == true) {
                    toastr.success("Estudio Finalizado!");
                    table.ajax.reload();
                }
            }
        })
    }

    this.loadPhoto = function () {
        $.ajax({
            url: 'traicing/photo/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                if (data.header.status_id == 3) {
                    $(".input-photo").setFields({data: data.header, disabled: true});
                } else {
                    $(".input-photo").setFields({data: data.header});

                }

                obj.tablePhoto(data.detail)
            }
        })
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

    this.loadAcademic = function () {
        $.ajax({
            url: 'traicing/academic/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                if (data.header.status_id == 3) {
                    $(".input-academic").setFields({data: data.header, disabled: true});
                } else {
                    $(".input-academic").setFields({data: data.header});

                }

                obj.tableAcademic(data.detail)
            }
        })
    }

    this.tableAcademic = function (data) {
        var html = "";
        $("#tblAcademic tbody").empty();
        $.each(data, function (i, val) {
            html += "<tr><td>" + val.study + "</td><td>" + val.obtained_title + "</td><td>" + val.institution + "</td><td>" + val.concept;
            html += '</td><td><span style="cursor:pointer" class="glyphicon glyphicon-remove" aria-hidden="true" onclick=obj.deleteAcademic(' + val.id + ')></span></td></tr>';
        })
        $("#tblAcademic tbody").html(html);
    }

    this.deleteAcademic = function (id) {
        var token = $("input[name=_token]").val();
        var param = {};
        $.ajax({
            url: 'traicing/academic/' + id,
            method: "DELETE",
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    obj.tableAcademic(data.detail);
                }
            }
        })
    }

    this.tablePhoto = function (data) {
        var html = "";
        $("#listPhotos").empty();
        var cont = 0;
        html += '<div class="row">';
        $.each(data, function (i, val) {

            html += '<div class="col-lg-4" id="tumb_' + val.id + '"><div class="thumbnail"><img src="' + val.img + '" alt=""><div class="caption"><h3>' + val.type_photo + '</h3>'
            html += '<p><a href="#" class="btn btn-danger" role="button" onclick=obj.deleteImg(' + val.id + ')>Borrar</a></p></div></div></div>';
            cont++;

            if (cont == 3) {
                html += '</div><div class="row">'
                cont = 0;
            }
        })

        $("#listPhotos").html(html);
    }

    this.deleteImg = function (id) {

        toastr.remove();
        if (confirm("Deseas eliminar")) {
            var token = $("input[name=_token]").val();
            var url = "/traicing/photo/" + id;
            $.ajax({
                url: url,
                headers: {'X-CSRF-TOKEN': token},
                method: "DELETE",
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        $("#tumb_" + id).remove();
                        toastr.success("Ok");
                    }
                }, error: function (err) {
                    toastr.error("No se puede borrra Este registro");
                }
            })
        }
    }

    this.tableLaboral = function (data) {
        var html = "";
        $("#tblLaboral tbody").empty();
        $.each(data, function (i, val) {
            html += "<tr><td>" + val.result + "</td><td>" + val.activity + "</td><td>" + val.phone + "</td><td>" + val.position + "</td>";
            html += "<td>" + val.fentry + "</td><td>" + val.fdeparture + "</td><td>" + val.contact + "</td><td>" + val.concept + "</td><td>" + val.result + "</td>";
            html += '<td><span style="cursor:pointer" class="glyphicon glyphicon-remove" aria-hidden="true" onclick=obj.deleteLaboral(' + val.id + ')></span></td></tr>';
        })
        $("#tblLaboral tbody").html(html);
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

    this.loadLaboral = function () {
        $.ajax({
            url: 'traicing/laboral/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                if (data.header.status_id == 3) {
                    $(".input-laboral").setFields({data: data.header, disabled: true});
                } else {
                    $(".input-laboral").setFields({data: data.header});
                }

                obj.tableLaboral(data.detail)
            }
        })
    }

    this.deleteLaboral = function (id) {
        var token = $("input[name=_token]").val();
        var param = {};
        $.ajax({
            url: 'traicing/laboral/' + id,
            method: "DELETE",
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    obj.tableLaboral(data.detail);
                }
            }
        })

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

    this.loadAnotations = function () {
        $.ajax({
            url: 'traicing/anotations/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                if (data.header.status_id == 3) {
                    $(".input-anotations").setFields({data: data.header, disabled: true});
                } else {
                    $(".input-anotations").setFields({data: data.header});
                }
                obj.tableAnotations(data.detail)
            }
        })
    }


    this.tableAnotations = function (data) {
        var html = "";
        $("#tblAnotations tbody").empty();
        $.each(data, function (i, val) {
            html += "<tr><td>" + val.entity + "</td><td>" + val.verification_code + "</td><td>" + val.certificate + "</td><td>";
            html += val.anotation + '</td><td><span style="cursor:pointer" class="glyphicon glyphicon-remove" aria-hidden="true" onclick=obj.deleteAnotations(' + val.id + ')></span></td></tr>';
        })
        $("#tblAnotations tbody").html(html);
    }

    this.deleteAnotations = function (id) {
        var token = $("input[name=_token]").val();
        var param = {};
        $.ajax({
            url: 'traicing/anotations/' + id,
            method: "DELETE",
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    obj.tableAnotations(data.detail);
                }
            }
        })

    }


    this.loadJuridic = function () {
        $.ajax({
            url: 'traicing/juridic/' + $("#frmBiografic #order_id").val(),
            method: "GET",
            dataType: 'JSON',
            success: function (data) {
                if (data.header.status_id == 3) {
                    $(".input-juridic").setFields({data: data.header, disabled: true});
                } else {
                    $(".input-juridic").setFields({data: data.header});
                }

                obj.tableJuridic(data.detail)
            }
        })
    }


    this.tableJuridic = function (data) {
        var html = "";
        $("#tblJuridic tbody").empty();
        $.each(data, function (i, val) {
            val.si_no = (val.si_no == true) ? 'SI' : 'NO';
            html += "<tr><td>" + val.question + "</td><td>" + val.si_no + "</td><td>" + val.description;
            html += '</td><td><span style="cursor:pointer" class="glyphicon glyphicon-remove" aria-hidden="true" onclick=obj.deleteJuridic(' + val.id + ')></span></td></td></tr>';
        })
        $("#tblJuridic tbody").html(html);
    }


    this.deleteJuridic = function (id) {
        var token = $("input[name=_token]").val();
        var param = {};
        $.ajax({
            url: 'traicing/juridic/' + id,
            method: "DELETE",
            headers: {'X-CSRF-TOKEN': token},
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    obj.tableJuridic(data.detail);
                }
            }
        })
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

    this.savePhoto = function () {
        toastr.remove();
        var url = "";
        var msg = '';
        $("#frmPhoto #order_id").val($("#frmBiografic #order_id").val());
        var validate = $(".input-photo").validate();

        if (validate.length == 0) {
            if ($("#frmPhoto #photo").val() != '') {
                method = 'POST';
                url = "traicing/photo";
                msg = "Add Record";

                var token = $("input[name=_token]").val();

                var formData = new FormData($("#frmPhoto")[0]);

                $.ajax({
                    url: url,
                    method: 'POST',
                    data: formData,
                    dataType: 'JSON',
                    processData: false,
                    cache: false,
                    contentType: false,
                    success: function (data) {

                        obj.tablePhoto(data.detail);
                    }
                })
            } else {
                toastr.error("Archivo necesario!");
            }
        } else {
            toastr.error("Campos Obligatorios!");
        }
    }


    this.saveBiografic = function () {
        toastr.remove();
        var frm = $("#frmBiografic");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmBiografic #id").val();
        var msg = '';

        var validate = $(".input-biografic").validate();

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

    this.savePhotoOk = function () {

        toastr.remove();
        var frm = $("#frmPhoto");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmPhoto #id").val();
        var msg = '';

        method = 'PUT';
        url = "traicing/photoOk/" + id;
        msg = "Datos Cerrados";

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $(".input-photo").setFields({data: data, disabled: true});
                table.ajax.reload();
                toastr.success(msg);
            }
        })
    }

    this.saveLaboralOk = function () {

        toastr.remove();
        var frm = $("#frmLaboral");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmLaboral #id").val();
        var msg = '';

        method = 'PUT';
        url = "traicing/laboralOk/" + id;
        msg = "Datos Cerrados";

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $(".input-laboral").setFields({data: data, disabled: true});
                table.ajax.reload();
                toastr.success(msg);
            }
        })
    }

    this.saveAnotationsOk = function () {

        toastr.remove();
        var frm = $("#frmAnotations");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmAnotations #id").val();
        var msg = '';

        method = 'PUT';
        url = "traicing/anotationsOk/" + id;
        msg = "Datos Cerrados";

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $(".input-anotatios").setFields({data: data, disabled: true});
                table.ajax.reload();
                toastr.success(msg);
            }
        })
    }

    this.saveJuridicOk = function () {

        toastr.remove();
        var frm = $("#frmJuridic");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmJuridic #id").val();
        var msg = '';

        method = 'PUT';
        url = "traicing/juridicOk/" + id;
        msg = "Datos Cerrados";

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    $(".input-juridic").setFields({data: data, disabled: true});
                    table.ajax.reload();
                    toastr.success(msg);
                }
            }
        })
    }

    this.saveAcademicOk = function () {
        toastr.remove();
        var frm = $("#frmAcademic");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmAcademic #id").val();
        var msg = '';

        method = 'PUT';
        url = "traicing/academicOk/" + id;
        msg = "Datos Cerrados";

        $.ajax({
            url: url,
            method: method,
            data: data,
            dataType: 'JSON',
            success: function (data) {
                if (data.success == true) {
                    $(".input-academic").setFields({data: data, disabled: true});
                    table.ajax.reload();
                    toastr.success(msg);
                }
            }
        })
    }

    this.saveBiograficOk = function () {
        toastr.remove();
        var frm = $("#frmBiografic");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frmBiografic #id").val();
        var msg = '';

        var validate = $(".input-biografic").validate();

        if (validate.length == 0) {
            method = 'PUT';
            url = "traicing/biograficOk/" + id;
            msg = "Datos Cerrados";

            $.ajax({
                url: url,
                method: method,
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        $(".input-biografic").setFields({data: data, disabled: true});
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
            ajax: "/api/listTraicing",
            columns: [
                {data: "id"},
                {data: "name"},
                {data: "last_name"},
                {data: "document"},
                {data: "phone"},
                {data: "mobil"},
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
                ,
                {
                    targets: [11],
                    searchable: false,
                    mData: null,
                    mRender: function (data, type, full) {
                        var html = "";
                        if (data.status_id == 3) {
                            html = '<button class="btn btn-success btn-xs" onclick="obj.associate(' + full.id + ')"><span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>';
                            html += '&nbsp;&nbsp;<button class="btn btn-info btn-xs" onclick="obj.preview(' + full.id + ')"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></button>';
                        }
                        return html;
                    }
                }
            ],

        });
    }

    this.preview = function (id) {

        window.open("/traicing/preview/" + id);

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
                if (data.status_id == 3) {
                    $("#btnOkBiografic,#btnSaveBiografic").attr("disabled", true);
                    $(".input-biografic").setFields({data: data, disabled: true});
                    $("#finish").addClass("hidden");
                } else {
                    $("#btnOkBiografic,#btnSaveBiografic").attr("disabled", false);
                    $(".input-biografic").setFields({data: data});
                    $("#finish").removeClass("hidden");
                }
            }
        })
    }

}

var obj = new Traicing();
obj.init();