
<div class="productdetail">
            <div class="row">
            <div class="col-sm-12">
            <div class="sidebar-title bread">
                <ul>
                    <li>
                        <a href="<?php echo DOMAIN; ?>">
                            <?php echo $this->App->t('home'); ?>
                        </a>
                    </li>
                    <li>&gt;</li>
                    <li>
                        <?php echo $this->App->t('title', $current_category['Node']); ?>
                    </li>
                </ul>
            </div>
            </div>
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <div class="product-preview">
                        <div id="image-lagre" class="owl-carousel" style="border: 1px solid #e5e5e5">
                            <div class="item text-center">
                                <a href="<?php echo DOMAIN . $this->data['Product']['image']; ?>" data-lightbox="image-1" title="<?php echo $this->data['Node']['title']; ?>">
                                    <img alt="<?php echo $this->data['Node']['title']; ?>" title="<?php echo $this->data['Node']['title']; ?>" class="img-responsive" src="<?php echo DOMAIN . $this->data['Product']['image']; ?>" style="margin:0 auto">
                                </a>
                            </div>
                        </div>
                        <div id="image-small" class="owl-carousel mtop10">
                            <div class="item" style="text-align: center">
                                <img alt="<?php echo $this->App->t('title', $this->data['Node']); ?>" title="<?php echo $this->App->t('title', $this->data['Node']); ?>" class="img-responsive" src="<?php echo DOMAIN . $this->data['Product']['image']; ?>">
                            </div>
                            <?php if(isset($this->data['images']) && is_array($this->data['images']) && count($this->data['images']) > 0) { ?> 
                                <?php foreach($this->data['images'] as $k=>$im) { ?>
                                <div class="item" style="text-align: center">
                                    <img alt="<?php echo $this->data['Node']['title']; ?>" title="<?php echo $this->data['Node']['title']; ?>" class="img-responsive" src="<?php echo $k; ?>">
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-7 product-info-block">
                    <div class="product-info table-responsive">
                        <h1 class="name"><?php echo $this->App->t('title', $this->data['Node']); ?><?php echo $this->App->adm_link('product', $this->data['Node']['id']); ?></h1>
                        <table class="table-detail table table-striped">
                            <tr class="productcode">
                                <th><span><?php echo $this->App->t('code'); ?><?php echo $this->App->adm_link('lang', 'code'); ?>:</span></th>
                                <td><?php echo $this->data['Product']['code']; ?></td>
                            </tr>
                            <tr>
                                <th><span><?php echo $this->App->t('price'); ?><?php echo $this->App->adm_link('lang', 'price'); ?>: </span></th>
                                <td>
                                    <span class="price"><span><?php echo is_numeric($this->data['Product']['price']) && $this->data['Product']['price'] != 0 ? number_format($this->data['Product']['price']) . ' VNĐ' : 'Liên hệ'; ?></span></span>
                                </td>
                            </tr>
                            <tr class="quantity-container">
                                <th><span><?php echo $this->App->t('quantity'); ?><?php echo $this->App->adm_link('lang', 'quantity'); ?>: </span></th>
                                <td>
                                    <div class="cart-quantity">
                                        <div class="quant-input">
                                            <div class="arrows">
                                                <div class="arrow plus gradient">
                                                    <span class="ir">
                                                        <i class="fa fa-caret-right"></i>
                                                    </span>
                                                </div>
                                                <div class="arrow minus gradient">
                                                    <span class="ir">
                                                        <i class="fa fa-caret-left"></i>
                                                    </span>
                                                </div>
                                            </div>
                                            <input type="text" value="1" id="txtqty">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <a href="#" class="btn btn-warning buy-now btn-sm" style="margin-top: 5px;" id="<?php echo $this->data['Node']['id']; ?>">
                                        <?php echo $this->App->t('buy'); ?>
                                    </a>
                                    <?php echo $this->App->adm_link('lang', 'quantity'); ?>
                                </td>
                            </tr>
                        </table>
                        <div class="product-social-link">
                            <span class="social-label"></span>
                            <div class="social-icons">
                                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5032560529927e5e" async="async"></script>
                                <div class="addthis_native_toolbox"></div>
                            </div>
                        </div>







                    </div>




                </div>

          <div class="col-sm-12">
          <div class="product-tabs inner-bottom-xs">
            <ul id="product-tabs" class="nav nav-tabs nav-tab-cell">
                <li class="active">
                    <a href="#description" data-toggle="tab"><?php echo $this->App->t('detail'); ?><?php echo $this->App->adm_link('lang', 'detail'); ?></a>
                </li>
                <!-- <li>
                    <a href="#review" data-toggle="tab">Đánh giá</a>
                </li> -->

            </ul>
            <div class="tab-content">
                <div id="description" class="tab-pane active">
                    <div class="product-tab">
                    <?php echo $this->App->t('content', $this->data['Product']); ?>
</div>
                </div>
                <div id="review" class="tab-pane">
                                    </div>
            </div>
        </div>
        </div>



            </div>


<?php if(isset($this->data['related']) && is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
    <h3 class="section-title">
        <span>
            <?php echo $this->App->t('related_product'); ?>
            <?php echo $this->App->adm_link('lang', 'related_product'); ?>
        </span>
    </h3>
    <div class="home-tab-content product-list-content related-list-content">
        <?php $i=0; foreach($this->data['related'] as $val) { $i++; ?> 
        <div class="col-sm-3 product-item <?php if($i%4==0) echo 'product-item-nobg'; ?> <?php if($i>4) echo 'product-item-border'; ?>">
            <a href="<?php echo DOMAIN  . $lang_txt_link. $val['Node']['slug']; ?>.html">
                <?php echo $this->App->img($val['Product']['image'], $val['Node']['title'], 130, 110); ?>
            </a>
            <h3>
                <a href="<?php echo DOMAIN . $lang_txt_link . $val['Node']['slug']; ?>.html">
                    <?php echo $this->App->word_limiter($this->App->t('title', $val['Node']), 5); ?>
                </a>
            </h3>
            <p class="price"><?php echo number_format($val['Product']['price']); ?> Đ</p>
        </div>
        <?php } ?>
    </div>
<?php } ?>



</div>





<script type="text/javascript">
$(document).ready(function(){
    $('#owl-single-product').owlCarousel({
        items:1,
        itemsTablet:[768,2],
        itemsDesktop : [1199,1]

    });

    $('#owl-single-product-thumbnails').owlCarousel({
        items: 4,
        pagination: true,
        rewindNav: true,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    });

    $('#owl-single-product2-thumbnails').owlCarousel({
        items: 6,
        pagination: true,
        rewindNav: true,
        itemsTablet : [768, 4],
        itemsDesktop : [1199,3]
    });

    $('.single-product-slider').owlCarousel({
        stopOnHover: true,
        rewindNav: true,
        singleItem: true,
        pagination: true
    });

    $(".slider-next").click(function () {
        var owl = $($(this).data('target'));
        owl.trigger('owl.next');
        return false;
    });

    $(".slider-prev").click(function () {
        var owl = $($(this).data('target'));
        owl.trigger('owl.prev');
        return false;
    });

    $('.single-product-gallery .horizontal-thumb').click(function(){
        var $this = $(this), owl = $($this.data('target')), slideTo = $this.data('slide');
        owl.trigger('owl.goTo', slideTo);
        $this.addClass('active').parent().siblings().find('.active').removeClass('active');
        return false;
    });
});


/*===================================================================================*/
/*  QUANTITY
/*===================================================================================*/

$('.quant-input .plus').click(function() {
    var val = $(this).parent().next().val();
    val = parseInt(val) + 1;
    $(this).parent().next().val(val);
});
$('.quant-input .minus').click(function() {
    var val = $(this).parent().next().val();
    if (val > 0) {
        val = parseInt(val) - 1;
        $(this).parent().next().val(val);
    }
});


/*---------Slider detail product-------------*/
$(document).ready(function () {

    var sync1 = $("#image-lagre");
    var sync2 = $("#image-small");

    sync1.owlCarousel({
        singleItem: true,
        slideSpeed: 1000,
        navigation: false,
        pagination: false,
        afterAction: syncPosition,
        responsiveRefreshRate: 200,
    });

    sync2.owlCarousel({
        items: 3,
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 3],
        itemsMobile: [479, 3],
        pagination: true,
        responsiveRefreshRate: 100,
        afterInit: function (el) {
            el.find(".owl-item").eq(0).addClass("synced");
        }
    });

    function syncPosition(el) {
        var current = this.currentItem;
        $("#image-small")
          .find(".owl-item")
          .removeClass("synced")
          .eq(current)
          .addClass("synced")
        if ($("#image-small").data("owlCarousel") !== undefined) {
            center(current)
        }
    }

    $("#image-small").on("click", ".owl-item", function (e) {
        e.preventDefault();
        var number = $(this).data("owlItem");
        sync1.trigger("owl.goTo", number);
    });

    function center(number) {
        var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
        var num = number;
        var found = false;
        for (var i in sync2visible) {
            if (num === sync2visible[i]) {
                var found = true;
            }
        }

        if (found === false) {
            if (num > sync2visible[sync2visible.length - 1]) {
                sync2.trigger("owl.goTo", num - sync2visible.length + 2)
            } else {
                if (num - 1 === -1) {
                    num = 0;
                }
                sync2.trigger("owl.goTo", num);
            }
        } else if (num === sync2visible[sync2visible.length - 1]) {
            sync2.trigger("owl.goTo", sync2visible[1])
        } else if (num === sync2visible[0]) {
            sync2.trigger("owl.goTo", num - 1)
        }

    }

});
</script>