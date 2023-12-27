
<div class="container-fluid product-archive">
    <div class="row">
        <div class="wrap">
            <div class="col-sm-3 sidebar hidden-xs">
                <?php echo View::element('sidebar'); ?>
            </div>
            <div class="col-sm-8 col-sm-offset-1 single-product">
                <h1>
                    <?php echo $this->App->t('title', $this->data['Node']); ?>
                    <?php echo $this->App->adm_link('product', $this->data['Node']['id']); ?>
                </h1>
                
                <div class="single-news">
                    <div class="col-sm-6">
                        <?php echo $this->App->t('content', $this->data['Product']); ?>
                    </div>
                    <div class="col-sm-6">
                        <img src="<?php echo DOMAIN . $this->data['Product']['image']; ?>" alt="<?php echo $this->App->t('title', $this->data['Node']); ?>" />
                    </div>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="single-product-tabs">
                    <?php if($this->data['Product']['att1'] != '') { ?>
                    <div class="single-product-tab single-product-tab-1 active">
                        <a href="#" id="single-product-tab-content-1">
                            <?php echo $this->App->t('att1', $this->data['Product']); ?>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if($this->data['Product']['att2'] != '') { ?>
                    <div class="single-product-tab">
                        <a href="#" id="single-product-tab-content-2">
                            <?php echo $this->App->t('att2', $this->data['Product']); ?>
                        </a>
                    </div>
                    <?php } ?>
                    <?php if($this->data['Product']['att3'] != '') { ?>
                    <div class="single-product-tab single-product-tab-3">
                        <a href="#" id="single-product-tab-content-3">
                            <?php echo $this->App->t('att3', $this->data['Product']); ?>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                
                <div class="clearfix"></div>
                
                <div class="single-product-tab-contents">                    
                    
                    <?php if($this->data['Product']['content1'] != '') { ?>
                    <div class="single-product-tab-content single-product-tab-content-1 active">
                        <?php echo $this->App->t('content1', $this->data['Product']); ?>
                    </div>
                    <?php } ?>
                    <?php if($this->data['Product']['content2'] != '') { ?>
                    <div class="single-product-tab-content single-product-tab-content-2">
                        <?php echo $this->App->t('content2', $this->data['Product']); ?>
                    </div>
                    <?php } ?>
                    <?php if($this->data['Product']['content3'] != '') { ?>
                    <div class="single-product-tab-content single-product-tab-content-3">
                        <?php echo $this->App->t('content3', $this->data['Product']); ?>
                    </div>
                    <?php } ?>
                </div>
                
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

$('.single-product-tab a').click(function() {
    var v = $(this).attr('id');
    $('.single-product-tab').removeClass('active');
    var parent = $(this).parent('.single-product-tab').addClass('active');
    $('.single-product-tab-content').removeClass('active');
    $('.' + v).addClass('active');
    
    return false;
});
</script>