<?php /*

<?php if (isset($banners['sidebar'])) { ?>
    <?php foreach ($banners['sidebar'] as $v) { ?>
        <figure class="banner-right">
            <a href="<?php echo $v['Banner']['link']; ?>" title="">
                <?php echo $this->App->img($v['Banner']['image'], $v['Banner']['title'], 210, 330)     ?>
            </a>
        </figure>
    <?php } ?>
<?php } ?>

<div class="sb-tkm">
    <div class="san-bold title-sbtkm">
        TOP ARTICLES
    </div>
    <ul class="mb-0">

        <?php $i = 0;
        foreach ($featured_news as $v) {
            $i++ ?>
            <?php if ($i > 2) break; ?>
            <li>
                <figure>
                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                        <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 400, 230); ?>
                    </a>
                </figure>
                <div class="san-bold name-tk mb-2">
                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                        <?php echo $this->App->t('title', $v['Node']); ?>
                    </a>
                </div>
                <div class="des-tk">
                    <?php echo $this->App->word_limiter($v['News']['description'], 21); ?>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>
    */ ?>
<div class="sidebar-box">
    <div class="sidebar">
        <div class="popular-courses">
            <h4><?php echo $this->App->t_a('general_text_16'); ?></h4>
            <?php if (isset($featured_news) && count($featured_news) > 0) {
                $i = 0;
                foreach ($featured_news as $v) {
                    $i++; ?>
                    <?php if ($i > 10) break; ?>
                    <div class="lastest-course-item">
                        <a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo  $this->App->t('title', $v['Node']); ?>">
                            <div class="lc-item-img in-line">
                                <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['News']['image']; ?>" alt="new-articles">
                            </div>
                        </a>
                        <div class="lc-item-content">
                            <h4><a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo $this->App->t('title', $v['Node']); ?>">
                                    <?php echo $this->App->t('title', $v['Node']); ?>
                                </a>
                            </h4>
                            <p class="lc-date"><?php echo date('d/m/Y', $v['Node']['created']); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

<?php /*
<div class="sb-spbc">
    <div class="san-bold title-sbtkm">
        Sản phẩm bán chạy
    </div>
    <ul>
        <?php $i = 0;
        foreach ($best_sales_products as $v) {
            $i++ ?>
            <?php if ($i > 4) break; ?>
            <li>
                <div class="row">
                    <div class="pl-01">
                        <figure>
                            <a href="<?php echo DOMAIN . $v['Node']['s  lug']; ?>.html" title="">
                                <?php echo $this->App->img($v['Product']['image'], $v['Node']['title'], 208, 208); ?>
                            </a>
                            <?php if ($v['Product']['khuyenmai'] != 0) { ?>
                                <span class="san-bold sale">-<?php echo $v['Product']['khuyenmai']; ?>%</span>
                            <?php } ?>
                        </figure>
                    </div>
                    <div class="col">
                        <h3 class="name-list-gd">
                            <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                <?php echo $this->App->t('title', $v['Node']); ?>
                            </a>
                        </h3>
                        <?php if ($v['Product']['price'] != 0) { ?>
                            <p class="pricehome_pro">
                                <?php echo number_format($v['Product']['price']); ?> đ
                            </p>
                        <?php } ?>

                        <?php if ($v['Product']['price_off'] != 0) { ?>
                            <p class="priceold-home_pro">
                                <del><?php echo number_format($v['Product']['price_off']); ?> đ</del>
                            </p>
                        <?php } else { ?>
                            <p class="priceold-home_pro">
                                &nbsp;
                            </p>
                        <?php } ?>
                    </div>
                </div>
            </li>
        <?php } ?>
    </ul>
</div>



<div class="sb-video">
    <div class="title"><?php echo $this->App->t_a('home_text_6'); ?></div>
    <div>
        <div>
            <?php $yid = $this->App->youtube_id($this->App->t('home_text_7')); ?>
            <iframe width="100%" height="215" src="https://www.youtube.com/embed/<?php echo $yid; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <?php echo $this->App->adm_link('lang', 'home_text_7'); ?>
        </div>
    </div>
</div>
        */ ?>