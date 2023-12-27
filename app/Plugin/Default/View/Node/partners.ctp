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
                    <?php if($v['title'] != '') { ?>
                    <li class="breadcrumb-item <?php //if($i==$n) echo 'li-last'; ?>"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <?php } ?>
                    <li class="breadcrumb-item li-last"><?php echo $this->App->t('partners'); ?></li>
                    <?php } ?>
                </ol>
            </nav>
        </div>
    </div>


     <section class="index-pdmsp list-products partners">
        <div class="container carousel-dmsp1 list-dmsp">
          <div class="d-flex flex-wrap align-items-center justify-content-between tt">
                    <span class="text-uppercase"><?php echo $this->App->t_a('partners'); ?></span>
                </div>

        <div class="row">
            <?php foreach($data as $v) { ?>
            <div class="col-sm-6">
                <div class="partner-img">
                    <figure>
                        <div class="hovereffect">
                            <a href="#" title="" onclick="return false;">
                                <?php echo $this->App->img($v['Hangxe']['image'], '', 0, 67); ?>
                                <div class="overlay"></div>
                            </a>
                        </div>
                    </figure>
                </div>

                <div class="partner-info">
                    <div class="txt">
                        <p class="name">
                            <a href="#" title="" onclick="return false;">
                            <?php echo $this->App->t('title', $v['Hangxe']); ?>
                            </a>
                        </p>
                        <p class="des">
                            <?php echo $this->App->t('description', $v['Hangxe']); ?>
                        </p>
                        <p class="link">
                            <?php echo $v['Hangxe']['website']; ?>
                        </p>
                      
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
        </div>
    </section>

<!-- 
    <section class="sec-hlh p-sp">
        <?php //echo View::element('support'); ?>
    </section> -->
</div>
<!-- end main index --> 


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
    