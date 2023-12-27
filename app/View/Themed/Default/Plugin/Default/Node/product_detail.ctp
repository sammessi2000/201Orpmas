<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php $root = $this->requestAction('/default/node/find_root_category/' . $current_category['Category']['id']);
$parent = $this->requestAction('/default/node/get_category/' . $root);
//pr($parent); 
?>
<div class="product-list-main">
    <div class="unit-page-background-header lazy" data-bg="<?php echo $this->App->t('general_text_10'); ?>">
        <div class="background-filter first-banner"></div>
    </div>
    <?php echo $this->App->adm_link('lang', 'general_text_10', 'image'); ?>

    <div class="page-h2-box featured-locations">
        <h2><?php echo $this->App->t_a('home_tab_10'); ?></h2>
    </div>
    <div class="about-us-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="about-us-item-content">
                            <?php echo $this->App->t_a('home_text_9', 'editor'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-h2-box featured-locations">
        <h2><?php echo $this->App->t_a('home_tab_1'); ?></h2>
    </div>

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
                        <div class="col-sm-6 col-xs-12 product-image">
                            <img src="<?php echo $this->data['Product']['image']; ?>" alt="">
                        </div>
                        <div class="col-sm-6 col-xs-12 product-detail-info">
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
                            <div class="product-owl-nav">
                                <a href="javascript:;" class="owl-prev-custom">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.975 15.6833C7.81667 15.6833 7.65833 15.625 7.53333 15.5L2.475 10.4417C2.23333 10.2 2.23333 9.8 2.475 9.55833L7.53333 4.5C7.775 4.25833 8.175 4.25833 8.41667 4.5C8.65833 4.74167 8.65833 5.14167 8.41667 5.38333L3.8 10L8.41667 14.6167C8.65833 14.8583 8.65833 15.2583 8.41667 15.5C8.3 15.625 8.13333 15.6833 7.975 15.6833Z" fill="#666666" />
                                        <path d="M17.0833 10.625H3.05833C2.71667 10.625 2.43333 10.3417 2.43333 10C2.43333 9.65833 2.71667 9.375 3.05833 9.375H17.0833C17.425 9.375 17.7083 9.65833 17.7083 10C17.7083 10.3417 17.425 10.625 17.0833 10.625Z" fill="#666666" />
                                    </svg>
                                </a>
                                <a href="javascript:;" class="owl-next-custom">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12.025 4.31667C12.1833 4.31667 12.3417 4.375 12.4667 4.5L17.525 9.55833C17.7667 9.8 17.7667 10.2 17.525 10.4417L12.4667 15.5C12.225 15.7417 11.825 15.7417 11.5833 15.5C11.3417 15.2583 11.3417 14.8583 11.5833 14.6167L16.2 10L11.5833 5.38333C11.3417 5.14167 11.3417 4.74167 11.5833 4.5C11.7 4.375 11.8667 4.31667 12.025 4.31667Z" fill="#666666" />
                                        <path d="M2.91667 9.375H16.9417C17.2833 9.375 17.5667 9.65833 17.5667 10C17.5667 10.3417 17.2833 10.625 16.9417 10.625H2.91667C2.575 10.625 2.29167 10.3417 2.29167 10C2.29167 9.65833 2.575 9.375 2.91667 9.375Z" fill="#666666" />
                                    </svg>
                                </a>
                            </div>
                            <span class="related-product-title"><?php echo $this->App->t_a('related_products'); ?></span>
                            <div class="owl-carousel owl-related-product">
                                <?php if (is_array($this->data['related']) && count($this->data['related']) > 0) {  ?>
                                    <?php $i = 0;
                                    foreach ($this->data['related'] as $v) {
                                        $i++ ?>
                                        <div class="product-item">
                                            <a class="img_100" href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" aria-label="<?php echo $v['Node']['title']; ?>">
                                                <img class="lazy" src="<?php echo $this->App->img_src($v['Product']['image'], 352, 250) ?>" alt="<?php $v['Node']['title'] ?>" width="352" height="250">
                                            </a>
                                            <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                                <div class="prditem-name">
                                                    <?php echo $v['Node']['title']; ?>
                                                </div>
                                                <?php if (isset($v['Product']['code'])) { ?>
                                                    <div class="prditem-tag">
                                                        <?php echo $v['Product']['code']; ?>
                                                    </div>
                                                <?php } ?>
                                            </a>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>