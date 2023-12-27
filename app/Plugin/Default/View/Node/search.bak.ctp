<?php $max = (isset($is_mobile) && $is_mobile == 1) ? 2 : 4; ?>

<?php $bread_array = $this->App->breadarray($current_category); ?>
<div class="container-fluid bread">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <?php if(is_array($bread_array) && count($bread_array)>0) { ?>
                    <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { $i++; ?>
                    <li <?php if($i==$n) echo 'class="li-last"'; ?>><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid archive">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-3 sidebar">
                <?php echo View::element('sidebar'); ?>
            </div>
            <div class="col-sm-9 product-list">
                <form action="<?php echo DOMAIN; ?>search" method="get">
                <div class="product-slider-tab">
                    <div class="row">
                        <div class="col-sm-3">&nbsp;</div>
                        <div class="col-sm-3">
                            <div class="form-search" method="post">
                                <input type="text" name="search_key" class="search_key" placeholder="<?php echo $lang=='vi' ? 'Tìm kiếm' : 'Search'; ?>" />
                                <input type="submit" name="submit" class="search_submit" />
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <?php if(isset($category_boloc) && count($category_boloc) > 0) { ?>
                            <select class="product-slider-tab-item" name="c">
                                <option value=""><?php echo $this->App->t('product'); ?></option>
                                <?php foreach($category_boloc as $v) { ?>
                                <option value="<?php echo $v['Category']['id']; ?>"><?php echo $this->App->t('title', $v['Node']); ?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                        </div>
                        <div class="col-sm-3">
                            <?php if(isset($price_range) && count($price_range) > 0) { ?>
                            <select class="product-slider-tab-item" name="p">
                                <?php foreach($price_range as $k=>$v) { ?>
                                <option value="<?php echo $k; ?>"><?php echo $v; ?></option>
                                <?php } ?>
                            </select>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                </form>

                <div class="clearfix"></div>

                <div class="product-list-tab product-list-tab-2">
                    <span><?php echo $this->App->t('kqtk') ; echo $this->App->adm_link('lang', 'kqtk'); ?>
                    "<?php echo $searching; ?>"</span>
                </div>

                <div class="clearfix"></div>

                <div class="product-list-archive">
                <?php foreach($this->data as $v) { ?>
                    <div class="product-item col-sm-3 col-xs-6">
                        <div class="product-item-content">
                            <div class="product-item-img">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                    <?php echo $this->App->img($v['Product']['image'], $this->App->t('title', $v['Node']), 219, 209); ?>
                                </a>
                            </div>
                            <div class="product-item-title">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                    <?php echo $this->App->t('title', $v['Node']); ?>
                                </a>
                            </div>
                            <div class="product-item-price">
                                <div class="price">
                                    <span><?php echo number_format($v['Product']['price']); ?></span> vnđ
                                </div>
                                <?php if($v['Product']['price_off'] != 0) { ?>
                                    <div class="price-off">
                                        <span><?php echo number_format($v['Product']['price_off']); ?></span> vnđ
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="clearfix"></div>
                            <div class="product-item-act">
                                <div class="act-buy" id="<?php echo $v['Node']['id']; ?>"><?php echo $this->App->t('buy'); ?></div>
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                    <span class="act-more">&nbsp;</span>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>

                <div class="clearfix"></div>

                <div class="pagination">
                    <?php 
                        $first = $this->Paginator->first('<');
                        $first = str_replace('default/node/index/', '', $first);
                        $first = str_replace('/.html', '.html', $first);

                        $last = $this->Paginator->last('>');
                        $last = str_replace('default/node/index/', '', $last);
                        $last = str_replace('/.html', '.html', $last);

                        $pages = $this->Paginator->numbers(array('separator'=>' '));
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



<?php /*
<?php 
    $first = $this->Paginator->first('<<');
    $first = str_replace('default/node/index/', '', $first);
    $first = str_replace('/.html', '.html', $first);
    
    $first = str_replace('<span', '<li', $first);
    $first = str_replace('</span', '</li', $first);

    $last = $this->Paginator->last('>>');
    $last = str_replace('default/node/index/', '', $last);
    $last = str_replace('/.html', '.html', $last);
    
    $last = str_replace('<span', '<li', $last);
    $last = str_replace('</span', '</li', $last);

    $pages = $this->Paginator->numbers(array('separator'=>' '));
    $pages = str_replace('default/node/index/', '', $pages);
    $pages = str_replace('/.html', '.html', $pages);
    
    $pages = str_replace('<span', '<li', $pages);
    $pages = str_replace('</span', '</li', $pages);

    echo '<ul class="pagelist">';
    echo $first;
    echo $pages;
    echo $last;
    echo '</ul>';
?>

*/ ?>