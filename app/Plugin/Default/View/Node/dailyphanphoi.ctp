<?php 
	$root_id = $this->requestAction(DOMAIN . 'default/node/find_root_category/' . $current_category['Category']['id']);
	$extra_data = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $root_id . '/document,page');
    // pr($this->data);
?>

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
                        <div class="page-daily">
                            <div class="page-tab-list">
                                <ul>
                                    <?php if(isset($extra_data) && is_array($extra_data) && count($extra_data) > 0) { ?>
                                        <?php $i=0; $n=count($extra_data); foreach($extra_data as $v) { $i++; ?>
                                            <li class="col-sm-3 <?php 
                                                if($current_category['Category']['id'] == $v['Category']['id']) 
                                                    echo 'active';
                                                if($i==$n)
                                                    echo ' last';
                                            ?>">
                                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html"><?php echo $this->App->t('title', $v['Node']); ?></a>
                                                <?php echo $this->App->adm_link('category', $v['Node']['id']); ?>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                            
                            <div class="clearfix"></div>

                            <div class="page-tab-content">
                                <?php $data = $this->requestAction(DOMAIN . 'default/node/get_dailyphanphoi'); ?>
                                <?php $i=0; foreach($data as $v) { $i++; ?>
                                <div class="col-sm-6 daily-item">
                                    <div class="daily-item-content <?php if($i==1) echo 'active'; ?>">
                                    	<div class="daily-title">
                                    		<?php echo $v['Agency']['title']; ?>

                                            <?php echo $this->App->adm_link('agency', $v['Agency']['id']); ?>
                                    	</div>
                                    	<div class="daily-hotline">
                                    		<span>Hotline: <?php echo $v['Agency']['hotline']; ?></span>
                                    	</div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>



<script type="text/javascript">
$('.daily-item-content').hover(function() {
    $('.daily-item-content').removeClass('active');
    $(this).addClass('active');
    return false;
});
</script>