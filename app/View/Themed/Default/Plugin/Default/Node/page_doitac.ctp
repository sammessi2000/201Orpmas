<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <?php } else {     ?>
                <li class="breadcrumb-item"><a>Đối tác</a>
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
    <div class="page-doitac">
        <div class="page-doitac-banner"
            style="background-image: url('<?php echo $this->data['Category']['image']; ?>')">
            <div class="wrap-bannerdes">
                <div class="banner-des"><?php echo $this->data['Category']['seo_title']; ?></div>
            </div>
        </div>

        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <span><?php echo $this->data['Category']['page_title']; ?></span>
                            <span><?php echo $this->App->t_a('general_text_6'); ?></span>
                        </div>
                        <div class="row">
                            <?php if(isset($hangs) && count($hangs)){ ?>
                            <?php foreach($hangs as $v) { ?>
                            <div class="agency-item col-doitac">
                                <img src="<?php echo $v['image']; ?>" alt="">
                            </div>
                            <?php } ?>
                            <?php } ?>
                        </div>
                        <?php /*
                        <div class="row visible-xs">
                            <div class="owl-carousel owl-carousel-agency">
                                <?php if(isset($hangs) && count($hangs)){ ?>
                                <?php foreach($hangs as $v) { ?>
                                <div class="agency-item">
                                    <img src="<?php echo $v['image']; ?>" alt="">
                                </div>
                                <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                        */ ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>