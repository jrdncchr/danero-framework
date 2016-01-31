$(function() {
    /* Sticky Footer */
    setColumnSize();
    $(window).resize(function () { setColumnSize(); });

    /* Activate Tooltips */
    activateTooltips();
});

function activateTooltips() {
    $('[data-toggle="tooltip"]').tooltip({
        placement: 'top'
    });
}

function setColumnSize() {
    $('.wrapper').css('min-height', $( window ).height() - 22);
}

function validateForm(form) {
    var result = {
        success: true
    };
    form.find('.required').each(function() {
        if($(this).val() == "") {
            result.message = "A required field is empty.";
            result.success = false;
            displayInputError($(this), true);
        } else {
            displayInputError($(this), false);
        }
    });
    if(!result.success) {
        displayAlertError(form, true, result.message);
    }
    return result;
}

function displayInputError(input, show) {
    if(show) {
        input.addClass('has-error').parent('.form-group').find('label').addClass('has-error-label');
    } else {
        input.removeClass('has-error').parent('.form-group').find('label').removeClass('has-error-label');
    }
}

function displayAlertError(form, show, message) {
    if(show) {
        form.find('.alert-danger').addClass('alert').html("<i class='fa fa-exclamation-circle'></i> " + message);
    } else {
        form.find('.alert-danger').removeClass('alert').html("");
    }
}
