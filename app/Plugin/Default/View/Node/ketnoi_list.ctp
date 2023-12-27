<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    $cat_list = array();

    foreach($categories as $v)
    {
        if($v['Category']['type'] == 'ketnoi')
            $cat_list[$v['Category']['id']] = $v['Category']['title'];
    }
?>

<div class="main archive-product">
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

                <div class="product-search ">
                    <div class="row ">
                        <div class="col-sm-4">
                            <div class="search-label">
                                Hội / hiệp hội Nữ doanh nhân tỉnh thành
                            </div>
                            <div class="search-select">
                                <select>
                                <option>Chọn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-label">
                                Lĩnh vực hoạt động
                            </div>
                            <div class="search-select">
                                <select>
                                <option>Chọn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="search-label">
                                Tìm kiếm
                            </div>
                            <div class="search-select">
                                <input type="text" name="" value="" placeholder="Tìm kiếm" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-list row">
                  

                        <?php $i=0; foreach($this->data as $v) { $i++; ?>
                        <div class="archive-product-item col-sm-4">
                            <div class="archive-product-item-body">
                                <div class="img">
                                    <img width="270" height="150" class="lazy" src="<?php echo DOMAIN; ?>theme/default/img/blank.svg" data-src="<?php echo $this->App->img_src($v['Ketnoi']['image'], 270, 150); ?>" alt="" />
                                </div>
                                <div class="b_title">
                                    <span><?php echo $v['Node']['title']; ?></span>
                                </div>
                                <div class="b_cat">
                                    <?php echo isset($cat_list[$v['Ketnoi']['category_id']]) ? $cat_list[$v['Ketnoi']['category_id']] : ''; ?>

                                    <span>
                                    </span>
                                </div>
                            </div>
                                <div class="hidden data-hover">
                                    <div class="archive-product-item-body">
                                        <div class="img">
                                            <img width="270" height="150" class="lazy" src="<?php echo DOMAIN; ?>theme/default/img/blank.svg" data-src="<?php echo $this->App->img_src($v['Ketnoi']['image'], 460, 256); ?>" alt="" />
                                        </div>
                                        <div class="h-title">
                                            <span><?php echo $v['Node']['title']; ?></span>
                                        </div>
                                        <div class="h-des">
                                            <span><?php echo $v['Ketnoi']['des']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-1"></i>
                                            <span><?php echo $v['Ketnoi']['loaihinh']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-2"></i>
                                            <span><?php echo $v['Ketnoi']['diachi']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-3"></i>
                                            <span><?php echo $v['Ketnoi']['dienthoai']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-4"></i>
                                            <span><?php echo $v['Ketnoi']['email']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-5"></i>
                                            <span><?php echo $v['Ketnoi']['nghanhnghe']; ?></span>
                                        </div>
                                        <div class="h-info">
                                            <i class="hicon icon-6"></i>
                                            <span><?php echo isset($cat_list[$v['Ketnoi']['category_id']]) ? $cat_list[$v['Ketnoi']['category_id']] : ''; ?></span>
                                        </div>
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


<script type="text/javascript">
    $('.archive-product-item').hover(function() {
        $(this).find('.data-hover').removeClass('hidden');
    }, function() {
        $(this).find('.data-hover').addClass('hidden');
    })
</script>