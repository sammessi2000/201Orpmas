
<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // pr($current_category);
?>
<div class="archive" id="breadcrumb">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                 <div class="block-breadcrumb-mb">
                    <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
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
        </div>
    </div>
</div>

<div class="main archive">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                <div class="home-news-title hr-red">
                    <span><?php echo $current_category['Node']['title']; ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main archive archive-blog">
    <div class="wrap-blog">
        <div class="row">
            <div class="col-sm-12">


                    <h1 class="p_title primary-color">
                        <?php echo $this->App->t('title', $this->data['Node']); ?>
                        <?php echo $this->App->adm_link('news', $this->data['Node']['id']); ?>
                    </h1>

                    <div class="content">
                        <?php echo $this->data['News']['content']; ?>
                    </div>
              

                <div class="clearfix"></div>

                <?php if(is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
                <div class="single-news-related-title">
                    <span><?php echo $this->App->t_a('related-news'); ?></span>
                </div>
                <div class="single-news-related">
                    <div class="owl-carousel ">
                        <?php $i=0; foreach($this->data['related'] as $v) { $i++; ?>
                        <?php if($i==1) continue; ?>

                        <div class="news-item">
                            <div class="news-image">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                <img width="210" height="147" class="lazy" src="<?php echo DOMAIN; ?>theme/default/img/blank.svg" data-src="<?php echo $this->App->img_src($v['News']['image'], 210, 147); ?>" alt="" />
                                </a>
                            </div>

                            <div class="news-title">
                                <h3>
                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                        <?php echo $v['Node']['title']; ?>
                                    </a>
                                </h3>
                            </div>

                            <div class="news-des">
                                <p><?php echo $this->App->word_limiter($v['News']['description'], 8); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                        <?php } ?>



                </div>

            </div>
        </div>
    </div>
</div>
