<h2><a href="<?php echo base_url() . 'memoir'; ?>">MEMOIRS</a></h2>
<hr class="hr-header" />
<?php
$right = true;
foreach($memoir as $m) {
    ?>
    <div class="memoir <?php echo $right ? 'right' : 'left'; ?>" data-id="<?php echo $m['id']; ?>">
        <?php echo $m['message']; ?>
    </div>
    <?php
    $right = !$right;
} ?>


<script>
    (function($){

        $(".memoir").on("dblclick", function() {
            var id = $(this).data("id");
            window.location = baseUrl + "memoir/view/" + id;
        });

    })(jQuery);
</script>