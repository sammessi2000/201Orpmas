
<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // pr($current_category);
?>
<div class="main document">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
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

            <div class="col-sm-9">
                <div class="home-news-title hr-red">
                    <span><?php echo $current_category['Node']['title']; ?></span>
                </div>
                <div class="row">
                    <?php foreach($this->data as $v) { ?>
                    <div class="col-sm-6 col-xs-12 tailieu-item">
                        <div class="tailieu-item-content">
                            <div class="row">
                                <div class="tailieu-thumb">
                                    <?php 
                                        $file = $v['Document']['link'];
                                        $farr = explode('.', $file);
                                        $ext = end($farr);
                                        $ext = strtolower($ext);

                                        $img = DOMAIN . 'theme/default/img/doc.svg';

                                        if($ext == 'pdf')
                                            $img = DOMAIN . 'theme/default/img/pdf.svg';
                                        
                                        if($ext == 'xls' || $ext == 'xlsx')
                                            $img = DOMAIN . 'theme/default/img/xls.svg';
                                    ?>
                                    <img src="<?php echo $img; ?>" />
                                </div>
                                    <div class="tailieu-title">
                                        <?php echo $this->App->t('title', $v['Node']); ?>
                                        <?php echo $this->App->adm_link('document', $v['Node']['id']); ?>
                                    </div>
                                    <div class="tailieu-link">
                                        <a href="<?php echo DOMAIN . $v['Document']['link']; ?>" target="_blank">
                                            <i class="fa fa-download"></i>
                                            <?php echo $this->App->t('download'); ?>
                                        </a>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                    <div class="col-sm-12 paging">
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

            <div class="col-sm-3"><?php echo View::element('sidebar'); ?></div>
        </div>
    </div>
</div>
