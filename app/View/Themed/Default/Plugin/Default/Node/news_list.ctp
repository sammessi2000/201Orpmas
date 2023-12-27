<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php /*
<div class="bannercatpro-vt1">
    <div class="container">
        <div>
            <?php if (isset($current_category)) { ?>
                <img src="<?php echo DOMAIN . $current_category['Category']['images']; ?>" width="100%">
                <?php echo $this->App->adm_link('category', $current_category['Node']['id']); ?>
            <?php } ?>
        </div>
    </div>
</div>

<div class="main-index news-list">
    <div class="container">
        <?php /*
        <div class="line-breacrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php foreach ($bread_array as $v) { ?>
                            <?php if (empty($v['title'])) {     ?>
                                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a></li>
                            <?php } else {     ?>
                                <li class="breadcrumb-item"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                            <?php }     ?>
                        <?php } ?>
                    </ol>
                </nav>
            </div>
        </div>
       
        <div class="box-home-pro page-ctt">
            <div class="tt-page-ctt san-bold text-uppercase"><?php echo $this->App->t('title', $current_category['Node']); ?></div>
            <div class="row m-0">
                <div class="col-large-ctt col p-0">
                    <div class="box-content-pctt">
                        <div class="san-bold name"></div>

                        <div class="box-content-pctt box-ttvff">
                            <ul>
                                <?php $i = 0;
                                $n = count($this->data);
                                foreach ($this->data as $v) {
                                    $i++; ?>
                                    <li>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <figure class="mb-0">
                                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                                        <?php echo $this->App->img($v['News']['image'], '', 200, 120); ?>
                                                    </a>
                                                </figure>
                                            </div>
                                            <div class="col-md-9">
                                            
                                            <div class="line-calendar">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <?php echo date('M d,Y', $v['Node']['created']); ?>
                                            </div>
                                            
                                                <div class="name-list-gd san-bold">
                                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                                        <?php echo $this->App->t('title', $v['Node']); ?>
                                                    </a>
                                                </div>
                                                <div class="des-lg-gd">
                                                    <?php echo $this->App->word_limiter($this->App->t('description', $v['News']), 28); ?>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                        <nav>
                            <ul class="pagination justify-content-end">
                                <?php
                                $first = $this->Paginator->first('<');
                                $first = str_replace('default/node/index/', '', $first);
                                $first = str_replace('/.html', '.html', $first);
                                $first = str_replace('<span class="current">', '<li  class="page-item active">', $first);
                                $first = str_replace('<span>', '<li  class="page-item">', $first);
                                $first = str_replace('</span', '</li', $first);
                                $first = str_replace('current', 'active', $first);

                                $last = $this->Paginator->last('>');
                                $last = str_replace('default/node/index/', '', $last);
                                $last = str_replace('/.html', '.html', $last);
                                $last = str_replace('<span class="current">', '<li  class="page-item active">', $last);
                                $last = str_replace('<span', '<li  class="page-item"', $last);
                                $last = str_replace('</span', '</li', $last);
                                $last = str_replace('current', 'active', $last);

                                $pages = $this->Paginator->numbers(array('separator' => ' '));
                                $pages = str_replace('default/node/index/', '', $pages);
                                $pages = str_replace('/.html', '.html', $pages);
                                $pages = str_replace('<span class="current">', '<li  class="page-item active">', $pages);
                                $pages = str_replace('<span', '<li  class="page-item"', $pages);
                                $pages = str_replace('</span', '</li', $pages);
                                $pages = str_replace('current', 'active', $pages);


                                echo $first;
                                echo $pages;
                                echo $last;
                                ?>
                            </ul>
                        </nav>

                    </div>
                </div>
                <div class="sidebar-pctt">
                    <?php echo View::element('sidebar'); ?>
                </div>
            </div>
        </div>
        <?php /*
        <section class="line-banner2">
            <a href="<?php echo $this->App->t('news_text_2_link'); ?>">
                <img src="<?php echo DOMAIN . $this->App->t('news_text_2'); ?>">
            </a>
            <?php echo $this->App->adm_link('lang', 'news_text_2', 'image_link'); ?>
        </section>
        
    </div>
</div>
*/ ?>

<div class="unit-page-background-header lazy" data-bg="<?php echo DOMAIN . $this->App->t('general_text_18'); ?>">
    <div class="background-filter first-banner"></div>
    <div class="unit-page-header">
        <div class="wrap">
            <h1><?php echo $this->App->t_a('general_text_19'); ?></h1>
        </div>
    </div>
</div>
<?php echo $this->App->adm_link('lang', 'general_text_18', 'image'); ?>

