<?php //pr($banners) ; ?>

<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro page-video">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <?php } else {     ?>
                <li class="breadcrumb-item">Ảnh và Video
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
    <?php echo $this->App->adm_link('lang','general_text_21','image'); ?>
    <div class="page-tuyendung ">
        <div class="page-tuyendung-banner"
            style="background-image: url('<?php echo DOMAIN . $this->App->t('general_text_21'); ?>')">
            <div class="wrap-bannerdes">
                <div class="banner-des"><?php echo $this->App->t_a('general_text_20'); ?></div>
            </div>
        </div>

        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title">
                            <span><?php echo $this->App->t_a('general_text_22'); ?></span>
                            <span><?php echo $this->App->t_a('general_text_23'); ?></span>
                        </div>
                        <?php //pr($banners['images_page']); ?>

                        <?php if(isset($banners) && count($banners)){ ?>
                        <div class="row imgandvideo-section">
                            <?php $i=0; foreach($banners['images_page'] as $v){ $i++; ?>

                            <?php if($v['Banner']['link'] != '#'){ ?>
                                <div class="col-sm-3 video-item imgandvideo-item">
                                    <?php 
                                        $yurl = $v['Banner']['link'];
                                        $yid = '';
                                        preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $yurl, $yid);

                                    ?>
                                    <a href="javascript:;" onclick="openvideo('<?php echo $yid[0]; ?>');">
                                        <img src="<?php echo $this->App->img_src($v['Banner']['image'], 300 ,168); ?>"
                                            alt="">
                                        <img class="play-youtube-btn"
                                            src="<?php echo DOMAIN . 'uploads/images/img/play.svg' ;?>" alt="">
                                    </a>
                                    <div class="img-pageimg-title">
                                        <?php echo $v['Banner']['title']; ?>
                                    </div>
                                </div>
                            <?php }else{ ?>
                                <div class="col-sm-3 imgandvideo-item">
                                    <a href="javascript:;" class="show-image-array image-item">
                                        <img src="<?php echo $this->App->img_src($v['Banner']['image'], 300 ,168); ?>"
                                            alt="">
                                    </a>
                                    <div class="img-pageimg-title">
                                        <?php echo $v['Banner']['title']; ?>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($i == 4) { echo '<div class="clearfix"></div>'; $i = 0; } ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade modal-ytb" id="modal-ytb">
    <div class="modal-dialog">
        <div class="modal-close"></div>
        <div class="modal-content">
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>

<div class="slider-product slider-img-product">
    <div class="slider-body slider-img-body">
        <div class="slider-img-wrap">
            <div class="big-thumb">
                <?php if (isset($banners['images_page']) && count($banners['images_page']) > 0) {     ?>
                <?php $i = 0;
                        foreach ($banners['images_page'] as $v) {     ?>
                <?php if($v['Banner']['link'] == '#'){ ?>
                <img src="<?php echo $this->App->img_src($v['Banner']['image'], 600, 350) ?>" alt="">
                <span><?php echo $v['Banner']['title'] ?></span>
                <?php $i++; ?>
                <?php } if($i == 1) break;     ?>
                <?php }     ?>
                <?php }     ?>
                <div class="next-img-btn slider-btn next-btn">
                    <svg width="23" height="41" viewBox="0 0 23 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L21 20.3166L1 39.7244" stroke="white" stroke-width="2" stroke-miterlimit="10"
                            stroke-linecap="round" />
                        <use href='#slider-next'></use>
                    </svg>
                </div>
                <div class="pre-img-btn slider-btn pre-btn">
                    <svg width="23" height="41" viewBox="0 0 23 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M22 39.7244L2 20.4077L22 0.999993" stroke="white" stroke-width="2"
                            stroke-miterlimit="10" stroke-linecap="round" />
                        <use href='#slider-pre'></use>
                    </svg>
                </div>
            </div>
            <div class="img-thumb">
                <div class="owl-carousel owl-img-thumb">
                    <?php if (isset($banners['images_page']) && count($banners['images_page']) > 0) {     ?>
                    <?php $i = 0;
                        foreach ($banners['images_page'] as $v) {     ?>
                    <?php if($v['Banner']['link'] == '#'){ ?>
                    <div class="img-slide-item" data-index="<?php echo $i ?>"
                        data-img='<?php echo $this->App->img_src($v['Banner']['image'], 900, 450) ?>'
                        data-text='<?php echo $v['Banner']['title'] ?>'>
                        <img src="<?php echo $this->App->img_src($v['Banner']['image'], 750, 400) ?>" alt="">

                    </div>
                    <?php $i++;     ?>
                    <?php }     ?>
                    <?php }     ?>
                    <?php }     ?>
                </div>
                <div class="next-img-btn slider-btn next-btn">
                    <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M1 1L9 8.72665L1 16.4897" stroke="#A9A9A9" stroke-width="1.8" stroke-miterlimit="10"
                            stroke-linecap="round" />
                        <use href='#slider-next'></use>
                    </svg>
                </div>
                <div class="pre-img-btn slider-btn pre-btn">
                    <svg width="11" height="18" viewBox="0 0 11 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10 1L2 8.72665L10 16.4897" stroke="#A9A9A9" stroke-width="1.8" stroke-miterlimit="10"
                            stroke-linecap="round" />
                        <use href='#slider-pre'></use>
                    </svg>
                </div>
            </div>
        </div>
        <div class="slider-img-close slider-close">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M1 1L21 21" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" />
                <path d="M1 21L21 1" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" />
            </svg>
        </div>
    </div>
</div>