<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page_path">
    <div id="breadcrumb" class="block-breadcrumb-mb">
        <ol itemscope itemtype="http://schema.org/BreadcrumbList">
            <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
            <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
            <?php if($v['title'] != '') {  $i++; ?>
            <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                <a itemprop="item" href="<?php echo $v['link']; ?>">
                    <span itemprop="name"><?php echo $v['title']; ?></span>
                </a>
                <i class="fa fa-angle-right"></i>
                <meta itemprop="position" content="<?php echo $i; ?>">
            </li>
            <?php } ?>
            <?php } ?>
            <?php } ?>
        </ol>
    </div>
</div>

<div class="clear"></div>

<div class="article-detail" style="padding: 10px;">
    <div class="news-home-top">
        <div class="news-page-content-left">
            <div id="detail_news">
                <h1><?php echo $this->App->t('title', $this->data['Node']); ?></h1>
                <div class="content_detail article-detail nd" style="font-size: 16px">
                    <div class="entry-content max970">
                        <?php echo $this->App->t('content', $this->data['News']); ?>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

        <div class="news-home-top-right" style="background:none; border:none;">
            <div class="box-news-right">
                <div class="title-box"><?php echo $this->App->t_a('relatednews'); ?></div>
                <div class="content-box" style="max-height:99999px; border:solid 1px #ddd;">
                    <?php if(is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
                    <?php foreach($this->data['related'] as $v) { ?>
                    <?php $title = $v['Node']['title']; ?>
                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                        <?php echo $this->App->img($v['News']['image'], $title, 380, 225);  ?>
                        <span>
                            <?php echo $title; ?>
                        </span>
                    </a>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
