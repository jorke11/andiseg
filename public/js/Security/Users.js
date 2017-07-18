function Users() {
    var table;
    this.init = function () {
        $("#btnNew").click(this.new);
        $("#btnSave").click(this.save);

        $("#tabManagement").click(function () {
            $(".input-users").cleanFields({disabled: true});
            $("#btnSave").attr("disabled", true);
        })
        table = obj.table();
    }

    this.new = function () {
        $(".input-users").cleanFields();
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
        var validate = $(".input-users").validate();

        if (validate.length == 0) {
            if (id == '') {
                method = 'POST';
                url = "users";
                msg = "Created Record";
            } else {
                method = 'PUT';
                url = "users/" + id;
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
                        $(".input-users").setFields({data: data});
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
        var url = "/users/" + id + "/edit";
        $("#modalNew").modal("show");
        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $(".input-users").setFields({data: data});
            }
        })
    }

    this.delete = function (id) {
        toastr.remove();
        if (confirm("Deseas eliminar")) {
            var token = $("input[name=_token]").val();
            var url = "/users/" + id;
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
            ajax: "/api/listUsers",
            columns: [
                {data: "id"},
                {data: "name"},
                {data: "last_name"},
                {data: "email"},
                {data: "role"},
                {data: "client"},
            ],

            aoColumnDefs: [
                {
                    aTargets: [0, 1, 2],
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
        var url = "/users/" + id + "/edit";

        $.ajax({
            url: url,
            method: "GET",
            data: data,
            dataType: 'JSON',
            success: function (data) {
                $('#myTabs a[href="#manager"]').tab('show');
                $(".input-users").setFields({data: data});
            }
        })
    }

}

var obj = new Users();
obj.init();