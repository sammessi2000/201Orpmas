<?php echo View::element('slider-nivo'); ?>
<div class="clearfix"></div>

<div class="wrap-news">
    <div class="main">
        <div class="page-title">
            <?php echo $this->App->t('dcmh'); ?>
            <?php echo $this->App->adm_link('lang', 'dcmh'); ?>
        </div>

        <div class="col-sm-9 news-single">
            <?php $i=0; foreach($this->data as $v) { $i++; ?>
                <div class="diachi-item col-sm-6">
                    <div class="diachi-item-content">
                        <div class="diachi-item-title">
                            <?php echo $v['Agency']['title']; ?>
                        </div>
                        <div class="diachi-item-address">
                            <?php echo $v['Agency']['address']; ?>
                        </div>
                    </div>
                </div>
                <?php if($i%2==0) echo '<div class="clearfix"></div>'; ?>
            <?php } ?>

            <div class="clearfix"></div>

            <div class="pagination">
                <?php
                    $pages = $this->Paginator->numbers(array('separator'=>' '));
                    $pages = str_replace('default/node/index/', '', $pages);
                    $pages = str_replace('/.html', '.html', $pages);
                    echo $pages;
                ?>
            </div>
        </div>
    </div>
</div>
