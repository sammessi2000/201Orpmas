<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php $root = $this->requestAction('/default/node/find_root_category/' . $current_category['Category']['id']);
$parent = $this->requestAction('/default/node/get_category/' . $root);

//pr($parent); 
?>
<div class="product-list-main">
    <?php /*
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
        style="background-image: url('<?php echo DOMAIN . $parent['Category']['image']; ?>'); height: 200px; background-repeat: no-repeat;">
        <div class="wrap-bannerdes">
            <div class="banner-des"><?php echo $parent['Category']['seo_title']; ?></div>
        </div>
    </div>
    <?php } 
    */ ?>
    <div class="unit-page-background-header lazy" data-bg="<?php echo DOMAIN . $this->App->t('general_text_10'); ?>">
        <div class="background-filter first-banner"></div>
    </div>
    <?php echo $this->App->adm_link('lang', 'general_text_10', 'image'); ?>

    <div class="page-h2-box">
        <h2><?php echo $this->App->t_a('general_text_11'); ?></h2>
    </div>
    <div class="destination">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="destination-description">
                            <?php echo $this->App->t_a('general_text_12', 'editor'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-h2-box">
        <h2>
            <h2><?php echo $this->App->t_a('home_tab_1'); ?></h2>
        </h2>
    </div>

    <!--  -->
    <div class="fl-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <?php if (isset($featured_products) && count($featured_products) > 0) { ?>
                        <?php $i = 0;
                        foreach ($featured_products as $v) {
                            $i++; ?>
                            <?php if ($i > 2) break; ?>
                            <div class="col-sm-6">
                                <!-- <div class="fl-item-img" onclick="show_destin_pr(<?php // echo $v['Node']['id']; ?> );"> -->
                                <div class="fl-item-img" onclick="show_destin_pr_<?php echo $lang?>(<?php echo $v['Node']['id']; ?> );">
                                    <?php // echo $this->App->img($v['Product']['image'], $v['Node']['title']); 
                                    ?>
                                    <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['Product']['image']; ?>" alt="<?php echo $v['Node']['title']; ?>">
                                    <div class="img-filter-box"></div>
                                    <h3 class="fl-item-name"><?php echo $v['Node']['title']; ?></h3>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="fl-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">

                    <?php if (isset($featured_products) && count($featured_products) > 0) { ?>
                        <?php $i = 0;
                        foreach ($featured_products as $v) {
                            $i++; ?>
                            <?php if ($i < 3) continue; ?>
                            <div class="col-sm-4">
                            <div class="fl-item-img" onclick="show_destin_pr_<?php echo $lang?>(<?php echo $v['Node']['id']; ?> );">
                                    <?php // echo $this->App->img($v['Product']['image'], $v['Node']['title']); 
                                    ?>
                                    <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['Product']['image']; ?>" alt="<?php echo $this->App->t('title', $v['Node']); ?>">
                                    <div class="img-filter-box"></div>
                                    <h3 class="fl-item-name"><?php echo $this->App->t('title', $v['Node']); ?></h3>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="page-h2-box top-rate">
        <h2><?php echo $this->App->t_a('general_text_13'); ?></h2>
    </div>

    <div class="fl-item top-rate-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <?php if (isset($newest_products) && count($newest_products) > 0) { ?>
                        <?php $i = 0;
                        foreach ($newest_products as $v) {
                            $i++; ?>
                            <div class="col-sm-6">
                                <div class="fl-item-img" onclick="show_destin_pr(<?php echo $v['Node']['id']; ?> );">
                                    <?php // echo $this->App->img($v['Product']['image'], $v['Node']['title']); 
                                    ?>
                                    <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['Product']['image']; ?>" alt="<?php echo $v['Node']['title']; ?>">
                                    <div class="img-filter-box"></div>
                                    <h3 class="fl-item-name"><?php echo $v['Node']['title']; ?></h3>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <?php /*
        <div class="fl-item">
            <div class="wrap">
                <div class="container-fluid">
                    <div class="row">
                    <?php if (isset($this->data) && count($this->data) > 0) { ?>
                            <?php $i = 0;
                            foreach ($this->data as $v) {
                                $i++; ?>
                                <?php if ($i < 3) continue; ?>
                                <?php if ($i > 4) break; ?>
                                <div class="col-sm-6">
                                    <div class="fl-item-img" onclick="show_destin_pr(<?php echo $v['Node']['id']; ?> );">
                                        <?php // echo $this->App->img($v['Product']['image'], $v['Node']['title']); 
                                        ?>
                                        <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['Product']['image']; ?>" alt="<?php echo $v['Node']['title']; ?>">
                                        <div class="img-filter-box"></div>
                                        <h3 class="fl-item-name"><?php echo $v['Node']['title']; ?></h3>
                                    </div>
                                </div>
                            <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
        */ ?>
    <!--  -->
    <?php /*
    <div class="wrap productlist-content">
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
                    <div class="row">
                        <?php 
                            $i = 0;
                            foreach($this->data as $v) { $i++; ?>
                            <div class="col-sm-4 col-xs-prlist">
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
                                        <div class="prditem-tag">
                                            <?php if(isset($v['Product']['seo_title'])){ ?>
                                            <?php echo $v['Product']['code']; ?>
                                            <?php } ?>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product-des">
                        <?php if(isset($current_category['Category']['description'])){ ?>
                        <?php echo $current_category['Category']['description']; ?>
                        <?php } ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="paging-n bg-w">
                                <?php
                            $next_html = '';
                            $next_html .= '<a id="prd-next" href="javascript:;">';
                            $next_html .= '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.975 15.6833C7.81667 15.6833 7.65833 15.625 7.53333 15.5L2.475 10.4417C2.23333 10.2 2.23333 9.80001 2.475 9.55834L7.53333 4.50001C7.775 4.25834 8.175 4.25834 8.41667 4.50001C8.65834 4.74167 8.65834 5.14167 8.41667 5.38334L3.8 10L8.41667 14.6167C8.65834 14.8583 8.65834 15.2583 8.41667 15.5C8.3 15.625 8.13333 15.6833 7.975 15.6833Z" fill="#666666"/>
                            <path d="M17.0833 10.625H3.05833C2.71667 10.625 2.43333 10.3417 2.43333 10C2.43333 9.65833 2.71667 9.375 3.05833 9.375H17.0833C17.425 9.375 17.7083 9.65833 17.7083 10C17.7083 10.3417 17.425 10.625 17.0833 10.625Z" fill="#666666"/>
                            </svg>';
                            $next_html .= '</a>';
                            $prev_html = '';
                            $prev_html .= '<a class="prd-next" href="javascript:;">';
                            $prev_html .= '</a>';
                            $first = $this->Paginator->first('<', array('tag' => 'span','class' => 'product-list-prev','separator' => 'dsfsd'));
                            $first = str_replace('default/node/index/', '', $first);
                            $first = str_replace('/.html', '.html', $first);

                            $last = $this->Paginator->last('>', array('tag' => 'span','class' => 'product-list-next', 'separator' => ''));
                            $last = str_replace('default/node/index/', '', $last);
                            $last = str_replace('/.html', '.html', $last);

                            $pages = $this->Paginator->numbers(array('tag' => 'span','separator' => ' ', 'currentTag' => 'a'));
                            $pages = str_replace('default/node/index/', '', $pages);
                            $pages = str_replace('/.html', '.html', $pages);

                            //echo $next_html;
                            echo $first;
                            echo $pages;
                            echo $last;
                            echo $prev_html;
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    */ ?>
</div>