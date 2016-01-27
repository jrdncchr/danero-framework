<section class="container">
    <div class="memoirs-list">
        <h2>MEMOIRS</h2>
        <hr class="hr-header" />
        <?php
            $right = true;
            foreach($memoir as $m) {
                ?>
                <div class="memoir <?php echo $right ? 'right' : 'left'; ?>">
                    <?php echo $m['message']; ?>
                </div>
                <?php
                $right = !$right;
            } ?>
    </div>
</section>


