<style type="text/css">
    .body .mc-cycle {position: absolute; z-index: -1;}
    #maximage-wrap {overflow: visible; }
    .page-content {position: relative;}
</style>

<div class="container-fluid">
    <div class="row">
        <div id="maximage-wrap">
            <div class="maximage" id="maximage">
                <img src="<?php echo DOMAIN; ?>theme/default/img/news.jpg" />
            </div>

            <div class="container-fluid page-content">
                <div class="row">
                    <div class="wrap">
                        <div class="page-vitri">
                            <div class="page-tab-content">
                                <div class="page-news-tab">
                                    <div class="vitri-lft col-sm-6 np">
                                        <img src="<?php echo $this->App->t('vitri-page'); ?>" alt="vi tri" />
                                        <?php echo $this->App->adm_link('lang', 'vitri-page', 'image'); ?>
                                    </div>
                                    <div class="vitri-rght col-sm-6 np">
                                        <div class="container-fluid vitri">
                                            <div class="row">
                                                <div class="wrap">
                                                    <div class="vitri-header">
                                                        <span><?php echo $this->App->t('vitri-title'); ?></span>
                                                        <?php echo $this->App->adm_link('lang', 'vitri-title'); ?>
                                                    </div>
                                                    <div class="vitri-des">
                                                        <?php echo $this->App->t('vitri-des2'); ?>
                                                        <?php echo $this->App->adm_link('lang', 'vitri-des2', 'editor'); ?>
                                                    </div>
                                                    <div class="vitri-content">
                                                        <ul>
                                                        <?php for($i=1; $i<=10; $i++) { ?>
                                                            <li style="background: url(<?php echo DOMAIN . $this->App->t('v'.$i.'-icon'); ?>) no-repeat 0 50%;">
                                                                <?php echo $this->App->adm_link('lang', 'v'.$i.'-icon', 'image'); ?>
                                                                <?php echo $this->App->t('v'.$i.'-title'); ?>
                                                                <?php echo $this->App->adm_link('lang', 'v'.$i.'-title'); ?>
                                                            </li>
                                                        <?php } ?>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
