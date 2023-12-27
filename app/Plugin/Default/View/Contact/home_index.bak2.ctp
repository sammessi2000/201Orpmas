<?php $bread_array = $this->App->breadarray($current_category); ?>

<?php echo View::element('slider-owl'); ?>
<?php 
// pr($this->data);
?>

<!-- main index -->
<div class="main-index page-dmsp">
    <div class="bo-breadcrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php if(is_array($bread_array) && count($bread_array)>0) { ?>
                    <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { $i++; ?>
                    <li class="breadcrumb-item <?php //if($i==$n) echo 'li-last'; ?>"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <li class="breadcrumb-item li-last"><?php echo $this->App->t('contact'); ?></li>
                    <?php } ?>
                </ol>
            </nav>
        </div>
    </div>

    <?php 
        $hotline = $this->App->t('hotline');
        $hotline_number = preg_replace('/[^0-9]/', '', $hotline);

        $hotline2 = $this->App->t('company_phone');
        $hotline2_number = preg_replace('/[^0-9]/', '', $hotline2);
    ?>

   <section class="index-pdmsp list-products">
        <div class="container carousel-dmsp1">
            <form action="<?php echo DOMAIN; ?>default/contact" method="post" class="uk-form-horizontal frmcontact">   

            <div class="frmcontact-body">
                <div class="left">
                    <div class="ft-ifct">
                        <div class="form-title">
                            <?php echo $this->App->t_a('company_name'); ?>
                        </div>

                        <ul>
                            <li>
                                <i class="fa fa-home"></i>
                                <?php echo $this->App->t_a('company_address'); ?>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i>
                                <a href="tel:<?php echo $hotline_number; ?>"><?php echo $hotline; ?></a>
                            </li>
                            <li>
                                <i class="fa fa-mobile"></i>
                                <a href="tel:<?php echo $hotline2_number; ?>"><?php echo $hotline2; ?></a>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i>
                                <?php echo $this->App->t_a('company_email'); ?>
                            </li>
                            <li>
                                <i class="fa fa-globe"></i>
                                <?php echo $this->App->t_a('company_website'); ?>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="right">
                    <div class="form-title">
                        <?php echo $this->App->t_a('form-title'); ?>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2@m">
                            <div class="uk-form-label contact-label">
                                <?php echo $this->App->t('fullname'); ?>
                                <?php echo $this->App->adm_link('lang', 'fullname'); ?>
                                <span>*</span>
                            </div>
                            <div class="uk-form-controls contact-controls">
                                <input type="text" name="fullname" class="uk-input" placeholder="<?php echo $this->App->t('fullname'); ?>" required="required" />
                            </div>
                        </div>

                        <div class="uk-width-1-2@m">
                            <div class="uk-form-label contact-label">
                                <?php echo $this->App->t('phone'); ?>
                                <?php echo $this->App->adm_link('lang', 'phone'); ?>
                                <span>*</span>
                            </div>
                            <div class="uk-form-controls contact-controls">
                                <input type="text" name="phone" class="uk-input" placeholder="<?php echo $this->App->t('phone'); ?>" required="required" />
                            </div>
                        </div>

                        <div class="uk-width-1-2@m">
                            <div class="uk-form-label contact-label">
                                <?php echo $this->App->t('address'); ?>
                                <?php echo $this->App->adm_link('lang', 'address'); ?>
                                <span>*</span>
                            </div>
                            <div class="uk-form-controls contact-controls">
                                <input type="text" name="address" class="uk-input" placeholder="<?php echo $this->App->t('address'); ?>" required="required" />
                            </div>
                        </div>

                        <div class="uk-width-1-2@m">
                            <div class="uk-form-label contact-label">
                                Email
                                <span>*</span>
                            </div>
                            <div class="uk-form-controls contact-controls">
                                <input type="text" name="email" class="uk-input" placeholder="Email" required="required" />
                            </div>
                        </div>

                        <?php /*
                        <div class="uk-width-1-2">
                            <div class="form-lb">
                                <?php echo $this->App->t('content'); ?>
                                <?php echo $this->App->adm_link('lang', 'content'); ?>
                            </div>
                            <div class="form-input">
                                <input type="text" name="title" class="form-control" placeholder="<?php echo $this->App->t('title'); ?>" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12">
                                <p><b><?php echo $this->App->t('phongban'); ?> <?php echo $this->App->adm_link('lang', 'phongban'); ?></b></p>
                                <?php $pb = explode(',', $settings['phongban']); ?>
                                <select name="phongban" class="form-control">
                                    <?php foreach($pb as $v) : ?>
                                    <option value="<?php echo $v; ?>"><?php echo $v; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        */ ?>

                        <div class="uk-width-1-1">
                            <div class="uk-form-label contact-label">
                                <?php echo $this->App->t('content'); ?>
                                <?php echo $this->App->adm_link('lang', 'content'); ?>
                            </div>
                            <div class="uk-form-controls contact-controls">
                                <textarea class="uk-input" name="content" rows="6" cols="12" placeholder="<?php echo $this->App->t('content'); ?>" required="required"></textarea>
                            </div>
                        </div>

                        <?php /*
                        <div class="form-group">
                            <div class="col-sm-3 col-xs-5">
                                <input type="text" name="captcha" value="" required="required" class="form-control captcha-input" />
                            </div>
                            <div class="col-sm-3 np col-xs-7">
                                <img src="<?php echo DOMAIN . 'default/contact/captcha'; ?>" class="captcha-img" />
                            </div>
                        </div>
                        */ ?>

                        <div class="uk-width-1-1">
                            <div class="uk-form-label contact-label">&nbsp;</div>
                            <div class="uk-form-controls contact-controls">
                                <input type="submit" name="sbm" class="btn btn-default btn-site" value="<?php echo $this->App->t('send'); ?>" />
                                <?php echo $this->App->adm_link('lang', 'send'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

            
        </div>
    </section>
</div>
<!-- end main index --> 

<div class="clearfix"></div>

<script type="text/javascript">
        $(document).ready(function(){
            $('.owl-carousel-main').owlCarousel({
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: false,
                // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
                loop:true,
                margin:0,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:1,
                        nav:false
                    },
                    1000:{
                        items:1,
                        nav:true,
                    }
                }
            })
            $('.owl-carousel-dmsp1').owlCarousel({
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: false,
                // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
                loop:true,
                margin:45,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    1000:{
                        items:3,
                        nav:true,
                    }
                }
            })
            $('.owl-carousel-dmsp2').owlCarousel({
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: false,
                // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
                loop:true,
                margin:45,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    1000:{
                        items:3,
                        nav:true,
                    }
                }
            })
            $('.owl-carousel-dmsp3').owlCarousel({
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: false,
                // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
                loop:true,
                margin:45,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:2,
                        nav:false
                    },
                    1000:{
                        items:3,
                        nav:true,
                    }
                }
            })
        })
    </script>
    




