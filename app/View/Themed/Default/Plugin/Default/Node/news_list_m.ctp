<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="bannercatpro-vt1">
    <div class="container">
        <div>
            <a href="<?php echo $this->App->t('news_text_1_link'); ?>">
                <img src="<?php echo DOMAIN . $this->App->t('news_text_1'); ?>">
            </a>
            <?php echo $this->App->adm_link('lang', 'news_text_1', 'image_link'); ?>
        </div>
    </div>
</div>

<div class="main-index news-list">
    <div class="container">
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
                                                <?php /*
                                            <div class="line-calendar">
                                                <i class="fa fa-calendar"></i>&nbsp;
                                                <?php echo date('M d,Y', $v['Node']['created']); ?>
                                            </div>
                                            */ ?>
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
        <section class="line-banner2">
            <a href="<?php echo $this->App->t('news_text_2_link'); ?>">
                <img src="<?php echo DOMAIN . $this->App->t('news_text_2'); ?>">
            </a>
            <?php echo $this->App->adm_link('lang', 'news_text_2', 'image_link'); ?>
        </section>
    </div>
</div>