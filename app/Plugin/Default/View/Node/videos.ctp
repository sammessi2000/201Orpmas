<div class="container-fluid banner">
    <div class="row">
        <!-- <div class="wrap-1092"> -->
        <div class="wrap-1260">
            <div class="col-sm-12">
                <div class="bread">
                    <a href="<?php echo DOMAIN; ?>">Trang chủ</a> &raquo;
                    <a href="<?php echo DOMAIN . $current_category['Node']['slug']; ?>.html"><?php echo $current_category['Node']['title']; ?></a>
                </div>
                <div class="page-title"><?php echo $current_category['Node']['title']; ?></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid collect-archive page-archive">
	<div class="row">
    	<!-- <div class="wrap-1200"> -->
		<div class="wrap-1260">
			<div class="news-archive collection-album">
            <?php
            $videos = $this->requestAction(DOMAIN . 'default/node/get_videos/');
            ?>
                <?php $i=0; foreach($videos as $v) { $i++; ?>   
                <?php 
        $vid = $this->App->youtube_id($v['Video']['image']);
    ?>

                <div class="news-item col-sm-4">
                    <div class="news-item-img">
                        <iframe id="player" type="text/html" width="400" height="299" src="http://www.youtube.com/embed/<?php echo $vid; ?>?enablejsapi=1" frameborder="0"></iframe>
                        <h3>
                            <?php echo $v['Video']['title']; ?>
                        </h3>
                    </div>
                </div>
                <?php if($i%3==0) echo '<div class="clearfix"></div>'; ?>
                <?php } ?>
            </div>  

		</div>
	</div>
</div>

