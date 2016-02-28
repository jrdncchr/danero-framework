<?php if(isset($_SESSION['memoirSaved'])): ?>
<div class="alert alert-success">
    <i class="fa fa-check"></i> Memoir saved successful.
</div>
<?php unset($_SESSION['memoirSaved']);
endif; ?>

<div class="memoir">
    <?php echo nl2br($memoir['message']); ?>
</div>

<div class="pull-right">
    <a href="<?php echo base_url() . 'memoir/form/' . $memoir['id']; ?>" class="btn blue-btn"
       data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i></a>
    <button id="deleteBtn" class="btn gray-btn" data-toggle="tooltip" title="Delete"><i class="fa fa-trash"></i></button>
</div>

<script>
    $(function() {
        activateDeleteEvent();
    });

    function activateDeleteEvent() {
        $('#deleteBtn').off('click').on('click', function() {
            var btn = $(this);
            btn.removeClass('gray-btn').addClass('red-btn');
            btn.attr('title', 'Delete Confirmation').tooltip('fixTitle').tooltip('show');
            activateConfirmDeleteEvent();
            setTimeout(function() {
                btn.removeClass('red-btn').addClass('gray-btn');
                btn.attr('title', 'Delete').tooltip('fixTitle');
                activateDeleteEvent();
            }, 10000);
        });

    }

    function activateConfirmDeleteEvent() {
        $('#deleteBtn').off('click').on('click', function() {
            $.post(baseUrl + "memoir/delete", {
                id: "<?php echo $memoir['id']?>"
            }, function(response) {
                if(response.success == true) {
                    window.location = baseUrl + 'memoir';
                }
            }, 'json');
        });
    }
</script>