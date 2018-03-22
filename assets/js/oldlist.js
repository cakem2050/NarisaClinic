$(document).ready(function () {
    $("input").change(function () {
        $("input").removeClass("err-input");
        $("#help-box").addClass("hide");
    });
   $('#search_person').submit(function () {
       if($("input[name='name']").val() !== '' || $("input[name='opd']").val() !== '' || $("input[name='phone']").val() !== ''){
           var name = $("input[name='name']").val();
           var opd = $("input[name='opd']").val();
           var phone = $("input[name='phone']").val();
           $.ajax({
               type:"POST",
               data:"name="+name+"&opd="+opd+"&phone="+phone,
               url:"php/search_customer.php",
               success:function (data) {
                   if(data === ''){
                       var text = "<h2>ไม่พบข้อมูลคนไข้</h2>";
                       $("#notFound").children().remove();
                       $("#customer").children().remove();
                       $("#notFound").append(text);

                   }else {
                       $("#notFound").children().remove();
                       $("#customer").children().remove();
                       $("#customer").append(data);
                   }
               }
           });
       }else{
           $("#help-box").removeClass("hide");
           if($("input[name='name']").val() === ''){
               $("input[name='name']").addClass('err-input');
           }
           if($("input[name='opd']").val() === ''){
               $("input[name='opd']").addClass('err-input');
           }
           if($("input[name='phone']").val() === ''){
               $("input[name='phone']").addClass('err-input');
           }
       }
       return false;
   });
});