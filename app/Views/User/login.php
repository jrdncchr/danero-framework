<h2 style="padding-bottom: 0 !important;">LOGIN</h2>
<hr class="hr-header" />

<form class="form-horizontal" style="margin: 0 5%">
    <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email</label>
        <div class="col-sm-7">
            <input type="email" class="form-control" id="email" placeholder="Email">
        </div>
    </div>
    <div class="form-group">
        <label for="password" class="col-sm-3 control-label">Password</label>
        <div class="col-sm-7">
            <input type="password" class="form-control" id="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <a href="<?php echo base_url() . 'memoir'; ?>" class="btn btn-default">Log in</a>
        </div>
    </div>
</form>