<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $site['name']; ?></title>
    <meta name="description" content="<?php echo $site['description']; ?>">
    <meta name="author" content="<?php echo $site['author']; ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS Styles -->
    <?php echo $styles; ?>

    <!-- Scripts -->
    <?php echo $scripts; ?>

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
<div class="wrapper">

    <section class="container">
        <div class="danero-container">
            <div class="un-logged">
                <a href="<?php echo base_url() . 'user/login'; ?>">Log in</a> or
                <a href="<?php echo base_url() . 'user/sign_up'; ?>">Sign Up</a>
            </div>
            <?php echo $content; ?>
        </div>
    </section>
    <div class="push"></div>
</div>

<?php echo $footer; ?>
</body>

</html>