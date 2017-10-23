<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <?php $home = get_template_directory_uri(); ?>
        <title><?php generateTitle(); ?></title>
        <!-- Bootstrap -->
        <link href="<?= $home; ?>/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= $home; ?>/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?= $home; ?>/css/theme-style.css" rel="stylesheet">
        <link href="<?= $home; ?>/style.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body>
        <div class="container-fluid bg-fff">
            <div class="container">
                <div class="row">
                    <div class="col-xs-3 col-sm-4">
                        <a href="#"><img src="<?= $home; ?>/img/plano-cinza-2.png" alt="" class="img-responsive header-logo"></a>
                    </div>
                    <div class="col-xs-9 col-sm-8">
                        <?php
                            $args = array(
                                'theme_location' => 'header-menu'
                            );
                            wp_nav_menu( $args );
                        ?>
                    </div>
                </div>
            </div>
        </div>


        <?php //get_search_form(); ?>
