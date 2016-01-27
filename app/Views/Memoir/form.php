<h2 style="padding-bottom: 0 !important;"><?php echo isset($memoir) ? 'Update' : 'Create'; ?> Memoir</h2>
<hr class="hr-header" />

<div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" id="message"
              rows="5" style="resize: none;"
              placeholder="What's on your mind?"><?php echo isset($memoir) ? $memoir['message'] : ''; ?></textarea>
</div>
<div class="form-group">
    <label for="image">Image</label>
    <input type="file" id="image">
    <p class="help-block small">Example block-level help text here.</p>
</div>
<div class="form-group">
    <label for="file">File</label>
    <input type="file" id="file">
    <p class="help-block small">Example block-level help text here.</p>
</div>

<hr />

<div class="pull-right">
    <a href="<?php echo isset($memoir) ?  base_url() . 'memoir/view/' . $memoir['id'] : base_url() . 'memoir'; ?>"
       class="btn gray-btn"
       data-toggle="tooltip" title="Cancel">
        <i class="fa fa-times"></i>
    </a>
    <button class="btn blue-btn" data-toggle="tooltip" title="Save">
        <i class="fa fa-check"></i>
    </button>
</div>