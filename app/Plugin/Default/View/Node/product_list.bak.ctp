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

<section class="link-url">
    <div class="container">
        <div id="breadcrumb">
            <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                    <?php if($v['title'] != '') {  $i++; ?>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo $v['link']; ?>">
                              <span itemprop="name"><?php echo $v['title']; ?></span>
                            </a> 
                            <meta itemprop="position" content="<?php echo $i; ?>">
                        </li>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
            </ol>
        </div>
    </div>
</section>

<div class="clearfix"></div>

<section class="product-category-n">
    <div class="container">
        <div class="title-n-cat">
            <h1>
                <?php echo $current_category['Node']['title']; ?>
                <?php echo $this->App->adm_link('category', $current_category['Node']['id']); ?>
            </h1>
        </div>
        
        <div class="product-category-n-content">
            <div class="pcnc-left">
                <?php echo View::element('sidebar-product'); ?>
            </div>

            <div class="pcnc-right">
                
                <?php 
                    $images = array();

                    if($current_category['Category']['images'] != '')
                        $images = explode(',', $current_category['Category']['images']);
                ?>

                <?php if(count($images) > 0) { ?>
                <div class="banner-category">
                    <div class="owl-carousel style-owl">
                        <?php foreach($images as $v) { ?>
                            <div>
                                <?php echo $this->App->img($v, '', 1320, 450); ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>

                <div class="product-cat-sort bg-w">
                    <div class="count-pro">Tìm thấy <span><?php echo $this->Paginator->counter('{:count}');  ?></span> sản phẩm</div>
                    
                    <div class="product-cat-sort-r">
                        <form class="sort-pro" method="get" action="<?php echo $action_sort; ?>">
                            <select name="sort" class="sort-pro" onchange="$('form.sort-pro').submit();">
                                <option value="">Sắp xếp sản phẩm</option>
                                <option value="created-desc">Mới nhất</option>
                                <option value="price-asc">Giá tăng dần</option>
                                <option value="price-desc">Giá giảm dần</option>
                            </select>

                            <?php /*
                            <div class="pro-list-grid">
                                <a href="javascript:;" onclick="setUserOption('product_display', 'grid', '/card-wifi')" class="img_group grid_style  active"><i class="fa fa-th-large" aria-hidden="true"></i></a>
                                <a href="javascript:;" onclick="setUserOption('product_display', 'list', '/card-wifi')" class="img_group list_style "><i class="fa fa-th-list" aria-hidden="true"></i></a>
                            </div>
                            */ ?>
                        </form>
                    </div>
                </div>
                
                <div class="producct-list-n producct-list-n-grid bg-w">
                    <?php 
                        $i=0; 
                        $num = 0;
                        
                        foreach($this->data as $v) 
                        { 
                            $i++;
                            $stt = '';

                            if($i==1) $stt = 'first';
                            if($i==3) $stt = 'last';

                            echo View::element('product-item', array('product'=>$v, 'stt' => $stt)); 
                            if($num == 4) { echo '<div class="clearfix"></div>';  $num = 0; }
                        } 
                    ?>
                </div>
               
                <div class="paging-n bg-w">
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
</section>

