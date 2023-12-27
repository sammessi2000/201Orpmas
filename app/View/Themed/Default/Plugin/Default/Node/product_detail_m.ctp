<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php $root = $this->requestAction('/default/node/find_root_category/' . $current_category['Category']['id']);
$parent = $this->requestAction('/default/node/get_category/'. $root);
//pr($parent); 
?>
<div class="product-list-main">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <?php } else {     ?>
                <li class="breadcrumb-item"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a>
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
    <?php if(isset($parent['Category']['image'])) { ?>
    <div class="product-banner"
        style="background-image: url('<?php echo $parent['Category']['image']; ?>'); height: 200px; background-repeat: no-repeat;">
        <div class="wrap-bannerdes">
            <div class="banner-des"><?php echo $parent['Category']['seo_title']; ?></div>
        </div>
    </div>
    <?php } ?>

    <div class="wrap product-detail-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-3 sidebar-product hidden-xs">
                    <?php echo $this->element('sidebar-product'); ?>
                </div>
                <div class="col-sm-9 col-xs-12 productlist-col">
                    <div class="page-title">
                        <span><?php echo $parent['Node']['title']; ?>
                            <?php echo $this->App->t_a('general_text_3'); ?></span>
                        <span><?php echo $current_category['Node']['title']; ?></span>
                    </div>
                    <div class="row prd-detail-main">
                        <div class="col-sm-5 col-xs-12">
                            <img src="<?php echo $this->data['Product']['image']; ?>" alt="">
                        </div>
                        <div class="col-sm-7 col-xs-12">
                            <span class="product-name"><?php echo $this->data['Node']['title']; ?></span>
                            <?php if (isset($this->data['Product']['code'])) { ?>
                            <span class="product-code"><?php echo $this->data['Product']['code']; ?></span>
                            <?php } ?>
                            <?php if (isset($this->data['Product']['att1'])) { ?>
                            <?php $att1 = json_decode($this->App->t('att1', $this->data['Product'])) ?>
                            <div class="product-att">
                                <?php foreach ($att1 as $v) {    ?>
                                <div class="clearfix"></div>
                                <div class="d-flex" style="display: flex;">
                                    <span><?php echo ($v->ten) ?>:</span>
                                    <span><?php echo ($v->giatri) ?></span>
                                </div>
                                <?php } ?>
                            </div>
                            <div class="product-content">
                                <?php echo $this->data['Product']['content']; ?>
                            </div>
                            <?php } ?>
                        </div>
                        <hr>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 related-product-item">
                            <span
                                class="related-product-title"><?php echo $this->App->t_a('related_products'); ?></span>
                            <?php if (is_array($this->data['related']) && count($this->data['related']) > 0) {  ?>
                            <div class="row">
                                <?php $i = 0;
                                foreach ($this->data['related'] as $v) {
                                    $i++ ?>
                                <div class="col-xs-6 col-xs-prlist">
                                    <div class="product-item">
                                        <a class="img_100" href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html"
                                            aria-label="<?php echo $v['Node']['title']; ?>">
                                            <img class="lazy"
                                                src="<?php echo $this->App->img_src($v['Product']['image'], 352, 250) ?>"
                                                alt="<?php $v['Node']['title'] ?>" width="352" height="250">
                                        </a>
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                            <div class="prditem-name">
                                                <?php echo $v['Node']['title']; ?>
                                            </div>
                                            <?php if(isset($v['Product']['code'])) {?>
                                            <div class="prditem-tag">
                                                <?php echo $v['Product']['code']; ?>
                                            </div>
                                            <?php } ?>
                                        </a>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                            <div class="showmore">
                                <a href="<?php echo $parent['Node']['slug'] . '.html'; ?>">
                                    Xem thêm
                                    <svg width="21" height="12" viewBox="0 0 21 12" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15 11L19.2 6.00216L15 1" stroke="white" stroke-width="1.4"
                                            stroke-miterlimit="10" stroke-linecap="round" />
                                        <path d="M19 6H1" stroke="white" stroke-width="1.4" stroke-miterlimit="10"
                                            stroke-linecap="round" />
                                    </svg>

                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>