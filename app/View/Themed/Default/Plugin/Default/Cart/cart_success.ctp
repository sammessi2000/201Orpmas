<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <?php
    /*
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
        */
    ?>
    <div class="unit-page-background-header lazy" data-bg="<?php echo DOMAIN . $this->App->t('general_text_9'); ?>">
        <div class="background-filter first-banner"></div>
    </div>
    <?php echo $this->App->adm_link('lang', 'general_text_9', 'image'); ?>

    <div class="wrap-page page-thanks">

        <div class="row">
            <?php echo $this->App->t_a('cart_success', 'editor'); ?>
        </div>

    </div>
</div>