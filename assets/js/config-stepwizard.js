$(document).ready(function () {

    // Step show event
    $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
        //alert("You are on step "+stepNumber+" now");
        if (stepNumber === 0) {
            $("#summary").addClass('col-md-offset-8');
            $("#prev-btn").addClass('disabled').attr("disabled", "disabled");
            $("#next-btn").removeAttr("disabled").removeClass("disabled");
            $("#success-btn").addClass('disabled').attr("disabled", "disabled");
        } else if (stepNumber === 1) {
            $("#summary").removeClass('col-md-offset-8');
            $("#next-btn").addClass('disabled').attr("disabled", "disabled");
            $("#prev-btn").removeClass("disabled").attr("disabled", false);
            $("#success-btn").removeClass('disabled').removeAttr("disabled", "disabled");
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
        return true;
    });

    $("#next-btn").on("click", function () {
        var sum = 0;
        var price_stale = $("#stale-money").val();
        $('span[name="allprice"]').each(function () {
            sum += +$(this).text() || 0;
        });
        var final_price = sum-price_stale;
        $("#select1 input[type='number']").val(final_price);
        $("#select2 input[type='number']").attr('max',final_price);
        $("#select3 input[type='number']").val(final_price);
        $('#content-pay').slideToggle();
        $('#smartwizard').smartWizard("next");
        return true;
    });
});