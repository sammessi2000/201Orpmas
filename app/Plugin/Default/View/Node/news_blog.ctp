<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // pr($current_category);
    // pr($bread_array);
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
            <div class="col-sm-12 col-xs-12">

                <?php if(isset($this->data) && is_array($this->data) && count($this->data) > 0) { ?>
                    <?php $i=0; foreach($this->data as $v) { $i++; ?>
                        <div class="archive-item row ">
                        <div class="col-sm-12">
                        <div class="body">
                        <div class="row">
                   

                        <div class="archive-item">
                            <div class="col-sm-12 img">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="b-card-1 firt">
                                    <img width="730" height="300" class="lazy" src="<?php echo DOMAIN; ?>theme/default/img/blank.svg" data-src="<?php echo $this->App->img_src($v['News']['image'], 730, 300); ?>" alt="<?php echo $v['Node']['title']; ?>" />
                                </a>
                            </div>
                            <div class="col-sm-12 inf">
                                    <div class="b_title hover h2">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class=""><span><?php echo $v['Node']['title']; ?></span></a></div>
                                    <div class="b_desc "><?php echo $this->App->word_limiter($v['News']['description'], 31); ?></div>
                            </div>
                        </div>


                        </div>
                        </div>
                        </div>
                        </div>
                    <?php } ?>
                    <?php } ?>

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

