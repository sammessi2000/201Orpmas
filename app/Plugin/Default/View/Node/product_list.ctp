<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // if(isset($_GET['dev']))
    // {
    //     pr($current_category); 
    //     die;
    //     pr($_GET);
    // }
    
    $request_filters = $_GET;
    $request_str = '';
    $i=0;
    foreach($request_filters as $key=>$val)
    {
        $i++;

        if($i == 1)
            $request_str .= '?' . $key . '=' . $val;
        else
            $request_str .= '&' . $key . '=' . $val;
    }

    $action_sort = DOMAIN . $current_category['Node']['slug'] . '.html' . $request_str;
?>
<div class="main archive-product" id="breadcrumb">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
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

<div class="main archive-product">
    <div class="wrap">
        <div class="row">

            <div class="col-sm-9">
                <div class="home-news-title hr-red">
                    <span><?php echo $current_category['Node']['title']; ?></span>
                </div>

                <div class="product-list row">
                  

                        <?php $i=0; foreach($this->data as $v) { $i++; ?>
                        <div class="archive-product-item col-sm-4">
                            <div class="archive-product-item-body">
                                <div class="img">
                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="b-card-1 firt">
                                        <img width="270" height="150" class="lazy" src="<?php echo DOMAIN; ?>theme/default/img/blank.svg" data-src="<?php echo $this->App->img_src($v['Product']['image'], 270, 150); ?>" alt="" />
                                    </a>
                                </div>
                                <div class="b_title">
                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="b-card-1 firt">
                                    <span><?php echo $v['Node']['title']; ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php } ?>

                </div>

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

            <div class="col-sm-3"><?php echo View::element('sidebar'); ?></div>
        </div>
    </div>
</div>


