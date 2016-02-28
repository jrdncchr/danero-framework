<div class="row" style="margin-top: 10px;">
    <div class="col-xs-12">
        <div class="text-center">
            <a href="<?php echo base_url() . 'memoir/form'; ?>" class="btn blue-btn"
               data-toggle="tooltip" title="Create a new Memoir">
                <i class="fa fa-plus"></i>
            </a>
        </div>
    </div>
</div>

<?php
    if(isset($memoir)) {
        $right = true;
        if(is_multi($memoir)) {
            foreach ($memoir as $m) {
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="memoir <?php echo $right ? 'right' : 'left'; ?>" data-id="<?php echo $m['id']; ?>">
                            <?php echo nl2br($m['message']); ?>
                        </div>
                    </div>
                </div>
                <?php
                $right = !$right;
            }
        } else { ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="memoir <?php echo $right ? 'right' : 'left'; ?>" data-id="<?php echo $memoir['id']; ?>">
                        <?php echo nl2br($memoir['message']); ?>
                    </div>
                </div>
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