<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <div class="unit-page-background-header lazy" data-bg="<?php echo $this->App->t('general_text_15'); ?>">
        <div class="background-filter first-banner"></div>
        <div class="unit-page-header">
            <div class="wrap">
                <h1><?php echo $this->data['Category']['page_title']; ?></h1>
            </div>
        </div>
    </div>
    <?php echo $this->App->adm_link('lang', 'general_text_15', 'image'); ?>

    <div class="privacy-page">
        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-content">
                            <?php echo $this->data['Category']['content']; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>