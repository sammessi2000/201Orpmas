<?php
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
    <div class="page_path search-page_path" style="padding-left: 15px;">
    Kết quả tìm kiếm: <span><?php echo $searching; ?></span> 
    </div>

    <div class="clear_fix"></div>
       
    <ul class="filter">
        <li>
            <span class="criteria">Hãng</span>
            <div class="manufacture" style="display: none;">
                <button type="button" class="closefilter"><i class="iconmobile-closefil">x</i></button>
                <?php if(isset($hangs) && is_array($hangs) && count($hangs) > 0) { ?>
                <?php foreach($hangs as $v) { ?>
                <?php
                    $link = DOMAIN . 'search?s=' . $key . '&brand=' . $v['Hang']['id'];
                ?>
                <label>
                    <i class="iconmobile-checklist"></i>
                    <a href="<?php echo $link; ?>">
                        <?php echo $v['Hang']['title']; ?> 
                    </a>
                </label>
                <?php } ?>
                <?php } ?>
            </div>
        </li>
       
        <li>
            <span class="criteria">Sắp xếp</span>
            <div class="sortprice" style="display: none;">
                <button type="button" class="closefilter"><i class="iconmobile-closefil">x</i></button>
                <label class="check">
                    <a href="<?php echo $action_sort; ?>?sort=created-desc">
                        <i class="iconmobile-checklist"></i>
                        Mới nhất
                    </a>
                </label>
                
                <label class="check">
                    <a href="<?php echo $action_sort; ?>?sort=price-asc">
                        <i class="iconmobile-checklist"></i>
                        Giá tăng dần
                    </a>
                </label>

                <label class="check">
                    <a href="<?php echo $action_sort; ?>?sort=price-desc">
                        <i class="iconmobile-checklist"></i>
                        Giá giảm dần
                    </a>
                </label>
            </div>
        </li>
    </ul>

    <div class="clear_fix"></div>

    <div class="product_list">
        <div class="result-item">
            <div class="product-label-mb">
                <?php 
                    $i=0; 
                    
                    foreach($this->data as $v) 
                    { 
                        $i++;
                        $stt = '';

                        if($i==1) $stt = 'first';
                        if($i==3) $stt = 'last';

                        echo View::element('product-item-m', array('product'=>$v, 'stt' => $stt)); 
                    } 
                ?>
            </div>
        </div> 
    </div>

    <div class="paging-n bg-w pagination-product-list">
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


<script>
     $(".criteria").click(function() {
        $(".criteria").not(this).next().hide();
        $(this).next().slideDown(200);
    });
    $(".closefilter").click(function() {
        $(".filter li div").hide()
    });
</script>