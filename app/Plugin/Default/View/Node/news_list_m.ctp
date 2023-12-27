<?php $bread_array = $this->App->breadarray($current_category); ?>

<?php
    // die;
?>

<div id="body_content">
    <div class="page_path">
        <div id="breadcrumb" class="block-breadcrumb-mb">
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

    <div class="clear_fix"></div>

    <div class="article_list">
        <div id="content_news_page" style="margin-top:0;">
        <div class="item-box-news">
            <div class="title-box-news-2019">
                <h1 class="h_title"><a href=""><?php echo $current_category['Node']['title']; ?></a></h1>
            </div>

            <div class="clear"></div>

            <div class="top_news_on_page">
                <?php if(count($this->data) > 0) { ?>
                <?php $i=0; foreach($this->data as $v) { $i++; ?> 
                <?php $title = $this->App->t('title', $v['Node']); ?>
                <div class="first large">
                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="img" title="<?php echo $title; ?>">
                        <?php echo $this->App->img($v['News']['image'], $title, 400, 0); ?>
                    </a>

                    <span class="container">
                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="name" title="<?php echo $title; ?>">
                            <?php echo $title; ?>
                        </a>
                        <span class="summary">
                            <?php echo $this->App->word_limiter($this->App->t('description', $v['News']), 32); ?>
                        </span>
                    </span>
                </div>
                <?php } ?>
                <?php } ?>
            </div>

            <div class="clear space5px"></div>
        </div>

        <div class="clear"></div>

        <div class="top_area_list_page">
            <div class="paging">
            <?php 
                $first = $this->Paginator->first('<', array('tag' => 'span', 'separator' => ''));
                $first = str_replace('default/node/index/', '', $first);
                $first = str_replace('/.html', '.html', $first);

                $last = $this->Paginator->last('>', array('tag' => 'span', 'separator' => ''));
                $last = str_replace('default/node/index/', '', $last);
                $last = str_replace('/.html', '.html', $last);

                $pages = $this->Paginator->numbers(array('tag' => 'span', 'separator'=>' ', 'currentTag' => 'a'));
                $pages = str_replace('default/node/index/', '', $pages);
                $pages = str_replace('/.html', '.html', $pages);

                echo $first;
                echo $pages;
                echo $last;
            ?>
            </div>
        </div>
        </div>
    </div>
</div>