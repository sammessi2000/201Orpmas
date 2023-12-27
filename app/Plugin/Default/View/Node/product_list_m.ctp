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

<div id="body_content">
    <div class="page_path">
        <div class="block-breadcrumb-mb">
            <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                    <?php if($v['title'] != '') {  $i++; ?>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo $v['link']; ?>">
                                <span itemprop="name"><?php echo $v['title']; ?></span>
                            </a> 
                            <?php if($i < $n) echo '<i class="fa fa-angle-right" aria-hidden="true"></i>'; ?>
                            <meta itemprop="position" content="<?php echo $i; ?>">
                        </li>
                    <?php } ?>
                <?php } ?>
                <?php } ?>
            </ol>
        </div>
    </div>
  
    <?php echo View::element('sidebar-product-m'); ?>

    <div class="block-result-product">
            <?php 
                $i=0;
                foreach($this->data as $v) 
                { 
                    $i++;
                    $stt = '';

                    if($i==1) $stt = 'first';
                    if($i==3) $stt = 'last';

                    echo '<div class="result-item">';
                    echo '<div class="product-label-mb">';
                    echo View::element('product-item-m', array('product'=>$v, 'stt' => $stt));
                    echo '</div>';
                    echo '</div>';
                } 
            ?>
        </div>
        
        <div class="paging bg-w pagination-product-list">
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
