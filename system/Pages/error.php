<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Danero</title>
    <meta name="description" content="Just smile and there is nothing you can't overcome.">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo base_url() . 'resources/bower_components/bootstrap/dist/css/bootstrap.min.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'resources/bower_components/components-font-awesome/css/font-awesome.min.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'resources/css/html5-css-reset.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'resources/css/danero.css'; ?>" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <style>
        .error p {
            margin-top: 20%;
            text-align: center;
            font-size: 36px;
        }
    </style>
</head>

<body>

<div class="wrapper">

    <section class="container">
        <div class="danero-container">
            <section class="error">
                <p><?php echo $error_message; ?> <i class="fa fa-frown-o" title="<?php echo $hidden_message; ?>"></i></p>
            </section>
        </div>
    </section>
    <div class="push"></div>
</div>

<footer class="footer text-center">&copy; Copyright <?php echo date('Y'); ?> Danero</footer>

<!-- Scripts -->
<script src="<?php echo base_url() . 'resources/bower_components/jquery/dist/jquery.min.js'; ?>"></script>
<script src="<?php echo base_url() . 'resources/js/danero.js'; ?>"></script>
</body>

</html>