
<div class="container-fluid product-archive">
    <div class="row">
        <div class="wrap">
            <div class="col-sm-3 sidebar hidden-xs">
                <?php echo View::element('sidebar'); ?>
            </div>
            <div class="col-sm-8 col-sm-offset-1 product-list-content">
                <h1><?php echo $this->App->t('title', $this->data['Node']); ?><?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?></h1>
                
                <div class="single-news">
                    <?php 
                        $data = $this->requestAction(DOMAIN . 'default/node/get_nodes/0/product/100');
                    ?>
                    <?php if(is_array($data) && count($data) > 0) { ?>
                    <?php foreach($data as $v) { ?>
                    <a href="<?php echo DOMAIN . $v['Product']['image']; ?>" class="fancybox" rel="album">
                        <?php echo $this->App->img($v['Product']['image'], $v['Node']['title'], 150, 99); ?>
                    </a>
                    <?php } ?>
                    <?php } ?>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
	$('.fancybox').fancybox();
</script>