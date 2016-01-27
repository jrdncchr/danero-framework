<h2><a href="<?php echo base_url() . 'memoir'; ?>">MEMOIR</a></h2>
<hr class="hr-header" />

<div class="memoir">
    <?php echo $memoir['message']; ?>
</div>

<div class="pull-right">
    <a href="<?php echo base_url() . 'memoir/form/' . $memoir['id']; ?>" class="btn blue-btn"
       data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
    <button class="btn gray-btn" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
</div>