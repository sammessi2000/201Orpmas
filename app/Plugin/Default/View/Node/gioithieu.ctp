<!-- <div class="container-fluid banner">
    <div class="row">
        <div class="wrap-1260">
            <div class="col-sm-12">
                <div class="bread">
                    <a href="<?php echo DOMAIN; ?>">Trang chủ</a> &raquo;
                    <a href="#"><?php echo $current_category['Node']['title']; ?></a>
                </div>
                <div class="page-title"><?php echo $current_category['Node']['title']; ?></div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid page-archive">
    <div class="row">
        <div class="wrap wrap-1000">
            <div class="col-sm-4 sidebar">
                <ul>
                    <li class="active"><a href="#tab1">Giới thiệu chung</a></li>
                    <li><a href="#tab2">Đối tượng dự thi</a></li>
                    <li><a href="#tab3">Thể lệ cuộc thi</a></li>
                    <li><a href="#tab4">Hệ thống giải thưởng</a></li>
                </ul>
            </div>
            <div class="col-sm-8 gioithieu-main">
                <div class="gioithieu-title">
                    <span></span>
                </div>
                <div id="tab1" class="tab active content">
                    <div class="page-title">
                        <?php echo $this->App->t('gioithieuchung'); echo $this->App->adm_link('lang', 'gioithieuchung'); ?>
                    </div>
                    <div class="page-content">
                        <?php echo $this->App->t('gioithieucontent'); echo $this->App->adm_link('lang', 'gioithieucontent', 'editor'); ?>
                    </div>
                </div>

                <div id="tab2" class="tab content">
                    <div class="page-title">
                        <?php echo $this->App->t('gioithieut-2'); echo $this->App->adm_link('lang', 'gioithieut-2'); ?>
                    </div>
                    <div class="page-content">
                        <?php echo $this->App->t('gioithieucontent-2'); echo $this->App->adm_link('lang', 'gioithieucontent-2', 'editor'); ?>
                    </div>
                </div>

                <div id="tab3" class="tab content">
                    <div class="page-title">
                        <?php echo $this->App->t('gioithieut-3'); echo $this->App->adm_link('lang', 'gioithieut-3'); ?>
                    </div>
                    <div class="page-content">
                        <?php echo $this->App->t('gioithieucontent-3'); echo $this->App->adm_link('lang', 'gioithieucontent-3', 'editor'); ?>
                    </div>
                </div>

                <div id="tab4" class="tab content">
                    <div class="page-title">
                        <?php echo $this->App->t('gioithieut-4'); echo $this->App->adm_link('lang', 'gioithieut-4'); ?>
                    </div>
                    <div class="page-content">
                        <?php echo $this->App->t('gioithieucontent-4'); echo $this->App->adm_link('lang', 'gioithieucontent-4', 'editor'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('.sidebar li').click(function() {
        $('.sidebar li').removeClass('active');
        $(this).addClass('active');

        var tab = $(this).find('a').attr('href');
        $('.tab').fadeOut();
        $(tab).fadeIn();

        return false;
    });

    jQuery('.jcarousel').jcarousel({
        vertical: false
    }).jcarouselAutoscroll({
        interval: 3000,
        target: '+=1',
        autostart: true
    });
</script>