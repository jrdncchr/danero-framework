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
    var errors = {
        required : [], email : []
    };
    form.find('input, select, textarea').filter(':visible').each(function() {
        var e = $(this);
        if(!e.val()) {
            if($(this).hasClass('required')) {
                errors.required.push(e);
            }
        } else {
            if($(this).hasClass('email')) {
                if(!validateEmail($(this).val())) {
                    errors.email.push(e);
                }
            }
        }
        displayInputError(e, false);
    });

    var result = {
        success : true
    };
    var i = 0;
    if(errors.required.length > 0) {
        result.success = false;
        result.message = "A required field cannot be empty.";
        for(i = 0; i < errors.required.length; i++) {
            displayInputError(errors.required[i], true);
        }
    } else if(errors.email.length > 0) {
        result.success = false;
        result.message = "Invalid email format.";
        for(i = 0; i < errors.email.length; i++) {
            displayInputError(errors.email[i], true);
        }
    }

    if(!result.success) {
        displayAlertError(form, true, result.message);
    }
    return result.success;
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

function validateEmail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}
