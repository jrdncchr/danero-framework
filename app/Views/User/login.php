<h2 style="padding-bottom: 0 !important;">LOGIN</h2>
<hr class="hr-header" />

<?php if(isset($_SESSION['login_error'])) { ?>
    <div class="alert alert-danger text-center">
        <i class="fa fa-exclamation-circle"></i> <?php echo $_SESSION['login_error']; ?>
    </div>
<?php unset($_SESSION['login_error']); } ?>

<form class="form-horizontal" style="margin: 0 5%" method="post" action="<?php echo base_url() . 'user/auth'; ?>">
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-7">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-7">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn blue-btn hover"
                    data-toggle="tooltip" title="Log in">
                <i class="fa fa-key"></i>
            </button>
        </div>
    </div>
</form>