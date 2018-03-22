$(document).ready(function () {

    // Step show event
    $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
        //alert("You are on step "+stepNumber+" now");
        if (stepNumber === 0) {
            $("#prev-btn").addClass('disabled');
            $("#next-btn").removeAttr("disabled").removeClass("disabled");
            $("#success-btn").addClass('disabled').attr("disabled", "disabled");
        } else if (stepNumber === 1) {
            $("#next-btn").addClass('disabled').attr("disabled", "disabledza");
            $("#prev-btn").removeClass("disabled");
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
        $('#smartwizard').smartWizard("prev");
        return true;
    });

    $("#next-btn").on("click", function () {
        $('#smartwizard').smartWizard("next");
        return true;
    });
});