<?php  /*
    $slider = isset($banners['slideshow']) ? $banners['slideshow'] : array();
    if($is_mobile == 1 && isset($banners['slideshow_m']))
        $slider = $banners['slideshow_m'];
?>
<div class="banner">
    <div class="owl-carousel owl-carousel-slshow active">
        <?php foreach($slider as $v) : ?>
        <div class="banner-wrap">
            <a href="<?php echo $v['Banner']['link']; ?>" aria-label="<?php echo $v['Banner']['title']?>">
                <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" alt="" />
                <div class="wrap-bannerdes">
                    <div class="banner-des"><?php echo $v['Banner']['description']; ?></div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>
</div>
*/ ?>

<?php
?>

<div class="main">
    <div class="bg-vid first-banner">
        <div class="img-filter-box top"></div>
        <?php
        $videos = isset($banners['images_page']) ? $banners['images_page'] : array();
        $slider = isset($banners['slideshow']) ? $banners['slideshow'] : array();
        ?>


        <?php
        if (count($videos) > 0) {
            foreach ($videos as $banner) {
                echo '<video playsinline autoplay muted loop>
                            <source src="'  . DOMAIN . $banner['Banner']['image'] . '" type="video/mp4">
                        </video>';
                break;
            }
        } else {
            echo '<img src="'  . DOMAIN . $slider['Banner']['image'] . '" />';
            break;
        }
        ?>

        <div class="img-filter-box"></div>
        <div class="slogan">
            <h1 class="wow fadeInUp"><?php echo $this->App->t_a('general_text_1'); ?></h1>
            <?php //pr($lang); die; 
            ?>
            <div class="slogan-btn-box">
                <a href="#start-ex" class="page-btn wow fadeInUp" data-wow-delay="0.5s"><?php echo $this->App->t_a('general_text_2'); ?></a>
            </div>
        </div>
        <div class="welcome">
            <h2 class="wow fadeInUp" data-wow-delay="1s"><?php echo $this->App->t_a('general_text_3'); ?></h2>
            <p class="wow fadeInUp" data-wow-delay="1.5s"><?php echo $this->App->t_a('general_text_4'); ?></p>
        </div>
        <div class="scroll">
            <img src="<?php echo $this->App->t('general_text_8', [], 'vi'); ?>" width="130px" height="130px" alt="scroll">
            <?php echo $this->App->adm_link('lang', 'general_text_8', 'image'); ?>

        </div>
        <div class="arrow">
            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M7.92284 1V19M7.92284 19L1 11.8754M7.92284 19L14.7373 11.8754" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>

        </div>
    </div>

    <div class="page-h2-box featured-locations">
        <h2 class="wow fadeInUp"><?php echo $this->App->t_a('home_tab_1'); ?></h2>
    </div>
    <?php
    $lang_f = ($lang == 'en') ? 'en' : 'vi';
    ?>

    <div class="fl-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <?php if (isset($featured_products) && count($featured_products) > 0) { ?>
                        <?php $i = 0;
                        foreach ($featured_products as $v) {
                            $i++; ?>
                            <?php if ($i > 2) break; ?>
                            <div class="col-sm-6">
                                <?php /*
                                <a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo $v['Node']['title']; ?>">
                                */ ?>
                                <div class="fl-item-img wow pulse" onclick="show_destin_<?php echo $lang ?>(<?php echo $v['Node']['id']; ?> );">
                                    <?php // echo $this->App->img($v['Product']['image'], $v['Node']['title']); 
                                    ?>
                                    <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['Product']['image']; ?>" alt="<?php echo $this->App->t('title', $v['Node']); ?>">
                                    <div class="img-filter-box"></div>
                                    <h3 class="fl-item-name">
                                        <?php
                                        // echo $v['Node']['title']; 
                                        echo $this->App->t('title', $v['Node']);
                                        ?>
                                    </h3>
                                </div>
                                <?php /* </a> */ ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="fl-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <?php if (isset($featured_products) && count($featured_products) > 0) { ?>
                        <?php $i = 0;
                        foreach ($featured_products as $v) {
                            $i++; ?>
                            <?php if ($i < 3) continue; ?>
                            <?php if ($i > 5) break; ?>
                            <div class="col-sm-4">
                                <?php /* <a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo $v['Node']['title']; ?>"> */ ?>
                                <div class="fl-item-img wow pulse" onclick="show_destin_<?php echo $lang ?>(<?php echo $v['Node']['id']; ?>);">
                                    <?php // echo $this->App->img($v['Product']['image'], $v['Node']['title']); 
                                    ?>
                                    <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['Product']['image']; ?>" alt="<?php echo  $this->App->t('title', $v['Node']) ?>">
                                    <div class="img-filter-box"></div>
                                    <h3 class="fl-item-name"><?php echo $this->App->t('title', $v['Node']); ?></h3>
                                </div>
                                <?php /* </a> */ ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="page-btn-box fl-btn-box">
        <a href="<?php echo $this->App->t('home_text_9_link') ?>" class="page-btn fl-btn"><?php echo $this->App->t_a('home_text_9', 'text_link'); ?></a>

    </div>


    <div class="winter-here lazy" data-bg="<?php echo  $this->App->t('home_des_1', [], 'vi'); ?>">
        <?php echo $this->App->adm_link('lang', 'home_des_1', 'image'); ?>
        <p>
            <?php echo $this->App->t_a('home_tab_8'); ?></p>
        <div class="page-btn-box wh-btn-box">
            <a href="<?php echo $this->App->t('home_text_8_link') ?>" class="page-btn wh-btn"><?php echo $this->App->t_a('home_text_8', 'text_link'); ?></a>
        </div>
    </div>

    <div class="page-h2-box why-us">
        <h2><?php echo $this->App->t_a('home_tab_2'); ?></h2>
    </div>

    <div class="page-img-box">
        <div class="big-wrap">
            <div class="container-fluid">
                <div class="page-img wow pulse-rev">
                    <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo  $this->App->t('home_text_10', [], 'vi'); ?>" alt="couple">
                    <?php echo $this->App->adm_link('lang', 'home_text_10', 'image'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="why-us-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="why-us-item-content">
                            <h3><?php echo $this->App->t_a('home_tab_3'); ?></h3>
                            <div class="pink-border"></div>
                            <?php echo $this->App->t_a('home_text_1', 'editor'); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="why-us-item-content">
                            <h3><?php echo $this->App->t_a('home_tab_4'); ?></h3>
                            <div class="pink-border"></div>
                            <?php echo $this->App->t_a('home_text_2', 'editor'); ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="why-us-item-content">
                            <h3><?php echo $this->App->t_a('home_tab_5'); ?></h3>
                            <div class="pink-border"></div>

                            <?php echo $this->App->t_a('home_text_3', 'editor'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-img-box about-us-box">
        <div class="big-wrap">
            <div class="container-fluid">
                <div class="page-img wow pulse-rev">
                    <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src=" <?php echo  $this->App->t('home_text_4', [], 'vi'); ?> " alt="beautiful">
                    <?php echo $this->App->adm_link('lang', 'home_text_4', 'image'); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="page-h2-box about-us">
        <div class="pink-border-center-box">
            <h2 class="wow fadeInUp"><?php echo $this->App->t_a('home_tab_6'); ?></h2>
            <div class="pink-border-center"></div>
        </div>
    </div>
    <div class="about-us-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="about-us-item-content">

                            <?php echo $this->App->t_a('home_text_5', 'editor'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page-btn-box au-btn-box">
        <a href="<?php echo $this->App->t('home_text_7_link') ?>" class="page-btn au-btn"><?php echo $this->App->t_a('home_text_7', 'text_link'); ?></a>

    </div>

    <div class="page-h2-box start-experience" id="start-ex">
        <h2 class="wow fadeInUp"><?php echo $this->App->t_a('home_tab_7'); ?></h2>
    </div>
    <div class="se-item">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="se-item-content">
                            <?php echo $this->App->t_a('home_text_6', 'editor'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="se-form-box">
        <div class="wrap550">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <form id="contact" method="post" class="frmcontact se-form">
                            <?php echo $this->App->adm_link('lang', 'general_text_25', 'text'); ?>
                            <input type="text" name="fullname" placeholder="<?php echo $this->App->t('general_text_25') ?>" id="name" class="name" required>
                            <?php echo $this->App->adm_link('lang', 'general_text_26', 'text'); ?>
                            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="<?php echo $this->App->t('general_text_26') ?>" id="email" class="email" required>
                            <textarea name="content" rows="6" id="message" placeholder="<?php echo $this->App->t('general_text_27') ?>" class="message" required></textarea>
                            <?php echo $this->App->adm_link('lang', 'general_text_27', 'text'); ?>
                            <button type="button" onclick="send_mes();" name="sbm"><?php echo $this->App->t_a('general_text_24') ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>