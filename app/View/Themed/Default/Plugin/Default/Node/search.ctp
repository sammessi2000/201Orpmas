<div class="main-index product-list">
    <div class="container">
        <div class="line-breacrumb">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a></li>
                    <li class="breadcrumb-item"><a href="<?php echo '#'; ?>"><?php echo 'search'; ?></a></li>
                </ol>
            </nav>
        </div>
        <div class="search-main">
            <div class="search-title">
                <p>Kết quả tìm kiếm: <?php echo isset($_GET['s']) ? $_GET['s'] : ''    ?></p>
            </div>
            <?php //pr($this->data)     
            ?>
            <div class="row">
                <?php foreach ($this->data as $v) {    ?>
                    <div class="col-sm-6 col-md-3">
                        <?php echo View::element('product-item', array('product' => $v)); ?>
                    </div>
                <?php }     ?>
            </div>
        </div>
        <?php /* 	?>
        <section class="line-banner2">
            <a href="<?php echo $this->App->t('product_text_1_link'); ?>">
                <img src="<?php echo DOMAIN . $this->App->t('product_text_1'); ?>">
            </a>
            <?php echo $this->App->adm_link('lang', 'product_text_1', 'image_link'); ?>
        </section>
         */ ?>
    </div>
</div>