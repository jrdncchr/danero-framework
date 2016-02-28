<div id="memoirForm" class="danero-box">

    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center" style="padding-bottom: 0 !important;"><?php echo isset($memoir) ? 'Update' : 'Create'; ?> Memoir</h2>
            <br />
            <div class="alert-danger"></div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label" for="message">Message <i class="fa fa-asterisk fa-sm"></i></label>
                <textarea class="form-control required" id="message"
                          rows="5" style="resize: none;"
                          placeholder="What's on your mind?"><?php echo isset($memoir) ? $memoir['message'] : ''; ?></textarea>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" id="image">
                <p class="help-block small">Example block-level help text here.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="file">File</label>
                <input type="file" id="file">
                <p class="help-block small">Example block-level help text here.</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <hr />
            <div class="pull-right">
                <a href="<?php echo isset($memoir) ?  base_url() . 'memoir/view/' . $memoir['id'] : base_url() . 'memoir'; ?>"
                   class="btn gray-btn"
                   data-toggle="tooltip" title="Cancel">
                    <i class="fa fa-times"></i>
                </a>
                <button type="button" id="saveBtn" class="btn blue-btn" data-toggle="tooltip" title="Save">
                    <i class="fa fa-check"></i>
                </button>
            </div>
        </div>
    </div>

</div>

<script>
    $(function() {
        var form = $('#memoirForm');
        enableFormValidationOnBlur(form);

        $('#saveBtn').on('click', function() {
            var valid = validateForm(form);
            if(valid) {
                var data = {
                    message: $('#message').val(),
                    action: 'add'
                };
                $.post(baseUrl + "memoir/save", data, function(response) {
                    if(response.success == true) {
                        window.location = baseUrl + "memoir/view/" + response.id;
                    } else {
                        displayAlertError(form, true, "Sorry, something went wrong.");
                    }
                }, 'json');
            }
        });

    });
</script>