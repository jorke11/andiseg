function Client() {
    var table;
    this.init = function () {
        $("#btnNew").click(this.new);
        $("#btnSave").click(this.save);
        table = obj.table();
    }

    this.new = function () {
        $(".input-clients").cleanFields();
    }

    this.save = function () {
        toastr.remove();
        var frm = $("#frm");
        var data = frm.serialize();
        var url = "", method = "";
        var id = $("#frm #id").val();
        var msg = '';

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
                data: data,
                dataType: 'JSON',
                success: function (data) {
                    if (data.success == true) {
                        $("#modalNew").modal("hide");
                        $(".input-clients").setFields({data: data});
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