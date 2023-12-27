<div class="clearfix"></div>

<ul class="ha"><li><h3><?php echo $current_category['Node']['title']; ?></h3></li></ul>
<ul class="uc">
	<?php foreach($this->data as $v) { ?>
    <li class="c">
        <a class="m" href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
        	<?php echo $this->App->img($v['Product']['image'], $v['Node']['title'], 260, 260); ?>
        </a>
        <strong><a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html"><?php echo $v['Node']['title']; ?></a></strong>
        <?php if($v['Product']['price_off'] > 0) { ?>
            <p class="pl-std-l-price-off">
                <?php echo number_format($v['Product']['price_off']); ?> đ   
                <span>-<?php echo $v['Product']['selloff']; ?>%</span>  
            </p>
        <?php } ?>    
        <span>Giá: <?php echo number_format($v['Product']['price']); ?> ₫</span>
    </li>
	<?php } ?>
    <li class="cl"></li>
</ul>

<div class="clearfix"></div>

<div class="pagination-bg">
    <ul id="pagination" class="l pagination">
    <?php 
        $first = $this->Paginator->first('<');
        $first = str_replace('default/node/index/', '', $first);
        $first = str_replace('/.html', '.html', $first);
        $first = str_replace('<span', '<li', $first);
        $first = str_replace('</span', '</li', $first);
        $first = str_replace('current', 'active', $first);

        $last = $this->Paginator->last('>');
        $last = str_replace('default/node/index/', '', $last);
        $last = str_replace('/.html', '.html', $last);
        $last = str_replace('<span', '<li', $last);
        $last = str_replace('</span', '</li', $last);
        $last = str_replace('current', 'active', $last);

        $pages = $this->Paginator->numbers(array('separator'=>' '));
        $pages = str_replace('default/node/index/', '', $pages);
        $pages = str_replace('/.html', '.html', $pages);
        $pages = str_replace('<span', '<li', $pages);
        $pages = str_replace('</span', '</li', $pages);
        $pages = str_replace('current', 'active', $pages);


        echo $first;
        echo $pages;
        echo $last;
    ?>
    </ul>
</div>