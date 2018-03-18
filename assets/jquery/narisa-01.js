/*globals $:false */
$(document).ready(function() {
    "use strict";
    //alert("dsfdsfds");


    //validate save customer
    $('#saveCustomer').click(function (e) {

        e.preventDefault();
        var opd = $("#opd").val();
        //alert(opd);
        $.ajax({
            url: '../narisaclinic/validatePHP/checkCustomer.php',
            data: {
                'opd': opd
            },
            type: "post",
            success: function (data) {
                if(data){
                    if(data == 1){
                        //$(div).find('#opd').html("<span style='color:#59ba41;'>รหัส opd นี้พร้อมใช้งาน</span>").end().appendTo($('body'));
                        $("#opd").css("border","2px solid #dddddd");
                        alert(data);
                    }else{
                        $("#opd").css("border","2px dashed #bf6464");
                        alert(data);
                    }
                }
            }
        });
    });
});