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

    <section class="danero-nav">
        <div class="container">
            <div class="danero-container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if(isset($user)) { ?>
                            <div class="un-logged">
                                Welcome back, <a href="<?php echo base_url() . 'user/profile'; ?>"><?php echo $user['name']; ?></a> |
                                <a href="<?php echo base_url() . 'user/logout'; ?>">Logout</a>
                            </div>
                        <?php } else { ?>
                            <div class="un-logged">
                                <a href="<?php echo base_url() . 'user/login'; ?>">Log in</a> or
                                <a href="<?php echo base_url() . 'user/sign_up'; ?>">Sign Up</a>
                            </div>
                        <?php } ?>
                        <h2 style="font-weight: bold;"><a href="<?php echo base_url() . 'memoir'; ?>">MEMOIR</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container">

        <div class="danero-container">

            <?php echo $content; ?>
        </div>
    </section>
    <div class="push"></div>
</div>

<?php echo $footer; ?>
</body>

</html>