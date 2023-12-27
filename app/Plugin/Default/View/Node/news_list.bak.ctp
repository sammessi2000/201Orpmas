<div class="container-fluid page-banner hidden-xs">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
            <?php if(isset($banners['page'])) { ?>
                <?php foreach($banners['page'] as $v) { ?>
                    <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" alt="<?php echo $v['Banner']['title']; ?>" />
                <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>


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

<div class="container-fluid">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <div class="site-tab tab-blue">
                    <span><?php echo $this->App->t('title', $current_category['Node']); ?></span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-9 ">
            <div class="news-list">
                <?php $i=0; foreach($this->data as $v) { $i++; ?>
                <div class="news-list-item">
                    <div class="news-list-img col-sm-4">
                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                            <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 280, 200); ?>
                        </a>
                    </div>
                    <div class="news-list-info col-sm-8">
                    	<h2>
	                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
	                            <?php echo $this->App->t('title', $v['Node']); ?>
	                        </a>
                        </h2>
                        <p><?php echo $this->App->t('description', $v['News']); ?></p>
                    </div>
                </div>
                <?php } ?>
                </div>

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
            <div class="col-sm-3 sidebar hidden-xs">
                <?php echo View::element('sidebar'); ?>
            </div>
        </div>
    </div>
</div>
