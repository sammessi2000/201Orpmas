
<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // pr($current_category);
?>
<div class="main single">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                 <div id="breadcrumb" class="block-breadcrumb-mb">
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
                foreach($cat_arr as $v)
                {
                    $t = explode(':', $v);
                    if(count($t) > 1)
                    {
                        if($t[0] <= 3)
                            $key = 'Ban Lãnh Đạo';
                        else if($t[0] > 3 && $t[0] <= 11)
                            $key = 'Ban chuyên môn';
                        else 
                            $key = 'Hội viên';

                        $team_categories[$key][$t[0]] = $t[1];
                    }
                }

                $teams = $team_categories['Ban chuyên môn'];

                foreach($teams as $i=>$txt)
                {
                	   $data = $this->requestAction('/default/node/get_lanhdao/' . $i);
                ?>

                	<?php if(is_array($data) && count($data) > 0) { ?>
                	<div class="tochuc-title">
                		<span>
                			<?php 
                				// $txt = '';

                    //             foreach($team_categories as $tk => $tv)
                    //             {
                    //                 foreach($tv as $vk=>$vv)
                    //                 {
                    //                     if($vk == $v['Team']['category_id'])
                    //                         $txt = $tk;
                    //                 }
                    //             }

                				// $step++;
                			?>
                		</span>
                		<?php echo $txt; ?>
                	</div>

                	<div class="clearfix"></div>
                	<div class="tochuc-body">
                	<div class="row">

                	<?php foreach($data as $v) { ?>
                	<div class="col-sm-4">
                	<div class="tochuc-item">
                		<div class="tochuc-img">
                			<?php echo $this->App->img($v['Team']['image'], '', 250, 250); ?>
                		</div>
                		<div class="tochuc-name">
                			<?php echo $v['Team']['fullname']; ?>
                		</div>
                		<div class="tochuc-vitri">
                			<?php echo $v['Team']['team_position']; ?>
                		</div>
                		<div class="tochuc-des">
                			<?php echo $v['Team']['content']; ?>
                		</div>
                	</div>
                	</div>
                	<?php } ?>
                	</div>
                	</div>
                    <?php } ?>
                	<?php } ?>
                </div>
            </div>
            <div class="col-sm-3"><?php echo View::element('sidebar'); ?></div>

        </div>
    </div>
</div>
