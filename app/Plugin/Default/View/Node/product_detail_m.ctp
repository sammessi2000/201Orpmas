<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
// die;
?>
<div id="body_content">
    <div class="page_path">
        <div class="block-breadcrumb-mb">
            <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                    <?php if($v['title'] != '') {  $i++; ?>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo $v['link']; ?>">
                                <span itemprop="name"><?php echo $v['title']; ?></span>
                            </a> 
                            <?php if($i < $n) echo '<i class="fa fa-angle-right" aria-hidden="true"></i>'; ?>
                            <meta itemprop="position" content="<?php echo $i; ?>">
                        </li>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
            </ol>
        </div>
    </div>


    <div class="block-slide-product" style="overflow: hidden">
        <div class="owl-carousel">
            <?php foreach($this->data['images'] as $v) { ?>
            <div>
                <a href="<?php echo DOMAIN . $v['Image']['image']; ?>" class="fancybox" rel="d1">
                    <?php echo $this->App->img($v['Image']['image'], $this->data['Node']['title'], 800, 800); ?>
                </a>
            </div>
            <?php } ?>
        </div>
    </div>

    <div class="block-product-detail">
        <div class="product-name"><?php echo $this->App->t('title', $this->data['Node']); ?></div>
        <div class="check-pr">
            <div class="status-pr">Tình trạng: 
                <span class="text-blue fw-700"><?php echo $this->data['Product']['status'] == 1 ? 'Còn hàng' : 'Hết hàng'; ?></span>
            </div>
        </div>
        <div class="price-guarantee">
            <div class="price-pr">
                <div>
                <span>Giá bán: </span>
                <span class="f-16 fw-700 text-red pr-8px js-quety-new">
                    <?php echo number_format($this->data['Product']['price']); ?>đ
                    </span>
                </div>
                
                <div>
                    <?php if($this->data['Product']['price_off'] != '' && $this->data['Product']['price_off'] != 0) { ?>
                    <span class="pr-8px">Giá thị trường: </span>
                    <span class="price-old pr-8px fw-700 js-quety-old"><?php echo number_format($this->data['Product']['price_off']); ?> đ</span>
                    <span class="js-quety-result">( Tiết kiệm <?php echo $this->data['Product']['selloff']; ?>%)</span>
                    <?php } ?>
                </div>
                
            </div>
            <div class="guarantee-pr ">
                Bảo hành: <?php echo $this->data['Product']['baohanh']; ?> tháng
            </div>
        
        
        </div>
        <div class="hotnews-pr">
            <?php
                $list_km = trim($this->data['Product']['khuyenmai']) != '' ? explode("\n", $this->data['Product']['khuyenmai']) : array();
            ?>
            <?php if(count($list_km) > 0) { ?>
            <?php foreach($list_km as $v) { ?>
            <a href="#" rel="nofollow" onclick="return false;"><span>HOT</span><?php echo $v; ?></a>
            <?php } ?>
            <?php } ?>
        </div>
    </div>

    <div class="clear_fix"></div>

    <div class="block-specifications">
        <div class="block-discount__title title-label-mb"><?php echo $this->App->t('thongsokt'); ?></div>  
        <div class="info_thongso"> 
            <div id="tskt" class="nd">
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
        </div>
    </div>


    <div class="block-introduction-pr">
        <div class="block-introduction-pr__title title-label-mb">Giới thiệu sản phẩm</div>
        <div class="block-introduction-pr__content nd" style="font-size: 14px">
        <?php echo $this->data['Product']['content']; ?>
        </div>	
        <div class="btn-toggle-content js-hide-content jsToggleContent"><span>Xem thêm</span></div>
    </div>

    <div class="clear_fix">
        <div class="nav-purchase">
            <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $this->data['Node']['id']; ?>" class="purchase-item">
                <span class="icon-purchase">
                    <img class="lazy" alt="" src="<?php echo DOMAIN; ?>theme/default/img/icon_Cart_q_20.png" style="display: block;">
                </span>
                <span class="title-purchase">Thêm vào giỏ hàng</span>
            </a>
            <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $this->data['Node']['id']; ?>" class="purchase-item">
                <span class="icon-purchase">
                    <img class="lazy" alt="" src="<?php echo DOMAIN; ?>theme/default/img/la_money-bill-alt_q_20.png" style="display: block;">
                </span>
                <span class="title-purchase">Mua ngay</span>
            </a>
            <a href="<?php echo $this->App->t('buyhelp_link'); ?>" class="purchase-item">
                <span class="icon-purchase">
                    <img class="lazy" alt="" src="<?php echo DOMAIN; ?>theme/default/img/ri_money-dollar-circle-line_q_20.png" style="display: block;">
                </span>
                <span class="title-purchase">Trả góp</span>
            </a>
        </div>
    </div>
                  
    <div class="clear_fix"></div>
</div>


<script>
    $('.block-slide-product .owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: false,
        dots: true,
        items: 1,
        autoplay: false,
        autoplayTimeout: 3000,
        lazyLoad: true,
        navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>']
    });

    $('.jsToggleContent').click(function(){
			var heightContainer = $(".block-introduction-pr").height();
            if(heightContainer == 700){
                $(".block-introduction-pr").css({"height": "max-content"})
                $(".jsToggleContent").removeClass('js-hide-content')
                $(".jsToggleContent").html("<span>Đóng lại</span>")
            }else{
                $(".block-introduction-pr").css({"height": "700px"})
                $(".jsToggleContent").addClass('js-hide-content')
                $(".jsToggleContent").html("<span>Xem thêm</span>")
            }
        })
</script>