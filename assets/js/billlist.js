$(document).ready(function () {
    $("#stale-money").change(function () {
        var price_stale = $(this).val();
        var sum = 0;
        $('span[name="allprice"]').each(function () {
            sum += +$(this).text() || 0;
        });
        var final_price = sum - price_stale;
        $("#final_price").text(final_price);
    });
    $("#select1 input[type='number']").change(function () {
        if ($(this).val() > $(this).attr('max')) {
            $(this).val($(this).attr('max'));
        }
    });
    $("#bank-money").change(function () {
        if ($("#bank-money").val() + $("#money").val() > $(this).attr('max')) {
            $("#select2 input[type='number']").val('');
        }
    });
    $("#select3 input[type='number']").change(function () {
        if ($(this).val() > $(this).attr('max')) {
            $(this).val($(this).attr('max'));
        }
    });

    var barcode = "";
    $(document).keydown(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        if (code === 13) {
            $.ajax({
                url: "php/add_product_barcode.php",
                type: "POST",
                data: {
                    barcode: barcode
                },
                cache: false,
                success: function (data) {
                    $("#tbody").append(data);
                    var sum = 0;
                    $('span[name="allprice"]').each(function () {
                        sum += +$(this).text() || 0;
                    });
                    $("#result-allprice").text(sum);
                    $("#content-pay #section1 input").val(sum);
                    $("#content-pay #section3 input").val(sum);
                    $("#result-allprice").digits();
                    $("#final_price").text(sum);
                    $("#final_price").digits();
                    //Set NO.
                    var no_id = $("#tbody").children();
                    var count=1;
                    $.each(no_id,function (key,value) {
                        $(this).children().first().text(count);
                        count++;
                    })
                }
            });
            barcode = "";
        }
        else if (code === 9) {
            alert("kwan");
        } else {
            barcode = barcode + String.fromCharCode(code);
        }
    });

    $.fn.digits = function () {
        return this.each(function () {
            $(this).text($(this).text().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        })
    }
    $("#amount").change(function () {
        $("#amount").removeClass('required-amount');
        $("#amount").addClass('pass-amount');
    });
    $("#submit").click(function () {
        if ($("#amount").val() > 0 && $("#discount-pre").val() <= 100) {
            $.ajax({
                url: "php/add_product.php",
                type: "POST",
                data: $("#bill-detail").serialize(),
                cache: false,
                success: function (data) {
                    $("#tbody").append(data);
                    var sum = 0;
                    $('span[name="allprice"]').each(function () {
                        sum += +$(this).text() || 0;
                    });
                    var stale_money = $("#stale-money").val();
                    $("#result-allprice").text(sum).digits();
                    $("#amount").val('').attr('disabled', true).removeClass('pass-amount');
                    $(".select2-selection__rendered").text('ค้นหาสินค้า');
                    $("#discount-pre").val('').attr('disabled', true);
                    $("#discount").val('').attr('disabled', true);
                    $("#name").text('ชื่อรายการสินค้า');
                    $("#price input").val('ราคา').attr('disabled', true);
                    $("#price .input-group-addon").text('ชิ้น');
                    $("#final_price").text(sum - stale_money);
                    $("#final_price").digits();
                    //Set NO.
                    var no_id = $("#tbody").children();
                    var count=1;
                    $.each(no_id,function (key,value) {
                        $(this).children().first().text(count);
                        count++;
                    })
                }
            });
        } else {
            $("#amount").addClass('required-amount');
        }
        $("#bill-detail").submit(false);
    });

    $("#discount-pre").focus(function () {
        $("#discount").attr('disabled', true);
    })
    $("#discount").focus(function () {
        $("#discount-pre").attr('disabled', true);
    });
    $("#discount-pre").focusout(function () {
        if ($("#discount-pre").val() === '' || $("#discount-pre").val() === '0') {
            $("#discount").attr('disabled', false);
        }
    });
    $("#discount").focusout(function () {
        if ($("#discount").val() === '' || $("#discount").val() === '0') {
            $("#discount-pre").attr('disabled', false);
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
            function (data) {
                $("#tempInput").children().remove();
                $("#tempInput").prepend(data);
                $("#name").text($("#pro_name-sub").val());
                $("#price input").val($("#pro_price-sub").val()).attr('disabled', false);
                $("#price .input-group-addon").text($("#pro_unit-sub").val());
                $("#amount").attr('disabled', false);
                $("#discount-pre").attr('disabled', false);
                $("#discount").attr('disabled', false);
                $("#pro-id").val($("#id-sub").val());
                $("#pro-price").val($("#pro_price-sub").val());
            });
    });
    $("#search").select2({
        id: function (bond) {
            return bond.id;
        },
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
                return {results: array};
            },
            cache: true
        },
        placeholder: 'Search for a repository',
        escapeMarkup: function (markup) {
            return markup;
        }, // let our custom formatter work
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection,
        language: {
            inputTooShort: tooShort,
            errorLoading: fotmatError,
        }
    });

    function tooShort() {
        var markup;
        markup = "<div>กรุณากรอกข้อมูล</div>";
        return markup;
    }

    function fotmatError() {
        var markup;
        markup = "<div><span class='select2-notfound pull-left'>ไม่พบสินค้าและบริการ</span></div>";
        return markup;
    }

    function formatRepo(repo) {
        if (repo.loading) {
            return repo.text;
        }
        var markup;
        markup = "<div class='select2-result-repository__title'>" + repo.id + "<span class=\"pull-right\">" + repo.pro_name + "</span></div>";

        return markup;
    }

    function formatRepoSelection(repo) {
        return repo.id;
    }

    $(".btn-group a").click(function () {
        $(this).toggleClass('btn-default', 'btn-info');
    });
    $('input[type=radio]').change(function () {
        var tabs = "#" + $(this).attr('class');
        $(".tab-content div").removeClass('active');
        $(tabs).addClass('active');
    });

    //Commit to databasse
    $("#success-btn").click(function () {
        var items = [];
        var pay = null;
        var type_pay = $("input[name='option']:checked").val();
        var sum = 0;
        $('span[name="allprice"]').each(function () {
            sum += +$(this).text() || 0;
        });
        var stale_money = $("#stale-money").val();
        var final_money = sum-stale_money;
        var stu_mo ;
        var sum_pay = 0;
        if(type_pay === 'TC' || type_pay === 'TO' || type_pay === 'TL' || type_pay === 'CH'){
            pay = {
                bills_cash:$("#select1").find("input[name='money-pay']").val()|| 0,
                bills_scb:0,
                bills_ktc:0,
                bills_kbank:0,
                bills_bbl:0,
                bills_tmb:0,
                bills_bay:0
            };
            $.each(pay,function (index,value) {
                sum_pay+=parseInt(value);
            });
            if(final_money === sum_pay){
                stu_mo = "pass";
            }else{
                stu_mo = "false";
            }
            // alert(JSON.stringify(pay));
        }else if(type_pay === 'CC'){
            pay = {
                bills_cash:$("#select2").find("#money").val()|| 0,
                bills_scb:$("#select2").find("#bank-SCB").val()|| 0,
                bills_ktc:$("#select2").find("#bank-KTC").val()|| 0,
                bills_kbank:$("#select2").find("#bank-Kbank").val()|| 0,
                bills_bbl:$("#select2").find("#bank-BBL").val()|| 0,
                bills_tmb:$("#select2").find("#bank-TMB").val()|| 0,
                bills_bay:$("#select2").find("#bank-BAY").val()|| 0
            };
            $.each(pay,function (index,value) {
                sum_pay+=parseInt(value);
            });
            if(final_money === sum_pay){
                stu_mo = "pass";
            }else{
                stu_mo = "false";
            }
        }else if(type_pay==='CD'){
            pay = {
                bills_cash:0,
                bills_scb:$("#select3").find("#bank-SCB").val() || 0,
                bills_ktc:$("#select3").find("#bank-KTC").val() || 0,
                bills_kbank:$("#select3").find("#bank-Kbank").val() || 0,
                bills_bbl:$("#select3").find("#bank-BBL").val() || 0,
                bills_tmb:$("#select3").find("#bank-TMB").val() || 0,
                bills_bay:$("#select3").find("#bank-BAY").val() || 0
            };
            $.each(pay,function (index,value) {
                sum_pay+=parseInt(value);
            });
            if(final_money === sum_pay){
                stu_mo = "pass";
            }else{
                stu_mo = "false";
            }
        }
        $.each($("#tbody").children(), function (index, value) {
            var item = {
                pro_id: $(this).find("input[name='pro_id']").val(),
                pro_name:$(this).find("td[name='pro_name']").text(),
                pro_price:$(this).find("input[name='price']").val(),
                pro_amount:$(this).find("input[name='i-amount']").val(),
                discount_pre:$(this).find("input[name='i-discount-pre']").val(),
                discount:$(this).find("input[name='i-discount']").val()
            };
            items.push(item);
        });
        if(stu_mo === 'pass') {
            $.ajax({
                type: "POST",
                url: "php/add_prodatabase.php",
                data: {
                    cus_opd: $("#cusid").text(),
                    bills_ost: $("#stale-money").val(),
                    items: items,
                    bills_ptype:$("input[name='option']:checked").val(),
                    type_pay:pay,
                },
                success: function (data) {
                    if(data === 'pass'){
                        $("#modelSuccess").modal('show');
                        setTimeout(function(){
                                window.location.href='home.php';
                            }, 1000);
                    }else{
                        alert(data);
                    }
                }
            });
        }else if(stu_mo === 'false'){
            $("#modelError").modal('show');
        }
    });

});
//change amount
$(document).delegate("input[name='i-discount-pre']", "focus", function () {
    $(this).parent().parent().children("td[name='td-discount']").children("input[name='i-discount']").attr('disabled', true);
});
$(document).delegate("input[name='i-discount']", "focus", function () {
    $(this).parent().parent().children("td[name='td-discount-pre']").children("input[name='i-discount-pre']").attr('disabled', true);
});
$(document).delegate("input[name='i-discount-pre']", "focusout", function () {
    if ($(this).val() === '' || $(this).val() === '0') {
        $(this).parent().parent().children("td[name='td-discount']").children("input[name='i-discount']").attr('disabled', false);
    }
});
$(document).delegate("input[name='i-discount']", "focusout", function () {
    if ($(this).val() === '' || $(this).val() === '0') {
        $(this).parent().parent().children("td[name='td-discount-pre']").children("input[name='i-discount-pre']").attr('disabled', false);
    }
});

