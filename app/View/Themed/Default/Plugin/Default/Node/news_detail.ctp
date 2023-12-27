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
    */ ?>

    <div class="unit-page-background-header lazy" data-bg="<?php echo DOMAIN . $this->App->t('general_text_18'); ?>">
        <div class="background-filter first-banner"></div>
        <div class="unit-page-header">
        </div>
    </div>
    <?php echo $this->App->adm_link('lang', 'general_text_18', 'image'); ?>

    <div class="page-main-content blog-main-content">
        <div class="wrap1140">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-8 col-md-9">
                        <div class="contentt">
                            <h2 class="new-detail-title"><?php echo $this->App->t('title', $this->data['Node']); ?></h2>
                            <div class="content-pctt"><?php echo $this->App->t('content', $this->data['News']); ?></div>

                        </div>
                    </div>
                    <div class="col-sm-4 col-md-3">
                        <?php echo View::element('sidebar-page'); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>



    <?php /*
    <div class="main-index ">
        <div class="container">
            <div class="line-breacrumb">
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
            <div class="box-home-pro page-ctt">
                <?php /*
            <div class="tt-page-ctt san-bold text-uppercase"><?php echo $this->App->t('title', $current_category['Node']); ?></div>
           
                <div class="row m-0">
                    <div class="col-large-ctt p-0">
                        <div class="sec-content-pctt">

                            <div class="box-content-pctt">
                            
                                <div class="san-bold name">
                                    <?php echo $this->App->t('title', $this->data['Node']); ?> <?php echo $this->App->adm_link('news', $this->data['Node']['id']); ?>
                                </div>
                                <div class="pctt-calender">Ngày <?php echo date('d/m/Y', $this->data['Node']['created']); ?></div>
            
                                    <h2 class="text-center"><?php echo $this->App->t('title', $this->data['Node']); ?></h2>
                                
                                <div class="content-pctt"><?php echo $this->App->t('content', $this->data['News']); ?></div>
                            </div>
                            <div class="comment-face uk-margin-top">
                                <div class="fb-comments" data-href="<?php echo DOMAIN . $this->data['Node']['slug']; ?>.html" data-width="100%" data-numposts="5"></div>
                            </div>
                            <div class="sec-tinlienquan">
                                <div class="title san-bold text-uppercase">
                                    Tin liên quan
                                </div>
                                <?php if (is_array($this->data['related']) && count($this->data['related']) > 0) { ?>
                                    <ul class="san-bold">
                                        <?php $i = 0;
                                        foreach ($this->data['related'] as $v) {
                                            $i++; ?>
                                            <?php if ($i > 5) break; ?>
                                            <li>
                                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                                    <i class="fa fa-circle"></i><?php echo $this->App->t('title', $v['Node']); ?>
                                                </a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                <?php } ?>
                            </div>
                            <section class="pctt-tinkhac">
                                <div class="san-bold title-tk">TIN KHÁC</div>
                                <div class="owl-carousel owl-carousel-tk">
                                    <?php $i = 0;
                                    foreach ($this->data['related'] as $v) {
                                        $i++; ?>
                                        <?php if ($i < 5) continue; ?>
                                        <div>
                                            <figure>
                                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                                    <?php echo $this->App->img($v['News']['image'], '', 400, 230); ?>
                                                </a>
                                            </figure>
                                            <div class="san-bold name-tk mb-2">
                                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="">
                                                    <?php echo $this->App->t('title', $v['Node']); ?>
                                                </a>
                                            </div>
                                            <div class="des-tk">
                                                <?php echo $this->App->word_limiter($v['News']['description'], 21); ?>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </section>
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
            */ ?>

    </div>
    </div>


    <?php
    // pr($this->data['related']); 
    ?>
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('.owl-carousel-tk').owlCarousel({
                autoplay: true,
                autoplayTimeout: 4000,
                autoplayHoverPause: true,
                nav: true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                loop: true,
                margin: 45,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 2,
                        nav: false
                    },
                    1000: {
                        items: 3,
                        nav: true,
                    }
                }
            })
        });
    </script> -->