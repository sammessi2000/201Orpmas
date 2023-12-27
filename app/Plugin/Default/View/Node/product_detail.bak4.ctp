<?php $bread_array = $this->App->breadarray($current_category); ?>

<section class="link-url">
    <div class="container">
        <div id="breadcrumb">
            <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                    <?php if($v['title'] != '') {  $i++; ?>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo $v['link']; ?>">
                                <span itemprop="name"><?php echo $v['title']; ?></span>
                            </a> 
                            <meta itemprop="position" content="<?php echo $i; ?>">
                        </li>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
            </ol>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="product-detail-n">
    <div class="container">
        <div class="top-detail-n bg-w">
            <h1 class="title-detail-n">
                <?php echo $this->App->t('title', $this->data['Node']); ?>
                <?php echo $this->App->adm_link('product', $this->data['Node']['id']); ?>
            </h1>

            <div class="clearfix"></div>
          	
            <div id="list-image_fancybox">
              <a class="fancybox" id="item-fancy_first" data-fancybox='gallery' href="<?php echo DOMAIN . $this->data['Product']['image']; ?>"></a>
            </div>

            <div class="top-detail-n-img">
                <div class="big-image-n" id="sync1">
                    <?php $i=0; foreach($this->data['images'] as $v) { $i++; if($i > 1) break; ?>
                    <a class="fancybox" rel="d1" href="<?php echo DOMAIN . $v['Image']['image']; ?>" title="" >
                        <img src="<?php echo DOMAIN . $v['Image']['image']; ?>" alt="<?php echo $this->data['Node']['title']; ?>" />
                    </a> 
                    <?php } ?>
                </div>

                <div class="img-thumb-n owl-carousel" id="sync2">
                    <?php foreach($this->data['images'] as $v) { ?>
                    <div class="item-n active">
                        <a href="<?php echo DOMAIN . $v['Image']['image']; ?>" class="fancybox" rel="d1">
                            <?php echo $this->App->img($v['Image']['image'], $this->data['Node']['title'], 100, 100); ?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
            </div>

            <div class="top-detail-n-content">
                <div class="header-dt">
                    <div class="dt-status hedt-ct">
                        Tình trạng: <span><?php echo $this->data['Product']['status'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?></span>
                    </div>
                    
                    <?php /*
                    <!-- <div class="dt-view hedt-ct">Lượt xem: <span>7743</span></div> -->
                    <div class="dt-rate hedt-ct">
                        <img src="https://hoanghapc.vn/template/oct2020/images/star_5.png" alt=""> <span>(4 đánh giá)</span>
                    </div>
                    */ ?>
                    <div class="fb-like" data-href="<?php echo DOMAIN . $this->data['Node']['slug']; ?>.html" data-width="136" data-layout="button" data-action="like" data-size="small" data-share="true"></div>
                </div>
                
                <?php /*
                <div class="pro-detail-config-group">
                    <div class="title-n">Tùy Chọn Sản Phẩm</div>
                    <div class="list-n">
                        <a href="https://hoanghapc.vn/hh-workstation-core-i9-9940x-32g-nvidia-gtx-1660-6gb-hoanghapc" style="order: 200">
                            <span class="pdcg-name line-clamp-1">32G | GTX 1660</span>
                            <span class="pdcg-price">39.600.000 đ<span class="pdcg-check "></span></span>
                        </a>
                        <a></a>
                    </div>
                </div>
                */ ?>
                
                
                <div class="detail-n-sumary">
                    <div class="title-n"><?php echo $this->App->t_a('thongsosp'); ?></div>
                    <div class="list-n">
                        <?php echo $this->data['Product']['description']; ?>
                    </div>
                </div>
                
                <div class="detail-n-warrantry">Bảo hành: <span><?php echo $this->data['Product']['baohanh']; ?> tháng</span></div>

                <div class="detail-n-all-price">
                    <?php if($this->data['Product']['price_off'] != 0) { ?>
                    <div class="detail-n-old-price">Giá bán: 
                        <span class="n-num"><?php echo number_format($this->data['Product']['price_off']); ?>đ</span>
                    </div>
                    <?php } ?>

                    <div class="detail-n-price">Giá khuyến mại: 
                        <span class="n-num"><?php echo number_format($this->data['Product']['price']); ?>đ</span> 
                        <?php if($this->data['Product']['price_off'] != '' && $this->data['Product']['price_off'] != 0) { ?>
                        <span class="n-disc">(Tiết kiệm: <?php echo $this->data['Product']['selloff']; ?>%)</span>
                        <?php } ?>
                    </div>
                </div>

                <div class="detail-offer-fix">
                    <?php
                        $list_km = trim($this->data['Product']['khuyenmai']) != '' ? explode("\n", $this->data['Product']['khuyenmai']) : array();
                    ?>
                    <?php if(count($list_km) > 0) { ?>
                    <?php foreach($list_km as $v) { ?>
                    <div class="item-n">
                        <span class="hot">Hot</span>
                        <span class="txt"><?php echo $v; ?></span>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                
                <div class="detail-n-buyNow">
                    <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $this->data['Node']['id']; ?>" class="buy-go-cart">
                        <span>Đặt mua ngay</span>
                        Giao hàng tận nơi nhanh chóng
                    </a>
                    <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $this->data['Node']['id']; ?>" class="buy-add-cart">
                        <span>Thêm vào giỏ hàng</span>
                        Thêm vào giỏ để chọn tiếp
                    </a>
                    <a href="<?php echo $this->App->t('buyhelp_link'); ?>" class="by-insta">
                        <span>Mua trả góp</span>
                        Thủ tục đơn giản
                    </a>
                    
                    <?php echo $this->App->adm_link('lang', 'buyhelp_link'); ?>
                </div>
            </div>
            <div class="top-detail-n-policy">
                <div class="detail-policy-ct">
                    <div class="title-n"><?php echo $this->App->t_a('muasptai'); ?></div>
                    <div class="list-n">
                    <?php echo $this->App->t_a('muasptai_content', 'editor'); ?>
                    </div>
                </div>
                <div class="phone-sale-detail">
                    <div class="title-n"><?php echo $this->App->t_a('support_online'); ?></div>
                    <div class="list-n">
                        <?php if(is_array($supports) && count($supports) > 0) { ?>
                        <?php foreach($supports as $v) { ?>
                        <div class="item-n">
                            <img class="" src="<?php echo DOMAIN . $v['Support']['image']; ?>" alt="zalo">
                            <span class="txt"><?php echo $v['Support']['title']; ?>: <b><?php echo $v['Support']['zalo']; ?></b></span>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<section class="detail-content-n-read">
    <div class="container">
        <div class="dcnr-left">
            <div class="box-content-read box-content-des bg-w">
                <h2 class="title-n"><?php echo $this->data['Node']['title']; ?></h2>
                <div class="list-n disaffter">
                    <div class="nd content-read">
                        <?php echo $this->data['Product']['content']; ?>
                    </div>
                    <div class="box-content-des-vm">
                        <a href="javascript:void(0)" onclick="showDetailDes()">Xem thêm</a>
                    </div>
                </div>
            </div>
    
        </div>
        <div class="dcnr-right">
            <div class="box-product-n-spec">
                <h2 class="title-n"><?php echo $this->App->t_a('thongsokt'); ?></h2>
                <div class="list-n nd">
                     <div class="tlqcontent">
                        <?php
                            $att1 = $lang != 'vi' ? 'att1_' . $lang : 'att1'; 
                            $att = $this->data['Product'][$att1];
                            $att_data=array();

                            if($att!= '' && $this->App->is_valid_json($att))
                            {
                                $att_data = json_decode($att);
                                $n = count($att_data);
                        ?>
                        <table>
                            <tbody>
                                <tr>
                                    <td style="text-align: center;"><strong>STT</strong></td>
                                    <td style="text-align: center;"><strong>Mặt hàng</strong></td>
                                    <td style="text-align: center;"><strong>Thông số</strong></td>
                                </tr>
                                <?php $i = 0; foreach($att_data as $att_v) { $i++; if($i > 9) break; ?>
                                <tr>
                                    <td style="text-align: center;"><strong><?php echo $i; ?></strong></td>
                                    <td style="text-align: center;"><strong><?php echo $att_v->ten; ?>: </strong></td>
                                    <td style="text-align: center;"><strong><?php echo $att_v->giatri; ?></strong></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                    </div>
                </div>

                <div class="box-product-n-spec-vm">
                    <a href="#full-spec" data-fancybox="spec" class="common-vm"><?php echo $this->App->t('viewfullspecs'); ?></a>
                    <?php echo $this->App->adm_link('lang', 'viewfullspecs'); ?>
                </div>

                <div id="full-spec" class="content-text" style="display:none;">
                    <div class="title-n"><?php echo $this->data['Node']['title']; ?></div>
                    <div class="list-n">
                        <div class="tlqcontent">
                            <table>
                                <tbody>
                                    <tr>
                                        <td style="text-align: center;"><strong>STT</strong></td>
                                        <td style="text-align: center;"><strong>Mặt hàng</strong></td>
                                        <td style="text-align: center;"><strong>Thông số</strong></td>
                                    </tr>
                                    <?php $i = 0; foreach($att_data as $att_v) { $i++; ?>
                                    <tr>
                                        <td style="text-align: center;"><strong><?php echo $i; ?></strong></td>
                                        <td style="text-align: center;"><strong><?php echo $att_v->ten; ?>: </strong></td>
                                        <td style="text-align: center;"><strong><?php echo $att_v->giatri; ?></strong></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="box-news-detail-relay">
                <div class="title-n"><?php echo $this->App->t_a('news'); ?></div>
                <div class="list-n">
                    <?php if(is_array($latest_news) && count($latest_news) > 0) { ?>
                    <?php foreach($latest_news as $v) { ?>
                    <div class="item-n">
                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="nn-img">
                            <img class="lazy" data-src="<?php echo $this->App->img_src($v['News']['image'], 150, 100); ?>" alt="<?php echo $v['Node']['title']; ?>">
                        </a>
                        <div class="nn-info">
                            <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="nn-name line-clamp-2">
                                <?php echo $v['Node']['title']; ?>
                            </a>
                            <div class="nn-sum line-clamp-2">
                                <?php echo $this->App->word_limiter($v['News']['description'], 11); ?>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="tab-pro-detail">
    <div class="container">
        <div class="bg-w">
            <div class="title-tab-dt">
                <ul class="title-tab-ct">
                    <li class="active">
                        <a data-toggle="tab" href="javascript:;" data-id="#samecat" class="active"><?php echo $this->App->t('related_product'); ?></a>
                        <?php echo $this->App->adm_link('lang', 'related_product'); ?>
                    </li>
                    <?php /*
                    <li class=""><a data-toggle="tab" href="javascript:;" data-id="#proviewed" class="pro-viewed-n">Sản phẩm đã xem</a></li>
                    */ ?>
                </ul>
            </div>

            <div class=" product-list realated">
                <div id="samecat" class="tab-list fade in active show">
                    <?php if(is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
                    <div class="owl-carousel style-owl">
                        <?php 
                            foreach($this->data['related'] as $v) 
                            {
                                echo view::element('product-item', array('product'=>$v));
                            }
                        ?>   
                    </div>
                    <?php } ?>
                </div>
                <?php /*
                <div id="proviewed" class="tab-list slider-owl fade in show">
                </div>
                */ ?>
            </div>
        </div>
    </div>
</section>

<script>
    $('.fancybox').fancybox();
    $("a.common-vm").fancybox({
		'titlePosition'		: 'inside',
		'transitionIn'		: 'none',
		'transitionOut'		: 'none'
	});

    function showDetailDes(){
        if($(".box-content-read.box-content-des .list-n .content-read").height() > 1000){
            $(".box-content-read.box-content-des .list-n .box-content-des-vm").show();
            $(".box-content-read.box-content-des .list-n").removeClass("disaffter")
        }
        $(".box-content-read.box-content-des .list-n .box-content-des-vm a").click(function(){
            $(this).toggleClass("active");
            $(".box-content-read.box-content-des .list-n").toggleClass("active");
            if($(this).hasClass("active")){
                $(this).html("Thu gọn");
            }else {
                $(this).html("Xem thêm");
            }
        })
    }

    showDetailDes();
  
</script>