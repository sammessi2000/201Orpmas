<?php $bread_array = $this->App->breadarray($current_category); ?>

<?php 
    $hotline = $this->App->t('hotline');
    $hotline_number = preg_replace('/[^0-9]/', '', $hotline);

    $hotline2 = $this->App->t('company_phone');
    $hotline2_number = preg_replace('/[^0-9]/', '', $hotline2);
?>

<div class="archive" id="breadcrumb">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                 <div class="block-breadcrumb-mb">
                    <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                        <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                        <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                        <?php if($v['title'] != '') {  $i++; ?>
                            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                <a itemprop="item" href="<?php echo $v['link']; ?>">
                                    <span itemprop="name"><?php echo $v['title']; ?></span>
                                </a> 
                                <i class="fa fa-angle-right"></i>
                                <meta itemprop="position" content="<?php echo $i; ?>">
                            </li>
                        <?php } ?>
                        <?php } ?>
                        <li class="breadcrumb-item li-last"><?php echo $this->App->t('contact'); ?></li>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main contact">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-news-title hr-red">
                    <span><?php echo $this->App->t_a('contact'); ?></span>
                </div>

                 <form action="<?php echo DOMAIN; ?>default/contact" method="post" class="uk-form-horizontal frmcontact">   

            <div class="frmcontact-body">
                <div class="left">
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
                                <i class="fa fa-envelope"></i>
                                <?php echo $this->App->t_a('company_email'); ?>
                            </li>
                        </ul>
                </div>

                <div class="right">
                    <div class="form-title">
                        <?php echo $this->App->t_a('form_title'); ?>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contact-item contact-item-full">
                                <div class="contact-label">
                                    <?php echo $this->App->t('fullname'); ?>
                                    <?php echo $this->App->adm_link('lang', 'fullname'); ?>
                                    <span>*</span>
                                </div>
                                <div class="contact-field">
                                    <input type="text" name="fullname" class="uk-input" placeholder="<?php //echo $this->App->t('fullname'); ?>" required="required" />
                                </div>
                            </div>


                            <div class="contact-item contact-item-full">
                                <div class="contact-label">
                                    Email
                                    <span>*</span>
                                </div>
                                <div class="contact-field">
                                    <input type="text" name="email" class="uk-input" placeholder="" required="required" />
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">

                            <div class="contact-item contact-item-full">
                                <div class="contact-label">
                                    <?php echo $this->App->t('content'); ?>
                                    <?php echo $this->App->adm_link('lang', 'content'); ?>
                                </div>
                                <div class="contact-field">
                                    <textarea class="uk-input" name="content" rows="6" cols="12" placeholder="<?php //echo $this->App->t('content'); ?>" required="required"></textarea>
                                </div>
                            </div>

                            <div class="contact-item contact-item-btn">
                                <div class="contact-field">
                                    <input type="submit" name="sbm" class="btn btn-default btn-site" value="<?php echo $this->App->t('send'); ?>" />
                                    <?php echo $this->App->adm_link('lang', 'send'); ?>
                                </div>
                            </div>
                        </div>

                       


                </div>
            </div>
        </form>

            </div>


            <div class="row">
            <div class="col-sm-12">
                <div class="google-map">
                    <?php echo $settings['google_map']; ?>
                </div>
            </div>
            </div>



        </div>
    </div>
</div>

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
    




