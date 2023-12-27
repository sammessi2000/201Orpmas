<div class="container-fluid page-banner hidden-xs">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
            <?php if(isset($banners['page'])) { ?>
                <?php foreach($banners['page'] as $v) { ?>
                    <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" alt="<?php echo $v['Banner']['title']; ?>" />
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php $max = (isset($is_mobile) && $is_mobile == 1) ? 2 : 5; ?>

<?php $bread_array = $this->App->breadarray($current_category); ?>
<div class="container-fluid bread">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <?php if(is_array($bread_array) && count($bread_array)>0) { ?>
                    <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { $i++; ?>
                    <li <?php if($i==$n) echo ''; ?>><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <li class="li-last">
                        <?php echo $this->App->t('title', $this->data['Node']); ?>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <div class="site-tab tab-blue">
                    <span><?php echo $this->App->t('title', $current_category['Node']); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="wrap">
            <div class="col-sm-3 sidebar hidden-xs">
                <?php echo View::element('sidebar'); ?>
            </div>
            <div class="col-sm-9 product-archive">
            <div class="product-list product-single">
                <div class="col-sm-5">
                    <div class="product-detail-big">
                        <a href="<?php echo DOMAIN. $this->data['Product']['image']; ?>">
                            <?php echo $this->App->img($this->data['Product']['image'], '', 500, 478); ?>
                        </a>
                    </div>

                    <?php /*if(isset($this->data['images']) && is_array($this->data['images']) && count($this->data['images']) > 0) { ?> 
                    <div class="product-detail-thumbs">
                        <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true"></a>
                        <div class="jcarousel product-slider-jcarousel max" max="4">
                            <ul>
                                <?php foreach($this->data['images'] as $k=>$im) { //pr($k); pr($im); die; ?>
                                <li>
                                    <a href="<?php echo $this->App->img_src($this->data['Product']['image'], '', 500, 478); ?>">
                                        <?php echo $this->App->img($im['Image']['image'], '', 120, 114); ?>
                                    </a>
                                </li>
                                <?php } ?>
                            </ul>
                        </div>
                        <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true"></a>
                    </div>
                    <?php } */ ?>
                </div>

                <div class="col-sm-7 product-info">
                    <h1>
                        <?php echo $this->App->t('title', $this->data['Node']); ?>
                        <?php echo $this->App->adm_link('product', $this->data['Node']['id']); ?>
                    </h1>
                    
                    <div class="price">
                        <span><?php echo number_format($this->data['Product']['price']); ?></span> vnđ
                        <?php /*
                        <span class="conhang">
                        <?php echo $this->App->t('conhang'); ?><?php echo $this->App->adm_link('lang', 'conhang'); ?>
                        </span>
                        */ ?>
                    </div>
                    <?php if($this->data['Product']['price_off'] != 0) { ?>
                        <div class="price-off">
                            <span><?php echo number_format($this->data['Product']['price_off']); ?></span> vnđ
                        </div>
                    <?php } ?>


                    <?php /*
                    <div class="clearfix"></div>
                    
                    <!-- quy cach / thuộc tính mở rộng -->

                    <?php
                        $att1 = $lang != 'vi' ? 'att1_' . $lang : 'att1'; 
                        $att = $this->data['Product'][$att1];
                        $att_data=array();

                        if($att!= '' && $this->App->is_valid_json($att))
                        {
                            $att_data = json_decode($att);
                            $n = count($att_data);
                    ?>
                    <div class="quycach">
                        <?php echo $this->App->t('coqcach'); ?>
                        <?php echo $this->App->adm_link('lang', 'coqcach'); ?>
                        <?php echo $n; ?>
                        <?php echo $this->App->t('coqcach2'); ?>
                        <?php echo $this->App->adm_link('lang', 'coqcach2'); ?>
                    </div>
                    <div class="quycach-body">
                        <?php foreach($att_data as $att_v) { ?>
                            <span class="quycach-1"><input type="checkbox" class="quycach-checkbox" value="<?php echo $att_v->giatri; ?>" /></span>
                            <span class="quycach-2"><?php echo $att_v->ten; ?></span>
                        <?php } ?>
                    </div>
                    <?php } ?>

                    <div class="clearfix"></div>

                    <!-- end: quy cach -->
                    <?php */ ?>


                    <div class="clearfix"></div>
                    
                    <div class="ddkt-c">
                        <?php echo $this->App->t('description', $this->data['Product']); ?>
                    </div>

                    <div class="clearfix"></div>

                    <div class="sl">
                    Số lượng: 
                    <select>
                        <?php for($i=1; $i<=12; $i++) { ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                        <?php } ?>    
                    </select>
                    </div>

                    <div class="clearfix"></div>

                    <div class="btn-buy buy-now" id="<?php echo $this->data['Node']['id']; ?>"><?php echo $this->App->t('buy'); ?></div>

                    <?php /*
                    <div class="clearfix"></div>

                    <div class="product-des">
                        <?php echo $this->App->t('des-product'); ?><?php echo $this->App->adm_link('lang', 'des-product', 'editor'); ?>
                    </div>
                    */ ?>
                </div>


                    <div class="clearfix"></div>

                    <div class="container-fluid archive">
                        <div class="wrap">
                            <div class="row">
                                <div class="product-content-tab col-sm-12">
                                <div class="product-content-tab-wrap">
                                    <div class="single-product-tabs">
                                        <ul>
                                            <li class="active">
                                                <a href="#tab1"><?php echo $this->App->t('ptab1'); ?></a>
                                                <?php echo $this->App->adm_link('lang', 'ptab1'); ?>
                                            </li>
                                            <li>
                                                <a href="#tab2"><?php echo $this->App->t('ptab2'); ?></a>
                                                <?php echo $this->App->adm_link('lang', 'ptab2'); ?>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="single-product-tabs-c" id="tab1">
                                        <?php echo $this->App->t('content', $this->data['Product']); ?>
                                    </div>
                                    <div class="single-product-tabs-c hidden" id="tab2">
                                        <?php echo $this->App->t('content1', $this->data['Product']); ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>

            <div class="clearfix"></div>

            <div class="container-fluid related-tab">
                <div class="wrap">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="site-tab tab-red">
                                <span><?php echo $this->App->t('related-product'); ?><?php echo $this->App->adm_link('lang', 'featured-product'); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid product-ralated">
                <div class="wrap">
                    <div class="row">
                        <div class="product-ralated-content">
                        <?php if(isset($this->data['related']) && is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
                            <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true"></a>
                            <div class="jcarousel product-slider-jcarousel max" max="<?php echo $max; ?>">
                                <ul>
                                    <?php $i=0; foreach($this->data['related'] as $v) { $i++; ?> 
                                        <li>
                                            <div class="product-related-item product-item product-item-<?php echo $i; ?>">
                                                <div class="product-wrap">
                                                    <div class="product-image">
                                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                                                            <?php echo $this->App->img($v['Product']['image'], $v['Node']['title'], 175, 175); ?>
                                                        </a>
                                                    </div>
                                                    <h3>
                                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                                                            <?php echo $v['Node']['title']; ?>
                                                        </a>
                                                    </h3>
                                                    <div class="clearfix"></div>
                                                    <div class="prices">
                                                        <div class="price pull-left"><?php echo number_format($v['Product']['price']); ?>vnd</div>
                                                        <?php if($v['Product']['price_off'] > 0) { ?>
                                                            <div class="price-off pull-right"><?php echo number_format($v['Product']['price_off']); ?>vnd</div>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="btn-buy"><span>Mua ngay</span></div>
                                                </div>
                                            </div>
                                        </li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true"></a>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

<script type="text/javascript">
$('.single-product-tabs li').click(function () {
    $('.single-product-tabs li').removeClass('active');
    $(this).addClass('active');

    var t = $(this).find('a').attr('href');
    $('.single-product-tabs-c').addClass('hidden');
    $(t).removeClass('hidden');

    return false;
});
</script>


<?php /*
<div class="container-fluid content">
    <div class="row">
        <div class="wrap">
            <div class="col-sm-3 sidebar hidden-xs">
                <?php echo View::element('sidebar'); ?>
            </div>
            <div class="col-sm-9 main">
                <div class="news-list-body product-single-body">
                    <div class="single-product">
                        <div class="col-sm-6 big-thumb">
                            <img src="<?php echo DOMAIN . $this->data['Product']['image']; ?>" alt="<?php echo $this->App->t('title', $this->data['Node']); ?>" />
                        </div>
                        <div class="col-sm-6">
                            <?php if(isset($this->data['images']) && is_array($this->data['images']) && count($this->data['images']) > 0) { ?> 
                                <div id="image-small" class="hidden-xs">
                                <div class="small-thumb jcarousel max" max="5">
                                    <?php foreach($this->data['images'] as $k=>$im) { //pr($k); pr($im); die; ?>
                                    <div class="item" style="text-align: center">
                                        <?php echo $this->App->img($im['Image']['image'], $this->data['Node']['title'], 75, 90); ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                </div>
                            <?php } ?>
                            <div class="product-info">
                                <h1>
                                    <?php echo $this->App->t('title', $this->data['Node']); ?>
                                    <?php echo $this->App->adm_link('product', $this->data['Node']['id']); ?>
                                </h1>
                                <div class="code">
                                    Mã sản phẩm: <span><?php echo $this->data['Product']['code']; ?></span>
                                </div>
                                <div class="price">
                                    Giá: <span><?php echo $this->data['Product']['price'] == 0 ? 'Liên hệ' : number_format($this->data['Product']['price']) . ' VND'; ?></span>
                                </div>
                                <div class="des">
                                    <?php echo $this->data['Product']['description']; ?>
                                </div>
                                <div class="buy">
                                    <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $this->data['Node']['id']; ?>" class="buy-now product-buy" id="<?php echo $this->data['Node']['id']; ?>">
                                        Đặt mua
                                    </a>
                                </div>
                                <div class="info">
                                    <p>Email: <?php echo $this->App->t('company_email'); ?></p>
                                    <p>Hotline: <span><?php echo $this->App->t('company_phone'); ?></span></p>
                                </div>
                            </div>
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="product-content">
                            <div class="product-content-title">Thông tin sản phẩm</div>
                            <?php echo $this->App->t('content', $this->data['Product']); ?>
                        </div>

                        <div class="clearfix"></div>
                        
                        <div class="product-contact">
                            <div class="product-contact-title"><span>Liên hệ đặt &amp; mua sản phẩm</span></div>
                            <div class="product-contact-content">
                                <?php echo $this->App->t('ttdatmua'); ?>
                                <?php echo $this->App->adm_link('lang', 'ttdatmua', 'editor'); ?>
                            </div>
                        </div>
                    </div>
            
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="product-ralated">
                <div class="news-list-title">Sản phẩm liên quan</div>
                    <div class="clearfix"></div>
                <div class="product-ralated-content">
                <?php if(isset($this->data['related']) && is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
                    <?php $i=0; foreach($this->data['related'] as $v) { $i++; ?> 
                    <div class="col-sm-3 product-ralated-item product-list-item">
                        <div class="product-list-item-content">
                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                            <?php echo $this->App->img($v['Product']['image'], $v['Node']['title'], 260, 340); ?>
                        </a>
                        <h3>
                            <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                <?php echo $v['Node']['title']; ?>
                            </a>
                        </h3>
                        <p>
                            Mã số : <?php echo $v['Product']['code']; ?><br />
                            Giá : <?php echo $v['Product']['price'] == 0 ? 'Liên hệ' : number_format($v['Product']['price']) . ' VNĐ'; ?>
                        </p>
                    </div>
                    </div>
                    
                    <?php //if($i==3) { echo '<div class="clearfix"></div>'; $i=0; } ?>
                    <?php } ?>
                <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
*/ ?>

<script type="text/javascript">
    // $('#image-small .jcarousel').jcarousel({
    //     vertical: true
    // }).jcarouselAutoscroll({
    //     interval: 3000,
    //     target: '+=1',
    //     autostart: true
    // });

    $('.product-slider-jcarousel').jcarousel({
        vertical: false
    }).jcarouselAutoscroll({
        interval: 2000,
        target: '+=1',
        autostart: true
    });

    $('.buy-now').click(function() {
        var id = $(this).attr('id');
        var b = new Array();
        $('.quycach-checkbox').each(function() {
            if($(this).is(':checked'))
            {
                var v = $(this).val();
                b.push(v);
            }
        });

        var str = b.join(',');
        var link = "<?php echo DOMAIN; ?>cart/add/?id=" + id + '&str=' + str;

        document.location.href=link;
    });
</script>