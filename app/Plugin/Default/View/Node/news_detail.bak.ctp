<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
// pr($agencies);
// pr($hangs);
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

        <section class="index-pdetailsp">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">
                        <div class="name-dtpro">
                            <?php echo $this->App->t('title', $this->data['Node']); ?>
                            <?php echo $this->App->adm_link('product', $this->data['Node']['id']); ?>
                        </div>

                   
                        <?php
                            $tag_list = $this->requestAction('/default/node/get_tag_from_post_node_id/' . $this->data['Node']['id']);
                            // pr($tag_list);
                        ?>

                        <?php if(is_array($tag_list) && count($tag_list) > 0) { ?>
                         <div class="tag-list">
                            <span class="fa fa-tags fa-rotate-90"></span>
                            <span class="keytxt"><?php echo $this->App->t_a('key'); ?> :</span>
                            <?php foreach($tag_list as $t) { ?>
                            <a href="<?php echo DOMAIN; ?>tags/<?php echo $t['Node']['slug']; ?>.html">
                                <?php echo $this->App->t('title', $t['Node']); ?>
                            </a>
                            <?php } ?>
                         </div>
                        <?php } ?>
                        

                        <p class="tags-dtpro"></p>
                            <div class="content-dtpro">
                                <?php echo $this->App->t('content', $this->data['News']); ?>
                            </div>
                        <div class="comment">
                            <div class="tt-comment">
                                <?php echo $this->App->t_a('hvnx'); ?>
                            </div>
                            <div class="fb-comments" data-href="<?php echo DOMAIN . $this->data['Node']['slug']; ?>.html" data-width="100%" data-numposts="5"></div>
                        </div>
                        <div class="splquan">
                            <div class="tt-SPLQ">
                                <?php echo $this->App->t_a('related-product'); ?>
                            </div>
                            <div class="owl-carousel owl-carousel-splq carousel-dmsp1">
                                <?php if(is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
                                <?php foreach($this->data['related'] as $v) { ?>
                                <div>
                                    <figure>
                                        <div class="hovereffect">
                                            <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                                <img src="<?php echo DOMAIN . $v['News']['image']; ?>" alt="">
                                            </a>
                                            <div class="overlay"></div>
                                        </div>
                                    </figure>
                                    <div class="txt">
                                        <p class="name">
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                            <?php echo $this->App->t('title', $v['Node']); ?>
                                            </a>
                                        </p>
                                        <p class="des">
                                            <?php echo $this->App->t('description', $v['News']); ?>
                                        </p>
                                        <div class="sptb-xct">
                                            <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title=""><?php echo $this->App->t('readmore'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="box-l-r">
                            <div class="box-l-r1">
                                <?php if(isset($banners['news-detail'])) { ?>
                                <?php foreach($banners['news-detail'] as $bn) { ?>
                                <a href="<?php echo $bn['Banner']['link']; ?>" title="">
                                    <img src="<?php echo DOMAIN . $bn['Banner']['image']; ?>" alt="">
                                </a>
                                <?php }} ?>
                            </div>
                            <div class="r-dhtt">
                                <a href="<?php echo DOMAIN; ?>contact" title="" class="btnprint">
                                    <img src="<?php echo TEMPLATE_PATH; ?>images/print_03.png" alt="">
                                    ĐẶT HÀNG TRỰC TUYẾN
                                </a>
                            </div>
                            <div class="box-l-r1 mt-0">
                                <div class="text-uppercase tt1">                                    
                                    <?php echo $this->App->t_a('dvinan'); ?>                                    
                                </div>
                                <div class="r-tags">
                                     <?php 
                                        $tags = $lang == 'vi' ? $settings['tag_1_vi'] : $settings['tag_1_en'];
                                        $tags = explode(',', $tags);

                                        $tags_lnk = array();

                                        if(count($tags) > 0) 
                                        {
                                            foreach($tags as $v)
                                            {
                                                $v = trim($v);
                                                $vslug = strtolower(Inflector::slug($v, '-'));
                                                $tags_lnk[$vslug] = $v;
                                            }
                                        }
                                    ?>

                                    <?php if(count($tags_lnk) > 0) { ?>
                                    <?php foreach($tags_lnk as $k=>$v) { ?>
                                    <a href="<?php echo DOMAIN . 'tags/' . $k; ?>.html" title=""><?php echo $v; ?></a>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="box-l-r1">
                                <div class="text-uppercase tt1">                                    
                                    <?php echo $this->App->t_a('bginan'); ?>
                                </div>
                                <div class="r-tags">
                                     <?php 
                                        $tags = $lang == 'vi' ? $settings['tag_2_vi'] : $settings['tag_2_en'];
                                        $tags = explode(',', $tags);

                                        $tags_lnk = array();

                                        if(count($tags) > 0) 
                                        {
                                            foreach($tags as $v)
                                            {
                                                $v = trim($v);
                                                $vslug = strtolower(Inflector::slug($v, '-'));
                                                $tags_lnk[$vslug] = $v;
                                            }
                                        }
                                    ?>

                                    <?php if(count($tags_lnk) > 0) { ?>
                                    <?php foreach($tags_lnk as $k=>$v) { ?>
                                    <a href="<?php echo DOMAIN . 'tags/' . $k; ?>.html" title=""><?php echo $v; ?></a>
                                    <?php } ?>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- banner -->
                <div class="banner-dmsp mt-0">
                    <?php if(isset($banners['product-detail'])) { ?>
                    <?php foreach($banners['product-detail'] as $bn) { ?>
                    <a href="<?php echo $bn['Banner']['link']; ?>" title="">
                        <img src="<?php echo DOMAIN . $bn['Banner']['image']; ?>" alt="">
                    </a>
                    <?php }} ?>
                </div>
            </div>
        </section>
        <section class="sec-hlh p-sp">
            <?php echo View::element('support'); ?>
        </section>
    </div>
    <!-- end main index -->


<script type="text/javascript">
        $(document).ready(function(){
            $('.owl-carousel-bnn-dt-sp').owlCarousel({
                autoplay: false,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: false,
                navText: ["<img src='<?php echo TEMPLATE_PATH; ?>images/back2_03.png'>","<img src='<?php echo TEMPLATE_PATH; ?>images/next2_03.png'>"],
                loop:true,
                margin:1,
                autoWidth:true,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:2,
                        nav:true
                    },
                    600:{
                        items:3,
                        nav:false
                    },
                    1000:{
                        items:4,
                        nav:true,
                    }
                }
            })
            $('.owl-carousel-splq').owlCarousel({
                autoplay: false,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: false,
                navText: ["<img src='<?php echo TEMPLATE_PATH; ?>images/nav_07.jpg'>","<img src='<?php echo TEMPLATE_PATH; ?>images/nav_09.jpg'>"],
                loop:true,
                margin:35,
                responsiveClass:true,
                responsive:{
                    0:{
                        items:1,
                        nav:true
                    },
                    600:{
                        items:3,
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

<?php /*
<div class="conten">

<div class="pagewrap">
<div class="product-detail">
  <div class="leftBox" id="proView">
    <div class="viewLeft">
      <div id="pro_img_main">

          <div id="bridal_images"> 
            <div id="wrap">
            <?php $imgs = DOMAIN . $this->data['News']['image']; ?>
            <a href="<?php echo $imgs; ?>" class="cloud-zoom" id="zoom1" rel="position: 'inside' , showTitle: false, adjustX:0, adjustY:0">
            <img src="<?php echo $imgs; ?>" style="display: block;"></a>
            <div class="mousetrap" style="background-image: url(&quot;.&quot;); z-index: 999; position: absolute; width: 420px; height: 315px; left: 0px; top: 0px; cursor: move;"></div>
            </div> 

          </div>

          <div id="bridal_images_list">
            <div class="caroufredsel_wrapper">
            <ul id="pro_img_slide">
            <?php foreach($this->data['images'] as $img) { ?>
                <li>
                    <?php $imgs = DOMAIN . $img['Image']['image']; ?>
                    <a href="<?php echo DOMAIN . $img['Image']['image']; ?>" title="" class="cloud-zoom-gallery" rel="useZoom: 'zoom1', smallImage: '<?php echo $imgs; ?>'">
                    <img src="<?php echo DOMAIN . $img['Image']['image']; ?>" alt="">
                    </a>
                </li>
            <?php } ?>
            </ul>
            </div>

            <a class="pro_slide_prev hidden disabled" id="pro_slide_prev" href="#" style="display: none;"><span> &lt; </span></a> 
            <a class="pro_slide_next hidden" id="pro_slide_next" href="#" style="display: none;"><span> &gt; </span></a> 
            </div>


        </div>
    </div>
    <!--end viewLeft-->
    <div class="viewRight">
      <div class="titleView"><?php echo $this->App->t('title', $this->data['Node']); ?><?php echo $this->App->adm_link('product', $this->data['Node']['id']); ?></div>
      <h1>Giá bán: <?php echo $this->data['News']['price'] > 0 ? number_format($this->data['News']['price']) : 'Liên hệ'; ?>  ₫ </h1>
      <div class="desc">
        <?php echo $this->App->t('description', $this->data['News']); ?>
      </div>
      <div class="clr"></div>
      <div id="sharelink"> 
        <!-- AddThis Button BEGIN -->
        <div class="addthis_toolbox addthis_default_style "> 
            <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a> 
            <a class="addthis_button_tweet"></a> <a class="addthis_button_google_plusone" g:plusone:size="medium"></a> 
            <a class="addthis_counter addthis_pill_style"></a> 
        </div>
        <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5740e90a25c372d1"></script>
        <!-- AddThis Button END --> 
      </div>

      <form action="#" method="post" name="orderform" id="orderform">
          <div class="quantity">
            <p>Chọn mua</p>
            <label>Số lượng:</label>
            <input type="button" class="minus" value="-">
            <input class="input-text qty text" title="Qty" size="4" value="1" name="quantity" id="quantity" max="50" min="1" step="1">
            <input type="button" class="plus" value="+">

            <a href="javascript:" onclick="add_to_cart2(<?php echo $this->data['Node']['id']; ?>)" style="cursor:pointer">Mua hàng</a> 
            <div class="clr"></div>
            </div>
        </form>
      <div class="clr"></div>
    </div>
    <div class="gianhanggoiy_id desktop">
      <h1>Sản phẩm gợi ý</h1>
      <div class="product_list">
      <?php if(is_array($featured_products) && count($featured_products) > 0) { ?>
    <?php $i= 0; foreach($featured_products as $v) { $i++; ?>
    <?php if($i==1) continue; ?>
    <?php if($i>3) break; ?>
    <?php echo View::element('product-item', array('data'=>$v)); ?>
    <?php } ?>
    <?php } ?>
                  <div class="clr"></div>
      </div>
      
    </div>
    <div class="clr"></div>
  </div>
  <div id="pro_tabs">
    <ul class="listtabs">
      <li><a href="#tab1" class="selected">+ Mô tả chi tiết</a></li>
    </ul>
    <div id="tab1" class="tabs" style="display: block;">
      <div id="tabs_content" class="showText">
          <?php echo $this->App->t('content', $this->data['News']); ?>
      </div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="box_id">
    <div class="title_page_home">
      <h2>Sản phẩm cùng loại</h2>
     
      <div class="clr"></div>
    </div>
    <div class="placeSlide_main">
      <div class="placeSlide_with">
        <div class="product_list">
             
        <?php if(is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
        <?php foreach($this->data['related'] as $v) { ?>
        <?php echo View::element('product-item', array('v'=>$v)); ?>
        <?php } ?>
        <?php } ?>

        <div class="clr"></div>
        </div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
</div>
</div>

    </div>


<script type="text/javascript"> 
    $("#pro_tabs ul").idTabs(); 
</script>

<script type="text/javascript">
    jQuery(document).ready(function(){
        $("#pro_img_slide").carouFredSel({
            circular: false,
            infinite: false,
            auto    : false,
            scroll  : {
                items   : "page",
            },
            prev    : { 
                button  : "#pro_slide_prev",
                key     : "left"
            },
            next    : { 
                button  : "#pro_slide_next",
                key     : "right"
            }
        });
    });
</script> 


<script type="text/javascript">
    function add_to_cart2(id)
    {
        var q = $('#quantity').val();
        var l = "<?php echo DOMAIN; ?>cart/add/?id=" + id + '&quantity=' + q;
        document.location.href = l;
    }
</script>
*/ ?>