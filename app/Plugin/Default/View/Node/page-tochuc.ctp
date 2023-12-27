
<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // pr($current_category);
    // die;
?>
<div class="archive" id="breadcrumb">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                 <div class="block-breadcrumb-mb">
                    <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                        <?php if(is_array($bread_array) && count($bread_array)>0) {  ?>
                        <?php $i=0; $n=count($bread_array); foreach($bread_array as $v) { ?>
                            <?php if($v['title'] != '') {  $i++; ?>
                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $v['link']; ?>">
                                        <span itemprop="name"><?php echo $v['title']; ?></span>
                                    </a> 
                                    <i class="fa fa-angle-right"></i>
                                    <meta itemprop="position" content="<?php echo $i; ?>">
                                </li>
                            <?php } ?>
                        <?php } ?>
                        <?php } ?>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="main single">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-9">
             
                
                <div class="home-news-title hr-red">
                    <?php echo $this->data['Category']['page_title']; ?>
                    <?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?>
                </div>

				
                <div class="home-news-page">
				<?php echo $this->App->t('content', $this->data['Category']); ?>
                </div>

                <div class="tochuc">
                <?php 
                $step = 1;
                $c = $settings['cat_bld'];
                // echo $c; die;
                $cat_arr = explode("\n", $c);

                $team_categories = array();
               $data = $this->requestAction('/default/node/get_lanhdao/' . $i);
               
               if(is_array($data) && count($data) > 0) {
                ?>
                <div class="row">
                	<?php $i=0; foreach($data as $v) { $i++; ?>
                            <div class="col-sm-4">
                            <div class="giangvien-item">
                                <div class="giangvien-image">
                                    <img src="<?php echo DOMAIN . $v['Team']['image']; ?>" />
                                </div>
                                <div class="giangvien-title">
                                    <?php echo $v['Team']['fullname']; ?>
                                </div>
                                <div class="giangvien-des">
                                    <?php echo $v['Team']['content']; ?>
                                </div>
                                <div class="giangvien-rate">
                                    <?php 
                                        if($v['Team']['stars'] > 0)
                                        {
                                            echo '<ul>';
                                            for($i = 0; $i < $v['Team']['stars']; $i++)
                                            {
                                                echo '<li class="active"><span></span></li>';
                                            }

                                            if($v['Team']['stars'] < 5)
                                            {
                                                $con = 5 - $v['Team']['stars'];

                                                for($i = 0; $i < $con; $i++)
                                                {
                                                    echo '<li><span></span></li>';
                                                }
                                            }
                                            echo '</ul>';
                                        }
                                    ?>
                                </div>
                            </div>
                            </div>
                            <?php } ?>
                </div>
                            <?php } ?>
                </div>
            </div>
            <div class="col-sm-3"><?php //echo View::element('sidebar'); ?></div>

        </div>
    </div>
</div>
