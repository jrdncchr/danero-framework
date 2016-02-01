<h2>SIGN UP</h2>
<hr class="hr-header" />

<?php
    $ip = get_real_ip_addr();
    if($ip != "127.0.0.1") {
        var_dump(get_ip_info($ip, 'location'));
    }
?>

<div id="signupForm" class="form-horizontal" style="margin: 0 5%;">
    <div class="alert-danger text-center"></div>
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

<script>
    $(function() {
        $(document).ready(function() {
            $('select').select2();

            $('#signupBtn').on('click', function() {
                if(validateForm($("#signupForm"))) {
                    if($('#confirmPassword').val() === $('#password').val()) {
                        $.post(baseUrl + 'user/add', {
                            name                : $('#fullName').val(),
                            email               : $('#email').val(),
                            country             : $('#country').val(),
                            password            : $('#password').val(),
                            confirm_password    : $('#confirmPassword').val()
                        },
                        function(res) {
                            console.log(res);
                        }, 'json');
                    } else {
                        displayInputError($('#confirmPassword'), true);
                        displayAlertError($('#signupForm'), "Passwords did not match.");
                    }
                }
            });
        });

    });
</script>