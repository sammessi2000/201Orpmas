<!DOCTYPE html>
<html>
    <head>
        <title>Quản trị <?php echo $settings['title']; ?></title>
        <meta name="robots" content="noindex,nofollow">
        <meta name=viewport content="width=device-width,initial-scale=1,user-scalable=yes">
        <meta name=apple-mobile-web-app-capable content=yes>

        <link href="https://builder.kientructhanhphat.com.vn/theme/admin/css/bootstrap/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo DOMAIN; ?>theme/admin/css/bootstrap/plugins/icheck/all.css" rel="stylesheet" />
        <link href="<?php echo DOMAIN; ?>theme/admin/css/bootstrap/style.css" rel="stylesheet" />
        <link href="<?php echo DOMAIN; ?>theme/admin/css/bootstrap/themes.css" rel="stylesheet" />
        <!-- <link href="<?php echo DOMAIN; ?>theme/admin/css/qa.css" rel="stylesheet" /> -->
        <link rel="stylesheet" href="<?php echo DOMAIN; ?>css/bootstrap-colorpicker.min.css" />
        <link href="<?php echo DOMAIN; ?>theme/admin/css/jquery.datetimepicker.min.css" rel="stylesheet" />
        <link href="<?php echo DOMAIN; ?>theme/admin/style.css" rel="stylesheet" />

        <script src="<?php echo DOMAIN; ?>theme/admin/js/jquery-1.11.3.min.js" type="text/javascript"></script>
        <script src="<?php echo DOMAIN; ?>theme/admin/js/bootstrap/plugins/nicescroll/jquery.nicescroll.min.js" type="text/javascript"></script>
        <!-- <script src="<?php echo DOMAIN; ?>theme/admin/js/bootstrap/plugins/validation/jquery.validate.min.js" type="text/javascript"></script> -->
        <script src="<?php echo DOMAIN; ?>theme/admin/js/bootstrap/plugins/validation/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo DOMAIN; ?>theme/admin/js/bootstrap/plugins/icheck/jquery.icheck.min.js" type="text/javascript"></script>
        <script src="<?php echo DOMAIN; ?>theme/admin/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo DOMAIN; ?>theme/admin/js/bootstrap/eakroko.min.js" type="text/javascript"></script>   
        <script src="<?php echo DOMAIN; ?>theme/admin/js/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
          
        <script type="text/javascript" src="<?php echo DOMAIN; ?>js/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="<?php echo DOMAIN; ?>js/ckfinder/ckfinder.js"></script> 
        <script type="text/javascript" src="<?php echo DOMAIN; ?>js/jquery.number.js"></script>   
        <script type="text/javascript" src="<?php echo DOMAIN; ?>js/bootstrap-colorpicker.min.js"></script>
        <script type="text/javascript" src="<?php echo DOMAIN; ?>js/functions.js"></script>   
        <?php /*

        <script type="text/javascript" src="<?php echo DOMAIN; ?>js/bootstrap.datepicker.js"></script>
        */ ?>
    </head>

    <body class="theme-satblue">
        <div id="navigation" class="navbar-fixed-top">
            <?php echo View::element('navbar'); ?>
        </div>

        <div class="nav-fixed container-fluid" id="content">
            <?php echo View::element('sidebar'); ?>

            <?php echo $content_for_layout; ?>
        </div>


        <script type="text/javascript">
        $('.image_preview').each(function() {
            var v = $(this).val();
            if(v != '')
            {
                var id = $(this).attr('id');

                $('.thumbnail-preview.' + id).html("<img src='<?php echo DOMAIN; ?>"+ v +"' />");            
            }
        });

        $('.tab-list a').click(function() {
            var tab = $(this).attr('href');

            $('.tab-body').addClass('hide');
            $(tab).removeClass('hide');

            $('.tab-list li a').removeClass('active');
            $(this).addClass('active');

            return false;
        });

        var is_collapse_sidebar = 0;

        $('.toogle-menu-mobile').click(function () {
            if(is_collapse_sidebar == 0)
            {
                $('#left').addClass('toogle-menu-hide');
                $('#main').addClass('toogle-menu-hide');

                is_collapse_sidebar = 1;
            }
            else
            {
                $('#left').removeClass('toogle-menu-hide');
                $('#main').removeClass('toogle-menu-hide');

                is_collapse_sidebar = 0;
            }
        });
        </script>


    </body>

</html>
