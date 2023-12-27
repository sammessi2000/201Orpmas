<?php echo View::element('slider-owl'); ?>

<div class="main">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-8">
                <div class="home-news khaigiang">
                    <div class="home-news-title noborder">
                        <span><?php echo $this->App->t_a('home_tab_1'); ?></span>
                    </div>

                    <div class="home-news-body">
                    <table>
                        <tr class="head">
                            <th>Khóa học</th>
                            <th>Khai giảng</th>
                            <th>Địa điểm</th>
                            <th class="goall text-right">
                                <i class="icon-round fa fa-chevron-right"></i>
                                <span>Tất cả</span>
                            </th>
                        </tr>
                        <?php foreach($this->data['khoahoc'] as $v) { ?>
                        <tr class="body">
                            <td>
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                <?php echo $v['Node']['title']; ?>
                                </a>
                            </td>
                            <td><?php echo date('d/m/Y h:i', $v['Product']['khaigiang']); ?></td>
                            <td><?php echo $v['Product']['address']; ?></td>
                            <td class="text-right">
                                <i class="icon-round fa fa-chevron-right"></i>
                            </td>
                        </tr>
                        <?php } ?>
                    </table>
                    </div>
                </div>

                <?php if(isset($banners['homebottom'])) { ?>
                <div class="home-banner">
                <?php foreach($banners['homebottom'] as $v) : ?>
                    <a href="<?php echo $v['Banner']['link']; ?>">
                        <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" />
                    </a>
                <?php endforeach; ?>
                </div>
                <?php } ?>

                <div class="clearfix"></div>

                <div class="row home-video">
                    <div class="col-sm-8">
                        <div class="home-news ">
                            <div class="home-news-title noborder">
                                <span><?php echo $this->App->t_a('video'); ?></span>
                            </div>

                            <div class="home-video-frm">
                                
                                <?php echo $this->App->t('videogt_link'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 home-reg-form">
                        <div class="home-news-title noborder">
                            <span><?php echo $this->App->t_a('home_tab_4'); ?></span>
                        </div>

                        <div class="home-reg-form-body">
                            <form>
                                <div class="form-item">
                                    <div class="form-item-label">
                                        Họ và tên
                                    </div>
                                    <div class="form-item-input">
                                        <input type="text" name="fullname" required="required" value="" placeholder="Nhập Họ và Tên" />
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-label">
                                        Số điện thoại
                                    </div>
                                    <div class="form-item-input">
                                        <input type="text" name="fullname" required="required" value="" placeholder="Nhập số điện thoại" />
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-label">
                                        Email
                                    </div>
                                    <div class="form-item-input">
                                        <input type="email" name="email" required="required" value="" placeholder="Nhập Email" />
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-label">
                                        Nội dung
                                    </div>
                                    <div class="form-item-input">
                                        <textarea name="content" placeholder="Nhập nội dung"></textarea>
                                    </div>
                                </div>
                                <div class="form-item">
                                    <div class="form-item-input">
                                        <button type="submit">Đăng ký ngay</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>



                <?php if(isset($this->data['team']) && is_array($this->data['team']) && count($this->data['team']) > 0) { ?>
                <div class="home-giangvien">
                    <div class="home-news-title noborder">
                        <span><?php echo $this->App->t_a('home_tab_3'); ?></span>
                    </div>

                    <div class="home-owl-giangvien">
                        <div class="owl-carousel ">
                            <?php $i=0; foreach($this->data['team'] as $v) { $i++; ?>
                            <div class="giangvien-item">
                                <div class="giangvien-image">
                                    <img src="<?php echo DOMAIN . $v['Team']['image']; ?>" />
                                </div>
                                <div class="giangvien-title">
                                    <?php echo $v['Team']['fullname']; ?>
                                </div>
                                <div class="giangvien-des">
                                    <?php echo $v['Team']['content']; ?>
                                </div>
                                <div class="giangvien-rate">
                                    <?php 
                                        if($v['Team']['stars'] > 0)
                                        {
                                            echo '<ul>';
                                            for($i = 0; $i < $v['Team']['stars']; $i++)
                                            {
                                                echo '<li class="active"><span></span></li>';
                                            }

                                            if($v['Team']['stars'] < 5)
                                            {
                                                $con = 5 - $v['Team']['stars'];

                                                for($i = 0; $i < $con; $i++)
                                                {
                                                    echo '<li><span></span></li>';
                                                }
                                            }
                                            echo '</ul>';
                                        }
                                    ?>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>


                <?php if(isset($banners['partner']) && is_array($banners['partner']) && count($banners['partner']) > 0) { ?>
                <div class="home-news-title noborder">
                    <span><?php echo $this->App->t_a('home_tab_5'); ?></span>
                </div>

                <div class="home-owl-partner">
                    <div class="owl-carousel ">
                        <?php $i=0; foreach($banners['partner'] as $v) { $i++; ?>
                        <div>
                            <a href="<?php echo $v['Banner']['link']; ?>">
                                <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" />
                            </a>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div class="col-sm-4">
                <?php echo View::element('sidebar-home'); ?>
            </div>
        </div>
    </div>
</div>
<?php /*
<div class="main">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-6">
                <?php if(is_array($this->data['news_featured']) && count($this->data['news_featured']) > 0) { ?>
                <?php $v = $this->data['news_featured'][0]; ?>
                <div class="featured_news">
                    <div class="news-image">
                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                            <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 600, 420); ?>
                        </a>
                    </div>

                    <div class="news-title">
                        <h2>
                            <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                <?php echo $this->App->word_limiter($v['Node']['title'], 15); ?>
                            </a>
                        </h2>
                    </div>

                    <div class="news-des">
                        <p><?php echo $this->App->word_limiter($v['News']['description'], 42); ?></p>
                    </div>
                </div>
                <?php } ?>

                <div class="featured_news-owl">
                    <div class="owl-carousel owl-carousel-main">
                        <?php $i=0; foreach($this->data['news_featured'] as $v) { $i++; ?>
                        <?php if($i==1) continue; ?>

                        <div class="news-item">
                            <div class="news-image">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                    <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 210, 147); ?>
                                </a>
                            </div>

                            <div class="news-title">
                                <h3>
                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                        <?php echo $this->App->word_limiter($v['Node']['title'], 15); ?>
                                    </a>
                                </h3>
                            </div>

                            <div class="news-des">
                                <p><?php echo $this->App->word_limiter($v['News']['description'], 8); ?></p>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>


                <div class="home-news home-video">
                    <div class="home-news-title hr-gray">
                        <span><?php echo $this->App->t_a('video'); ?></span>
                    </div>

                    <div class="home-video-frm">
                        
                        <?php echo $this->App->t('videogt_link'); ?>
                    </div>

                    <div class="home-video-title">
                        <?php echo $this->App->t_a('videogt', 'text_link'); ?>
                    </div>
                </div>


                <?php if(isset($categories_home) && is_array($categories_home) && count($categories_home) > 0) { ?>
                <?php $i=0; foreach($categories_home as $category) { $i++; ?>
                <div class="home-news">
                    <div class="home-news-title hr-<?php echo $i==1 ? 'yellow' : 'blue'; if($i==2) $i=0; ?>">
                        <span><?php echo $category['Node']['title']; ?></span>
                    </div>

                    <?php 
                        $data = $this->requestAction('/default/node/get_nodes', array('category_data'=>$category));
                    ?>
                    <div class="row">
                    <?php if(isset($data) && is_array($data) && count($data) > 0) { ?>
                    <?php $j=0; foreach($data as $v) { $j++; ?>
                    <?php if($j>5) break; ?>
                    <div class="news-item col-xs-6 col-sm-12 <?php if($j==5) echo 'last hidden-xs'; ?>">
                        <div class="row">
                            <div class="news-image col-sm-3">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                    <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 210, 147); ?>
                                </a>
                            </div>
                            <div class="col-sm-9">
                                <div class="news-title">
                                    <h3>
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                            <?php echo $this->App->word_limiter($v['Node']['title'], 15); ?>
                                        </a>
                                    </h3>
                                </div>

                                <div class="news-des">
                                    <p><?php echo $this->App->word_limiter($v['News']['description'], 19); ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                </div>
                <?php } ?>
                <?php } ?>



            </div>

            <div class="col-sm-3">

                <div class="home-news home-sidebar1">
                    <div class="home-news-title hr-blue">
                        <span><?php echo $this->App->t_a('most_read'); ?></span>
                    </div>


                    <?php if(isset($most_read) && is_array($most_read) && count($most_read) > 0) { ?>
                    <?php $j=0; foreach($most_read as $v) { $j++; ?>
                    <?php if($j>5) break; ?>
                    <div class="news-item news-item-top <?php if($j==6) echo 'last'; ?>">
                        <div class="row">
                            <div class="news-image col-sm-5">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                    <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 210, 147); ?>
                                </a>
                            </div>
                            <div class="col-sm-7">
                                <div class="news-title">
                                    <h3>
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                            <?php echo $this->App->word_limiter($v['Node']['title'], 15); ?>
                                        </a>
                                    </h3>
                                    <p class="visible-xs">
                                        <?php echo $this->App->word_limiter($v['News']['description'], 19); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>

                <div class="clearfix"></div>

                <div class="home-news-title hr-green">
                    <span><?php echo $this->App->t_a('skst_txt'); ?></span>
                </div>

                <?php
                    $category_id = $this->App->t('skst_id');
                    $category_data = $this->requestAction('/default/node/get_category/' . $category_id);

                    echo $this->App->adm_link('lang', 'skst_id');

                    $data = array();

                    if(is_array($category_data) && count($category_data) > 0)  {
                        $data = $this->requestAction('/default/node/get_nodes', array('category_data'=>$category_data));

                ?>

                <div class="sukien-s">

                    <?php if(is_array($data) && count($data) > 0) { ?>
                    <?php $j=0; foreach($data as $v) { $j++; ?>
                    <?php if($j>4) break; ?>
                    <div class="news-item <?php if($j==4) echo 'last'; ?>">
                        <div class="row">
                            <div class="news-image col-sm-12 col-xs-6">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                    <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 278, 157); ?>
                                </a>
                            </div>
                            <div class="col-sm-12">
                                <div class="news-title">
                                    <h3>
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                            <?php echo $this->App->word_limiter($v['Node']['title'], 15); ?>
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
                <?php } ?>
            
                <div class="home-news-title hr-blue">
                    <span><?php echo $this->App->t_a('linkhi'); ?></span>
                </div>

                <?php if(isset($agencies) && is_array($agencies) && count($agencies) > 0) { ?>
                <div class="agency_list">
                    <?php $i=0; foreach($agencies as $v) { $i++; ?>
                    <div class="agency-item agency-item-<?php echo $i; ?>">
                        <a href="<?php echo $v['Agency']['link']; ?>">
                            <?php echo $v['Agency']['link']; ?>
                        </a>
                        <?php if($i == 2) $i=0; ?>
                    </div>
                    <?php } ?>
                </div>
                <?php } ?>


                <?php if(isset($banners['bannerlinkhi'])) { ?>
                <div class="home-linkhi-banner">
                    <?php $i=0; foreach($banners['bannerlinkhi'] as $v) { $i++; ?>
                    <?php if($i>1) break; ?>
                        <a href="<?php echo $v['Banner']['link']; ?>">
                            <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" />
                        </a>
                    <?php } ?>
                </div>
                <?php } ?>




            </div>

            <div class="col-sm-3">
                <?php echo View::element('sidebar'); ?>
            </div>

            <div class="cleafix"></div>


            <div class="col-sm-12 tin247">
                <div class="home-news-title hr-green">
                    <span><?php echo $this->App->t_a('tin247'); ?></span>
                </div>

                <?php
                    $category_id = $this->App->t('category_news247_cid');
                    $category_data = $this->requestAction('/default/node/get_category/' . $category_id);

                    echo $this->App->adm_link('lang', 'category_news247_cid');

                    $data = array();

                    if(is_array($category_data) && count($category_data) > 0)  {
                        $data = $this->requestAction('/default/node/get_nodes', array('category_data'=>$category_data));

                ?>

                <div class="tin247-owl">
                    <div class="owl-carousel owl-carousel-main">

                    <?php foreach($data as $v) { ?>
                    <div class="news-item">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="news-image">
                                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                        <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 210, 147); ?>
                                    </a>
                                    
                                    <div class="news-hover">
                                        <div class="news-title">
                                            <h3>
                                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                                    <?php echo $this->App->word_limiter($v['Node']['title'], 15); ?>
                                                </a>
                                            </h3>
                                        </div>

                                       <!--  <div class="news-des">
                                            <p><?php //echo $this->App->word_limiter($v['News']['description'], 19); ?></p>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                </div>
                <?php } ?>
            </div>

            <div class="cleafix"></div>


            <?php if(isset($banners['homebottom'])) { ?>
            <div class="col-sm-12 home-bottom-banner">
                <?php $i=0; foreach($banners['homebottom'] as $v) { $i++; ?>
                <?php if($i>1) break; ?>
                    <a href="<?php echo $v['Banner']['link']; ?>">
                        <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" />
                    </a>
                <?php } ?>
            </div>
            <?php } ?>


        </div>
    </div>
</div>
*/ ?>



<script type="text/javascript">
$('.slideshow .owl-carousel').owlCarousel({
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    nav: true,
    navText: ["<img src='<?php echo DOMAIN; ?>theme/default/img/slider-prev.svg'>","<img src='theme/default/img/slider-next.svg'>"],
    // navText: ["<span></span>","<span></span>"],
    loop:true,
    margin:30,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:1,
            nav:true
        },
        1000:{
            items:1,
            nav:true,
        }
    }
});

$('.home-owl-partner .owl-carousel').owlCarousel({
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    nav: true,
    // navText: ["<img src='<?php echo DOMAIN; ?>theme/default/img/slider-prev.svg'>","<img src='theme/default/img/slider-next.svg'>"],
    navText: ["<span></span>","<span></span>"],
    loop:true,
    margin:30,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:4,
            nav:true
        },
        1000:{
            items:4,
            nav:true,
        }
    }
});
   

$('.home-owl-giangvien .owl-carousel').owlCarousel({
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    nav: true,
    // navText: ["<img src='<?php echo DOMAIN; ?>theme/default/img/slider-prev.svg'>","<img src='theme/default/img/slider-next.svg'>"],
    navText: ["<span></span>","<span></span>"],
    loop:true,
    margin:30,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:true
        },
        1000:{
            items:3,
            nav:true,
        }
    }
});
</script>