<h2><a href="<?php echo base_url() . 'memoir'; ?>">MEMOIRS</a></h2>
<hr class="hr-header" />
<div class="text-center">
    <a href="<?php echo base_url() . 'memoir/form'; ?>" class="btn blue-btn"
       data-toggle="tooltip" title="Create a new Memoir">
        <i class="fa fa-plus"></i>
    </a>
</div>
<?php
    if(isset($memoir)) {
        $right = true;
        if(is_multi($memoir)) {
            foreach ($memoir as $m) {
                ?>
                <div class="memoir <?php echo $right ? 'right' : 'left'; ?>" data-id="<?php echo $m['id']; ?>">
                    <?php echo $m['message']; ?>
                </div>
                <?php
                $right = !$right;
            }
        } else { ?>
            <div class="memoir <?php echo $right ? 'right' : 'left'; ?>" data-id="<?php echo $memoir['id']; ?>">
                <?php echo $memoir['message']; ?>
            </div>
        <?php }
    }
?>


<script>
    (function($){

        $(".memoir").on("dblclick", function() {
            var id = $(this).data("id");
            window.location = baseUrl + "memoir/view/" + id;
        });

    })(jQuery);
</script>