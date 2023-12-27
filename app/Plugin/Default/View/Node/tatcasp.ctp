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
                    <li class="breadcrumb-item <?php if($i==$n) echo 'li-last'; ?>"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ol>
            </nav>
        </div>
    </div>


    <?php
        $products = $this->data;
    ?>
    <section class="thdct">
        <div class="container">
            <div class="row">
                <?php if(is_array($products) && count($products) > 0) { ?>
                <?php $i=0; foreach($products as $v) { $i++; ?>
                <?php if($i>1) break; ?>
                <div class="col-lg-7">
                    <div class="l-thdct">
                    	<div class="hovereffect">
								<?php echo $this->App->img($v['Product']['image'], '', 600, 424); ?>
	                        <div class="overlay"></div>
                        </div>
                        <div class="box-lg-txt">
                            <p class="name">
                            	<a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                <?php echo $this->App->t('title', $v['Node']); ?>
                                </a>
                            </p>
                            <div class="des">
                                 <?php echo $this->App->t('description', $v['Product']); ?>
                            </div>
                            <div class="sptb-xct">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title=""><?php echo $this->App->t('readmore'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>

                <div class="col-lg-5">
                    <ul class="ul-lthdct">
                        <?php if(is_array($products) && count($products) > 0) { ?>
                        <?php $i=0; foreach($products as $v) { $i++; ?>
                        <?php if($i<=1) continue; ?>
                        <?php if($i > 3) break; ?>
                        <li class="d-flex">
                            <div class="psing-img">
                            <div class="hovereffect">
								<?php echo $this->App->img($v['Product']['image'], '', 600, 424); ?>
		                        <div class="overlay"></div>                        
                            </div>
                            </div>
                            <div class="txt-smal">
                                <div class="name-smal">
                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                    <?php echo $this->App->t('title', $v['Node']); ?>
                                    </a>
                                </div>
                                <div class="des-smal">
                                    <?php echo $this->App->t('description', $v['Product']); ?>
                                </div>
                                <div class="sptb-xct">
                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title=""><?php echo $this->App->t('readmore'); ?></a>
                                </div>
                            </div>
                        </li>
                        <?php } ?>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>




	<?php
    // $child = $this->requestAction('/default/node/get_child_category_of/' . $v['Category']['id']);
    $child = $this->requestAction('/default/node/get_child_category_of/' . $categories_dropdown[0]['Category']['id']);

    if(is_array($child) && count($child) > 0) { ?>

   	<?php echo View::element('product_list_has_child', array('child'=>$child)); ?>

    <?php } else { ?>

    <?php echo View::element('product_list_no_child', array('data'=>$this->data)); ?>

    <?php }  ?>






    <?php

     // echo View::element('product_list_no_child_tatcasp', array('data'=>$this->data)); ?>



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
	