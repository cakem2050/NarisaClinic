$(document).ready(function () {

    // Step show event
    $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
        //alert("You are on step "+stepNumber+" now");
        if (stepNumber === 0) {
            $("#summary").addClass('col-md-offset-8');
            $("#prev-btn").addClass('disabled').attr("disabled", "disabled");
            $("#next-btn").removeAttr("disabled").removeClass("disabled hide");
            $("#success-btn").addClass('disabled hide').attr("disabled", "disabled");
            $("#stale-money").removeClass('disabled').attr("disabled", false);
        } else if (stepNumber === 1) {
            $("#stale-money").addClass('disabled').attr("disabled", true);
            $("#summary").removeClass('col-md-offset-8');
            $("#next-btn").addClass('disabled hide').attr("disabled", "disabled");
            $("#prev-btn").removeClass("disabled").attr("disabled", false);
            $("#success-btn").removeClass('disabled hide').removeAttr("disabled", "disabled");
        } else if (stepNumber === 2) {
            $("#prev-btn").addClass("disabled").attr("disabled", "disabled");
        }
    });
    // Smart Wizard
    $('#smartwizard').smartWizard({
        selected: 0,
        transitionEffect: 'fade',
        showStepURLhash: false,
        toolbarSettings: {toolbarPosition: 'none'},
        anchorSettings: {
            enableAnchorOnDoneStep: false,
        },
    });

    // External Button Events
    $("#confirm").on("click", function () {
        // Reset wizard
        $('#smartwizard').smartWizard("next");
        return true;
    });

    $("#prev-btn").on("click", function () {
        // Navigate previous
        $('#content-pay').slideToggle();
        $('#smartwizard').smartWizard("prev");
        $("#receive-money").addClass('hide');
        $("#receive").val('');
        $("#change").text('0.00');
        return true;
    });

    $("#next-btn").on("click", function () {
        var sum = 0;
        var price_stale = $("#stale-money").val();
        $('span[name="allprice"]').each(function () {
            var res = $(this).text().split(",");
            var res_price = '';
            $.each( res, function( key, value ) {
                res_price += value;
            });
            sum += parseFloat(res_price) || 0;
        });
        var final_price = sum - price_stale;
        var body = $("#tbody").children().prop("tagName");
        if (body !== undefined) {
            $("#receive-money").removeClass('hide');
            $('#select1 input').val(final_price.toFixed(2));
            $('#content-pay').slideToggle();
            $('#smartwizard').smartWizard("next");
            return true;
        }else{
            $("#modelAdd").modal('show');
            return true;
        }
    });
});