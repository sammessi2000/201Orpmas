<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <?php }     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN . 'lien-he'; ?>">Liên hệ</a>
                </li>
            </ol>
        </nav>
    </div>
    <div class="page-lienhe"
        style="background-image: url('<?php echo DOMAIN . $this->App->t('general_text_9'); ?>'); height: 200px; background-repeat: no-repeat;">
        <div class="wrap-bannerdes">
            <div class="banner-des"><?php echo $this->App->t_a('general_text_10'); ?></div>
        </div>
    </div>
    <?php echo $this->App->adm_link('lang','general_text_9','image'); ?>

    <div class="wrap-page page-thanks">
        <div class="container-fluid">
            <div class="row">
                <?php echo $this->App->t_a('contact_thanks','editor'); ?>
            </div>
        </div>
    </div>
</div>