$(document).delegate("input[name='i-amount']", 'change', function () {
    //Set discount
    var discount_pre = $(this).parent().parent().children("td[name='td-discount-pre']").children("input[name='i-discount-pre']").val();
    var discount = $(this).parent().parent().children("td[name='td-discount']").children("input[name='i-discount']").val();
    var price = $(this).parent().parent().children("td[name='td-price']").children().children("input[name='price']").val();
    var amount = $(this).val();
    var final_discount = 0;
    var allprice = 0;
    if (discount_pre !== '' && discount_pre !== '0') {
        allprice = (price * amount) - ((price * amount) * (discount_pre / 100));
    } else if (discount !== '' && discount !== '0') {
        allprice = (price * amount) - discount;
    } else {
        allprice = (price * amount);
    }

    $(this).parent().parent().children("td[name='td-allprice']").children("span[name='allprice']").text(allprice);

    var sum = 0;
    $('span[name="allprice"]').each(function () {
        sum += +$(this).text() || 0;
    });
    var stale_money = $("#stale-money").val();
    $("#result-allprice").text(sum);
    $("#result-allprice").digits();
    $("#final_price").text(sum - stale_money);
    $("#final_price").digits();
});
$(document).delegate("input[name='i-discount-pre']", "change", function () {
    if ($(this).val() > 100) {
        $(this).val(100);
    }
    if ($(this).val() < 0) {
        $(this).val(0);
    }
    if (!$(this).val()) {
        var discount = 0;
    } else {
        var discount = $(this).val();
    }
    var price = $(this).parent().parent().children("td[name='td-price']").children().children("input[name='price']").val();
    var amount = $(this).parent().parent().children("td[name='td-amount']").children("input[name='i-amount']").val();
    $(this).parent().parent().children("td[name='td-allprice']").children("span[name='allprice']").text((amount * price) - ((amount * price) * (discount / 100)));
    var sum = 0;
    $('span[name="allprice"]').each(function () {
        sum += +$(this).text() || 0;
    });
    var stale_money = $("#stale-money").val();
    $("#result-allprice").text(sum);
    $("#result-allprice").digits();
    $("#final_price").text(sum - stale_money);
    $("#final_price").digits();
});
$(document).delegate("input[name='i-discount']", "change", function () {
    var discount = 0;
    if ($(this).val() < 0) {
        $(this).val(0);
    }
    if (!$(this).val()) {
        discount = 0;
    } else {
        discount = $(this).val();
    }
    var price = $(this).parent().parent().children("td[name='td-price']").children().children("input[name='price']").val();
    var amount = $(this).parent().parent().children("td[name='td-amount']").children("input[name='i-amount']").val();
    $(this).parent().parent().children("td[name='td-allprice']").children("span[name='allprice']").text((amount * price) - discount);
    var sum = 0;
    $('span[name="allprice"]').each(function () {
        sum += +$(this).text() || 0;
    });
    var stale_money = $("#stale-money").val();
    $("#result-allprice").text(sum);
    $("#result-allprice").digits();
    $("#final_price").text(sum - stale_money);
    $("#final_price").digits();
});
$(document).delegate("input[name='price']", "change", function () {
    var discount_pre = $(this).parent().parent().parent().children("td[name='td-discount-pre']").children("input[name='i-discount-pre']").val();
    var discount = $(this).parent().parent().parent().children("td[name='td-discount']").children("input[name='i-discount']").val();
    var amount = $(this).parent().parent().parent().children("td[name='td-amount']").children("input[name='i-amount']").val();
    var price = $(this).val();
    var allprice = 0;
    if (discount_pre !== '' && discount_pre !== '0') {
        allprice = (price * amount) - ((price * amount) * (discount_pre / 100));
    } else if (discount !== '' && discount !== '0') {
        allprice = (price * amount) - discount;
    } else {
        allprice = (price * amount);
    }
    $(this).parent().parent().parent().children("td[name='td-allprice']").children("span[name='allprice']").text(allprice);
    var sum = 0;
    $('span[name="allprice"]').each(function () {
        sum += +$(this).text() || 0;
    });
    var stale_money = $("#stale-money").val();
    $("#result-allprice").text(sum);
    $("#result-allprice").digits();
    $("#final_price").text(sum - stale_money);
    $("#final_price").digits();
});

$(document).delegate("button[name='btn-delete']", "click", function () {
    $("#modelDelete").modal('show');
});

//Confirm Delete Pro
$(document).delegate("button[name='btn-delete']", "click", function () {
    var tr_name = $(this).attr('data-deletepro');
    $("#confirm_delete").attr('data-delete', tr_name);
});
//Delete Pro
$(document).delegate("#confirm_delete", "click", function () {
    var id_pro = $(this).attr('data-delete');
    var tr = "tr[name='" + id_pro + "']";
    $(tr).remove();
    $("#result-allprice").text(0);
    $("#final_price").text(0);
    //Set NO.
    var no_id = $("#tbody").children();
    var count=1;
    $.each(no_id,function (key,value) {
        $(this).children().first().text(count);
        count++;
    })
});

