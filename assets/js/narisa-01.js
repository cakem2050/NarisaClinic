/*globals $:false */
$(document).ready(function() {
    "use strict";

    $('#saveCustomer').click(function (e) {

        e.preventDefault();
        var opd = $("#opd").val();
        var name = $("#name").val();
        var sname = $("#sname").val();
        var tel = $("#tel").val();
        var add = $("#add").val();
        var detail = $("#detail").val();
        if(opd == "" || opd == null){
            $("#opd").css("border","2px dashed #bf6464");
        }else{
            $("#opd").css("border","2px solid #dddddd");
        }
        if(name == "" || name == null){
            $("#name").css("border","2px dashed #bf6464");
        }else{
            $("#name").css("border","2px solid #dddddd");
        }
        if(sname == "" || sname == null){
            $("#sname").css("border","2px dashed #bf6464");
        }else{
            $("#sname").css("border","2px solid #dddddd");
        }
        if(add == "" || add == null){
            $("#add").css("border","2px dashed #bf6464");
        }else{
            $("#add").css("border","2px solid #dddddd");
        }
        if(tel == "" || tel == null){
            $("#tel").css("border","2px dashed #bf6464");
        }else{
            $("#tel").css("border","2px solid #dddddd");
        }
        if(detail == "" || detail == null){
            $("#detail").css("border","2px dashed #bf6464");
        }else{
            $("#detail").css("border","2px solid #dddddd");
        }


        if(opd !== "" && opd !== null){
            $.ajax({
                url: '../narisaclinic/php/validatePHP/checkCustomer.php',
                data: {
                    'opd': opd
                },
                type: "post",
                success: function (data) {
                    if(data) {
                        // console.log(data);
                        if (data == 1) {
                            //$("#opdc").css("display", "block");
                            $("#opd").css("border","2px dashed #bf6464");
                            alert("รหัส opd นี้ถูกใช้งานแล้ว !");
                        }else{
                            if(opd !== "" && name !== "" && sname !== "" && add !== "" && tel !== "" && detail !== "" ){
                                $.ajax({
                                    url: '../narisaclinic/php/insertCustomer.php',
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
                                        if (data) {
                                            window.location.replace("../narisaclinic/_blank.php");
                                        }
                                    }
                                });
                            }
                        }

                    }
                }
            });
        }






    });
});