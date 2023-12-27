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
                    <li class="breadcrumb-item li-last">Gallery</li>
                    <?php } ?>
                </ol>
            </nav>
        </div>
    </div>



    <section class="index-pdmsp list-products list-gallery">
        <div class="container carousel-dmsp1">
            <div class=" row">
                <?php $i=0; foreach($this->data as $k=>$gallery) { $i++; ?>
                <div class="col-sm-12 gallery-head <?php if($i > 1) echo 'gallery-2'; ?>">
                <div>
                    <?php 
                        $bst_arr = explode('---', $k);
                    ?>
                    <a href="<?php echo DOMAIN; ?>gallery-detail/<?php echo $bst_arr[1]; ?>" style="float: left; border: none;">
                    <b><?php echo $bst_arr[0]; ?></b>
                    </a>
                    <a href="<?php echo DOMAIN; ?>gallery-detail/<?php echo $bst_arr[1]; ?>" >
                        <?php echo $this->App->t_a('xtca'); ?>
                    </a>
                </div>
                </div>

                <?php $i=0; foreach($gallery as $v) { $i++; ?>
                <?php if($i > 6) break; ?>
                <div class="col-sm-4">
                    <figure>
                        <div class="hovereffect">
                            <a href="<?php echo DOMAIN . $v['Banner']['image']; ?>" title="" class="fancybox" rel="gallery">
                                <?php echo $this->App->img($v['Banner']['image'], '', 600, 424); ?>
                                <div class="overlay"></div>
                            </a>
                        </div>
                    </figure>
                    <div class="name">
                        <a href="<?php echo DOMAIN . $v['Banner']['image']; ?>" title="" class="fancybox" rel="gallery">
                        <?php echo $this->App->t('title', $v['Banner']); ?>
                        </a>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>
                <?php } ?>
            </div>            
        </div>
    </section>



    <section class="sec-hlh p-sp">
        <?php echo View::element('support'); ?>
    </section>
</div>
<!-- end main index --> 


<script type="text/javascript">
    $('.fancybox').fancybox();

        // $(document).ready(function(){
        //     $('.owl-carousel-main').owlCarousel({
        //         autoplay: true,
        //         autoplayTimeout: 4000,
        //         autoplayHoverPause: true,
        //         nav: false,
        //         // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
        //         loop:true,
        //         margin:0,
        //         responsiveClass:true,
        //         responsive:{
        //             0:{
        //                 items:1,
        //                 nav:true
        //             },
        //             600:{
        //                 items:1,
        //                 nav:false
        //             },
        //             1000:{
        //                 items:1,
        //                 nav:true,
        //             }
        //         }
        //     })
        //     $('.owl-carousel-dmsp1').owlCarousel({
        //         autoplay: true,
        //         autoplayTimeout: 4000,
        //         autoplayHoverPause: true,
        //         nav: false,
        //         // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
        //         loop:true,
        //         margin:45,
        //         responsiveClass:true,
        //         responsive:{
        //             0:{
        //                 items:1,
        //                 nav:true
        //             },
        //             600:{
        //                 items:2,
        //                 nav:false
        //             },
        //             1000:{
        //                 items:3,
        //                 nav:true,
        //             }
        //         }
        //     })
        //     $('.owl-carousel-dmsp2').owlCarousel({
        //         autoplay: true,
        //         autoplayTimeout: 4000,
        //         autoplayHoverPause: true,
        //         nav: false,
        //         // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
        //         loop:true,
        //         margin:45,
        //         responsiveClass:true,
        //         responsive:{
        //             0:{
        //                 items:1,
        //                 nav:true
        //             },
        //             600:{
        //                 items:2,
        //                 nav:false
        //             },
        //             1000:{
        //                 items:3,
        //                 nav:true,
        //             }
        //         }
        //     })
        //     $('.owl-carousel-dmsp3').owlCarousel({
        //         autoplay: true,
        //         autoplayTimeout: 4000,
        //         autoplayHoverPause: true,
        //         nav: false,
        //         // navText: ["<img src='images/prev.png'>","<img src='images/next.png'>"],
        //         loop:true,
        //         margin:45,
        //         responsiveClass:true,
        //         responsive:{
        //             0:{
        //                 items:1,
        //                 nav:true
        //             },
        //             600:{
        //                 items:2,
        //                 nav:false
        //             },
        //             1000:{
        //                 items:3,
        //                 nav:true,
        //             }
        //         }
        //     })
        // })
    </script>
    