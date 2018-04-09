$(document).ready(function () {
    $("input").change(function () {
        $("input").removeClass("err-input");
        $("#help-box").addClass("hide");
    });
    $('#search_person').submit(function () {
        if ($("input[name='name']").val() !== '' || $("input[name='opd']").val() !== '' || $("input[name='phone']").val() !== '') {
            var name = $("input[name='name']").val();
            var opd = $("input[name='opd']").val();
            var phone = $("input[name='phone']").val();
            $.ajax({
                type: "POST",
                data: "name=" + name + "&opd=" + opd + "&phone=" + phone,
                url: "php/search_customer.php",
                success: function (data) {
                    if (data === '') {
                        var text = "<h2>ไม่พบข้อมูลคนไข้</h2>";
                        $("#notFound").children().remove();
                        $("#customer").children().remove();
                        $("#notFound").append(text);

                    } else {
                        $("#notFound").children().remove();
                        $("#customer").children().remove();
                        $("#customer").append(data);
                    }
                }
            });
        } else {
            $("#help-box").removeClass("hide");
            if ($("input[name='name']").val() === '') {
                $("input[name='name']").addClass('err-input');
            }
            if ($("input[name='opd']").val() === '') {
                $("input[name='opd']").addClass('err-input');
            }
            if ($("input[name='phone']").val() === '') {
                $("input[name='phone']").addClass('err-input');
            }
        }
        return false;
    });
    $('#saveCustomer').click(function (e) {

        e.preventDefault();
        var opd = $("#opd").val();
        var name = $("#name").val();
        var sname = $("#sname").val();
        var tel = $("#tel").val();
        var add = $("#add").val();
        var detail = $("#detail").val();
        if (opd == "" || opd == null) {
            $("#opd").css("border", "2px dashed #bf6464");
        } else {
            $("#opd").css("border", "2px solid #dddddd");
        }
        if (name == "" || name == null) {
            $("#name").css("border", "2px dashed #bf6464");
        } else {
            $("#name").css("border", "2px solid #dddddd");
        }
        if (sname == "" || sname == null) {
            $("#sname").css("border", "2px dashed #bf6464");
        } else {
            $("#sname").css("border", "2px solid #dddddd");
        }
        if (add == "" || add == null) {
            $("#add").css("border", "2px dashed #bf6464");
        } else {
            $("#add").css("border", "2px solid #dddddd");
        }
        if (tel == "" || tel == null) {
            $("#tel").css("border", "2px dashed #bf6464");
        } else {
            $("#tel").css("border", "2px solid #dddddd");
        }
        if (detail == "" || detail == null) {
            $("#detail").css("border", "2px dashed #bf6464");
        } else {
            $("#detail").css("border", "2px solid #dddddd");
        }
        if (opd !== "" && name !== "" && sname !== "" && add !== "" && tel !== "" && detail !== "") {
            $.ajax({
                url: 'php/update_customer.php',
                data: {
                    'opd': opd,
                    'name': name,
                    'sname': sname,
                    'add': add,
                    'tel': tel,
                    'detail': detail
                },
                type: "post",
                success: function (data) {
                    if(data === 'pass'){
                        $("#ModalEdit").toggle();
                        $("#ModalEditSuccess").modal('show');
                    }
                }
            });
            setTimeout(function(){
                window.location.href = 'oldList.php';
            }, 1500);
        }
    });
});
$(document).delegate("td[data-id]", "click", function () {
    $("#modal-body").children().remove();
    var cus_id = $(this).attr('data-id');
    $.ajax({
        type: "POST",
        data: {
            id: cus_id
        },
        url: "php/edit_customer_ajax.php",
        success: function (data) {
            $("#modal-body").append(data);
        }
    });
});