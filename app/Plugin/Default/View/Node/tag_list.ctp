<?php $bread_array = $this->App->breadarray($current_category); ?>

<?php echo View::element('slider-owl'); ?>
<?php 
// pr($this->data);
?>

<!-- main index -->
<div class="main-index page-dmsp">
    <div class="bo-breadcrumb">
        <div class="container">
        <?php 
        if(is_array($this->data) && count($this->data) > 0) 
        { ?>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <?php if(is_array($bread_array) && count($bread_array)>0) { ?>
                    <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { $i++; ?>
                    <li class="breadcrumb-item <?php //if($i==$n) echo 'li-last'; ?>"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <li class="breadcrumb-item li-last"><?php echo $this->App->t('title', $tags['Node']); ?></li>
                    <?php } ?>
                </ol>
            </nav>
            <?php } ?>
        </div>
    </div>



<section class="index-pdmsp list-products">
        <div class="container carousel-dmsp1">
                <div class="owl-stage-outer row">
                    <?php foreach($this->data as $v) { ?>

                    <?php 
                        $tbl = 'News';
                        if($v['Node']['type'] == 'product')
                            $tbl = 'Product';
                    ?>
                    <div class="col-sm-4 owl-item">
                        <figure>
                            <div class="hovereffect">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                    <?php echo $this->App->img($v[$tbl]['image'], '', 600, 424); ?>
                                    <div class="overlay"></div>
                                </a>
                            </div>
                        </figure>
                        <div class="txt">
                            <p class="name">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                <?php echo $this->App->t('title', $v['Node']); ?>
                                </a>
                            </p>
                            <p class="des">
                                <?php echo $this->App->t('description', $v[$tbl]); ?>
                            </p>
                            <div class="sptb-xct">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title=""><?php echo $this->App->t('readmore'); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>

            
        </div>
    </section>

    <?php 
    // pr($this->data);
    //     if(is_array($this->data) && count($this->data) > 0) 
    //     {
    //         echo View::element('news_list_no_child', array('data'=>$this->data));
    //     }
    ?>


    <section class="sec-hlh p-sp">
        <?php echo View::element('support'); ?>
    </section>
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
    