<div class="page-main-content blog-main-content">
    <div class="wrap1140">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div class="contentt">
                        <p class="lts-new"><?php echo $this->App->t_a('general_text_20'); ?></p>
                        <?php if (isset($this->data) && count($this->data) > 0) {
                            $i = 0;
                            foreach ($this->data as $v) {
                                $i++; ?>
                                <?php if ($i > 1) break; ?>
                                <div class="blog-main-content-item">
                                    <a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo $this->App->t('title', $v['Node']); ?>">
                                        <div class="blog-main-content-item-img">
                                            <img width="360px" height="208px" src="<?php echo DOMAIN . $v['News']['image']; ?>" alt="news">
                                        </div>
                                    </a>

                                    <div class="bl-item-content">
                                        <h4><a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo  $this->App->t('title', $v['Node']); ?>">
                                                <?php echo $this->App->t('title', $v['Node']); //echo $v['Node']['title']; 
                                                ?>
                                                <?php //echo $v['Node']['title']; 
                                                ?>
                                                <?php //echo $this->App->adm_link('news', $v['Node']['id'], 'text');
                                                ?>
                                            </a></h4>
                                        <p class="lc-date"><?php echo date('d/m/Y', $v['Node']['created']); ?></p>
                                    </div>

                                    <div class="bl-item-description">
                                        <p>
                                            <?php echo $v['News']['description']; ?>
                                        </p>
                                    </div>

                                    <a href="<?php echo $this->App->get_node_link($v); ?>" class="unit-page-btn" title="<?php echo  $this->App->t('title', $v['Node']); ?>">Continue reading <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.48688 8.7484H17.0292M17.0292 8.7484L9.56889 1.28809M17.0292 8.7484L9.56889 16.2087" stroke="#000" stroke-width="1.86508" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            <?php } ?>
                        <?php } ?>

                        <div class="container-fluid">
                            <div class="row">
                                <?php if (isset($this->data) && count($this->data) > 0) {
                                    $i = 0;
                                    $idu = '';
                                    foreach ($this->data as $v) {
                                        $i++; ?>
                                        <?php if ($i < 2) continue; ?>
                                        <?php if ($i > 5) break; ?>
                                        <?php if ($i % 2 == 0) {
                                            $idu = 'item-left';
                                        } else {
                                            $idu = 'item-right';
                                        }; ?>

                                        <div class="col-sm-6">
                                            <div class="news-list-item <?php echo $idu ?>">
                                                <a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo  $this->App->t('title', $v['Node']); ?>">
                                                    <div class="news-list-item-img">
                                                        <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['News']['image']; ?>" alt="news">
                                                    </div>
                                                </a>
                                                <h3><a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo  $this->App->t('title', $v['Node']); ?>">
                                                        <?php echo $this->App->t('title', $v['Node']); //echo $v['Node']['title']; 
                                                        ?>
                                                    </a></h3>
                                                <p class="lc-date"><?php echo date('d/m/Y', $v['Node']['created']); ?></p>
                                                <div class="bl-item-description">
                                                    <p>
                                                        <?php echo $v['News']['description'];
                                                        ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>

                        <nav>
                            <ul class="pagination ">
                                <?php
                                $first = $this->Paginator->first('<');
                                $first = str_replace('default/node/index/', '', $first);
                                $first = str_replace('/.html', '.html', $first);
                                $first = str_replace('<span class="current">', '<li  class="page-item active">', $first);
                                $first = str_replace('<span>', '<li  class="page-item">', $first);
                                $first = str_replace('</span', '</li', $first);
                                $first = str_replace('current', 'active', $first);

                                $last = $this->Paginator->last('>');
                                $last = str_replace('default/node/index/', '', $last);
                                $last = str_replace('/.html', '.html', $last);
                                $last = str_replace('<span class="current">', '<li  class="page-item active">', $last);
                                $last = str_replace('<span', '<li  class="page-item"', $last);
                                $last = str_replace('</span', '</li', $last);
                                $last = str_replace('current', 'active', $last);

                                $pages = $this->Paginator->numbers(array('separator' => ' '));
                                $pages = str_replace('default/node/index/', '', $pages);
                                $pages = str_replace('/.html', '.html', $pages);
                                $pages = str_replace('<span class="current">', '<li  class="page-item active">', $pages);
                                $pages = str_replace('<span', '<li  class="page-item"', $pages);
                                $pages = str_replace('</span', '</li', $pages);
                                $pages = str_replace('current', 'active', $pages);


                                echo $first;
                                echo $pages;
                                echo $last;
                                ?>
                            </ul>
                        </nav>

                    </div>
                </div>
                <div class="col-sm-4 col-md-3">
                    <?php echo View::element('sidebar'); ?>
                </div>
            </div>
        </div>
    </div>

</div>