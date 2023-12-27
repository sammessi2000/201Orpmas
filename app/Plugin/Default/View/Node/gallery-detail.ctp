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
                <div class="col-sm-12 gallery-head">
                <div>
              
                    <b><?php echo $this->App->t('title', $detail['Bosuutap']); ?></b>
                 
                </div>
                </div>

                <?php $i=0; foreach($this->data as $v) { $i++; ?>
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
            </div>   

            

        </div>
    </section>



<div class="container albumlq">
<div class="row">     
                <?php //if($is_mobile == 0) { ?>
                <div class="col-sm-12">
                    <div class="tt-SPLQ">
                        <?php echo $this->App->t_a('related-album'); ?>
                    </div>
                </div>

                <div class="col-sm-12" style="position: relative;">
                    <div class="owl-carousel owl-carousel-splq carousel-dmsp1">
                        <?php $i=0; foreach($bst as $v) { $i++; ?>
                        <div>
                            <figure>
                                <div class="hovereffect">
                                    <a href="<?php echo DOMAIN . $v['Bosuutap']['image']; ?>" title="" class="fancybox" rel="gallery">
                                        <?php echo $this->App->img($v['Bosuutap']['image'], '', 600, 424); ?>
                                        <div class="overlay"></div>
                                    </a>
                                </div>
                            </figure>
                            <div class="name">
                                <a href="<?php echo DOMAIN . $v['Bosuutap']['image']; ?>" title="" class="fancybox" rel="gallery">
                                <?php echo $this->App->t('title', $v['Bosuutap']); ?>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php //} ?>
            </div>
            </div>

    <section class="sec-hlh p-sp">
        <?php echo View::element('support'); ?>
    </section>
</div>
<!-- end main index --> 


<script type="text/javascript">
    $('.fancybox').fancybox();
$('.owl-carousel-splq').owlCarousel({
            autoplay: true,
            autoplayTimeout: 4000,
            autoplayHoverPause: true,
            nav: false,
            // navText: ["<img src='<?php echo TEMPLATE_PATH; ?>images/nav_07.jpg'>","<img src='<?php echo TEMPLATE_PATH; ?>images/nav_09.jpg'>"],
            loop:false,
            margin:15,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                    nav:false
                },
                600:{
                    items:3,
                    nav:false
                },
                1000:{
                    items:3,
                    nav:false,
                }
            }
        })


    </script>
    