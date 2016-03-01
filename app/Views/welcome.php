<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Danero</title>
        <meta name="description" content="Just smile and there is nothing you can't overcome.">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="<?php echo base_url() . 'resources/bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url() . 'resources/bower_components/components-font-awesome/css/font-awesome.min.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url() . 'resources/css/html5-css-reset.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url() . 'resources/bower_components/jquery.secretnav/dist/css/jquery.secretnav.css'; ?>" />
        <link rel="stylesheet" href="<?php echo base_url() . 'resources/css/danero.css'; ?>" />

        <script src="<?php echo base_url() . 'resources/js/modernizr.js'; ?>"></script>
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <style>
            .welcome p {
                margin-top: 20%;
                text-align: center;
                font-size: 36px;
            }
            a {
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body>
        <div id="container" style="background: #F2F3F8 !important;">
            <div class="wrapper">
                <section class="container">
                    <div class="danero-container">
                        <section class="welcome">
                            <p>DANER<a class="open-menu"><i class="fa fa-smile-o"></i></a></p>
                        </section>
                    </div>
                </section>
                <div class="push"></div>
            </div>
            <footer class="footer text-center">&copy; Copyright <?php echo date('Y'); ?> Danero</footer>
        </div>
        <nav>
            <a href="<?php echo base_url() . 'user/login'; ?>">Memoir</a>
        </nav>
    </body>

    <!-- Scripts -->
    <script src="<?php echo base_url() . 'resources/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'resources/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'resources/bower_components/jquery.secretnav/dist/js/jquery.secretnav.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'resources/js/danero.js'; ?>"></script>
    <script>
        $( document ).ready(function() {
            $('#container').SecretNav({
                navSelector: 'nav',
                openSelector: '.open-menu',
                position: 'left'
            });
        });
    </script>


</html>