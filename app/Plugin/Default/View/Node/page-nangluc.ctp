<?php
$data = $this->requestAction('/default/node/get_nodes/' . $current_category['Category']['id']); 
?>

<?php $bread_array = $this->App->breadarray($current_category); ?>
<div class="container-fluid bread">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <ul>
                    <?php if(is_array($bread_array) && count($bread_array)>0) { ?>
                    <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { $i++; ?>
                    <li <?php if($i==$n) echo 'class="li-last"'; ?>><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid archive">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-3 sidebar">
                <?php echo View::element('sidebar'); ?>
            </div>
            <div class="col-sm-9 product-list">
                <div class="news-list-tab news-list-header">
                    <span><?php echo $this->App->t('title', $current_category['Node']); ?></span>
                </div>

                <div class="clearfix"></div>

                <div class="news-list-archive nangluc-list">
                <?php $i=0; $j=0; $n=count($data); foreach($data as $v) { $i++; $j++; ?>
                    <div class="news-list-item <?php if($j==$n) echo 'last'; ?>">
	                    <div class="row">
		                    <div class="news-list-img col-sm-6 <?php if($i==2) echo 'pull-right'; ?>">
                                <h2>
    		                            <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 470, 350); ?>
                                </h2>
		                    </div>
		                    <div class="news-list-info col-sm-6">
		                    	<h2>
			                            <?php echo $this->App->t('title', $v['Node']); ?>
		                        </h2>
		                        <p><?php echo $this->App->t('description', $v['News']); ?></p>
		                    </div>
                            
                            <?php if($i==2) $i=0 ?>
	                    </div>
                    </div>
                <?php } ?>
                </div>


            </div>
        </div>
    </div>
</div>