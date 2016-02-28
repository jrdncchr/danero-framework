<h2>MEMOIR</h2>
<hr class="hr-header" />

<div class="alert-danger text-center"></div>
<div id="signupForm" class="form-horizontal danero-box">
    <h2 class="text-center">Sign Up</h2>
    <br />
    <div class="form-group">
        <label for="fullName" class="col-sm-3 control-label">Name</label>
        <div class="col-sm-7">
            <input type="text" class="form-control required" id="fullName" placeholder="Full Name">
        </div>
    </div>
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-7">
            <input type="email" class="form-control required email" id="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="country" class="col-sm-3 control-label">Country</label>
        <div class="col-sm-7">
            <select class="form-control required" id="country">
                <option value="">Select Country</option>
                <?php foreach($countries as $country): ?>
                    <option value="<?php echo $country['code']; ?>"><?php echo $country['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-7">
            <input type="password" class="form-control required" id="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="confirmPassword" class="col-sm-3 control-label">Confirm Password</label>
        <div class="col-sm-7">
            <input type="password" class="form-control required" id="confirmPassword" placeholder="Confirm your Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button id="signupBtn" type="button" class="btn blue-btn hover" data-toggle="tooltip" title="Sign Up">
                <i class="fa fa-check"></i>
            </button>
        </div>
    </div>
</div>

<div id="signupSuccess" style="display: none;">
    <p class="text-success text-center" style="font-size: 20px; font-weight: bold;">
        <i class="fa fa-smile-o"></i>
        Sign up successful!
    <p>
    <br />
    <p class="text-success text-center">
         Please onfirm your email address in the mail sent to <span id="signupEmail" style="font-weight: bold">jordan@danero.net</span>.
    </p>
    <br />
    <p class="text-center" style="font-size: 14px;">
        <i>
            Redirecting to the login screen after <span id="countdown" style="font-weight: bold">10</span> second(s).
        </i>
    </p>

</div>

<script>
    $(function() {
        $(document).ready(function() {
            $('#country').val('PHL').select2();

            var signupForm = $('#signupForm');
            enableFormValidationOnBlur(signupForm);

            $('#signupBtn').on('click', function() {
                if(validateForm(signupForm)) {
                    var valid = true;

                    if($('#fullName').val().length < 2) {
                        valid = false;
                        displayInputError($('#fullName'), true);
                        displayAlertError(signupForm, true, "Name should be at least 2 characters.");
                        return;
                    }

                    if($("#password").val().length < 5) {
                        valid = false;
                        displayInputError($('#password'), true);
                        displayAlertError(signupForm, true, "Password should be at least 5 characters.");
                        return;
                    }

                    if($('#confirmPassword').val() !== $('#password').val()) {
                        valid = false;
                        displayInputError($('#confirmPassword'), true);
                        displayAlertError(signupForm, true, "Passwords did not match.");
                        return;
                    }

                    if(valid) {

                        var data = {
                            name                : $('#fullName').val(),
                            email               : $('#email').val(),
                            country             : $('#country').val(),
                            password            : $('#password').val(),
                            confirm_password    : $('#confirmPassword').val()
                        };

                        $.post(baseUrl + 'user/add', data,
                            function(res) {
                                if(res.success) {
                                    signupForm.hide();
                                    clearFormInputs(signupForm);

                                    $('#signupEmail').html(data.email);
                                    $('#signupSuccess').show();

                                    var countdown = 10;
                                    var redirect = setInterval(function() {
                                        $('#countdown').html(countdown);
                                        countdown--;
                                        if(countdown == 0) {
                                            clearInterval(redirect);
                                            window.location = baseUrl + "user/login";
                                        }
                                    }, 1000);
                                } else {
                                    displayInputError($('#' + res.field), true);
                                    displayAlertError($('#signupForm'), true, res.message);
                                }
                            },
                        'json');
                    }

                }
            });
        });

    });
</script>