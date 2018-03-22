$(document).ready(function () {
    var barcode="";
    $(document).keydown(function(e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if(code===13)// Enter key hit
        {
            alert(barcode);
        }
        else if(code===9)// Tab key hit
        {
            alert("kwan");
        }
    });

    $.fn.digits = function(){
        return this.each(function(){
            $(this).text( $(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,") );
        })
    }
    $("#amount").change(function () {
        $("#amount").removeClass('required-amount');
        $("#amount").addClass('pass-amount');
    });
    $("#submit").click(function () {
        if($("#amount").val() > 0 && $("#discount-pre").val() <= 100) {
            $.ajax({
                url:"php/add_product.php",
                type:"POST",
                data:$("#bill-detail").serialize(),
                cache: false,
                success:function (data) {
                    $("#tbody").append(data);
                    var sum = 0;
                    $('span[name="allprice"]').each(function() {
                        sum += +$(this).text()||0;
                    });
                    $("#result-allprice").text(sum);
                    $("#result-allprice").digits();
                }
            });
        }else {
            $("#amount").addClass('required-amount');
        }
        $("#bill-detail").submit(false);
    });
    
    $("#discount-pre").focus(function () {
        $("#discount").attr('disabled',true);
    })
    $("#discount").focus(function () {
        $("#discount-pre").attr('disabled',true);
    });
    $("#discount-pre").focusout(function () {
        if($("#discount-pre").val() === '' || $("#discount-pre").val() === '0'){
            $("#discount").attr('disabled',false);
        }
    });
    $("#discount").focusout(function () {
        if($("#discount").val() === '' || $("#discount").val() === '0'){
            $("#discount-pre").attr('disabled',false);
        }
    });
    
    $("#search").change(function () {
        var id = $("#search").val();
        var action = "searchProduct";
        $.post("php/result_product.php",
            {
                id: id,
                action: action
            },
            function(data){
                $("#tempInput").children().remove();
                $("#tempInput").prepend(data);
                $("#name").text($("#pro_name-sub").val());
                $("#price").text($("#pro_price-sub").val()+"/"+$("#pro_unit-sub").val());
                $("#amount").attr('disabled',false);
                $("#discount-pre").attr('disabled',false);
                $("#discount").attr('disabled',false);
                $("#pro-id").val($("#id-sub").val());
                $("#pro-price").val($("#pro_price-sub").val());
            });
    });
    $("#search").select2({
        id: function(bond){ return bond.id; },
        ajax: {
            method: "GET",
            url: "php/search_product.php",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    product_id: params.term
                };
            },
            processResults: function (data, params) {
                var array = data.resultajax; //depends on your JSON
                return { results: array };
            },
            cache: true
        },
        placeholder: 'Search for a repository',
        escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
        language: {
            inputTooShort: tooShort,
            errorLoading:fotmatError,
        }
    });
    function tooShort() {
        var markup;
        markup = "<div>กรุณากรอกข้อมูล</div>";
        return markup;
    }
    function fotmatError(){
        var markup;
        markup = "<div><span class='select2-notfound pull-left'>ไม่พบสินค้าและบริการ</span></div>";
        return markup;
    }
    function formatRepo (repo) {
        if (repo.loading) {
            return repo.text;
        }
        var markup;
        markup = "<div class='select2-result-repository__title'>" + repo.id + "<span class=\"pull-right\">"+repo.pro_name+"</span></div>";

        return markup;
    }
    function formatRepoSelection (repo) {
        return repo.id;
    }

});
