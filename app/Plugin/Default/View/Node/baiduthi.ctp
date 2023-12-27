<!-- <div class="container-fluid banner">
    <div class="row">
        <div class="wrap-1260">
            <div class="col-sm-12">
                <div class="bread">
                    <a href="<?php echo DOMAIN; ?>">Trang chủ</a> &raquo;
                    <a href="#"><?php echo $current_category['Node']['title']; ?></a>
                </div>
                <div class="page-title"><?php echo $current_category['Node']['title']; ?></div>
            </div>
        </div>
    </div>
</div> -->

<div class="container-fluid page-archive">
    <div class="row">
        <div class="wrap wrap-1000">
	        	<div class="col-sm-5 np">
	                <div class="duthi-title">
	                    <span></span>
	                </div>
	        	</div>

	        	<div class="col-sm-7 tab-duthi np">
		        	<ul>
		                <li class="active" id="c_101">
		                	<a href="#tab1">
			                    <span class="top">Vòng 1</span>
			                    <span>Have you kool</span>
		                    </a>
		                </li>
		                <li id="c_102">
		                	<a href="#tab2">
			                    <span class="top">Vòng 2</span>
			                    <span>Just kool as your way</span>
		                    </a>
		                </li>
	                </ul>
	        	</div>
	        	
	        	<div class="clearfix"></div>

	        	<div class="baiduthicontent">
	                <div id="tab1" class="tab active content">
	                	<?php $vong1 = $this->requestAction(DOMAIN . 'default/node/get_nodes/101/news/6'); ?>
	                    <?php foreach($vong1 as $v) { ?>
                        <div class="col-sm-4 np">
    	                    <div class="baiduthi-item">
                                <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 325, 250); ?>
                                <div class="baiduthi-title">
                                    <a href="<?php echo DOMAIN . $v['News']['image']; ?>" rel="<?php echo $v['News']['id']; ?>" title="<?php echo $v['Node']['title']; ?>">
                                        <?php echo $v['Node']['title']; ?>
                                    </a>
                                </div>
                                <div class="baiduthi-heart">
                                    <span class="fa fa-heart"></span> <?php echo number_format($v['News']['vote']); ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="vote" id="<?php echo $v['News']['id']; ?>"></span>

                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo DOMAIN . $v['News']['image']; ?>&t=<?php echo $v['Node']['title']; ?>" class="fbsharelink" target="_blank">
                                    <span class="share"></span>
                                </a>
                            </div>
                        </div>
	                    <?php } ?>
	                </div>

	                <div id="tab2" class="tab content">
	                    <?php $vong2 = $this->requestAction(DOMAIN . 'default/node/get_nodes/102/news/6'); ?>
                        <?php foreach($vong2 as $v) { ?>
                        <div class="col-sm-4 np">
                            <div class="baiduthi-item">
                                <?php echo $this->App->img($v['News']['image'], $v['Node']['title'], 325, 250); ?>
                                <div class="baiduthi-title">
                                    <a href="<?php echo DOMAIN . $v['News']['image']; ?>" rel="<?php echo $v['News']['id']; ?>" title="<?php echo $v['Node']['title']; ?>">
                                        <?php echo $v['Node']['title']; ?>
                                    </a>
                                </div>
                                <div class="baiduthi-heart">
                                    <span class="fa fa-heart"></span> <?php echo number_format($v['News']['vote']); ?>
                                </div>
                            </div>
                            <div class="text-center">
                                <span class="vote" id="<?php echo $v['News']['id']; ?>"></span>

                                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo DOMAIN . $v['News']['image']; ?>&t=<?php echo $v['Node']['title']; ?>" class="fbsharelink" target="_blank">
                                    <span class="share"></span>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
	                </div>

<input type="hidden" id="active_category" value="101" />

                    <div class="clearfix"></div>

                    <div class="xemthembdt">
                        <a href="#" class="loadme-more">Xem thêm <span class="fa fa-angle-down"></span></a>
                    </div>
                </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    var duthiitemh = $('.baiduthi-item img').height();
    $('.baiduthi-item .baiduthi-title').css('height', duthiitemh);

    $('.baiduthi-item').hover(function() {
        $(this).find('.baiduthi-title').animate({
            top: 0
        }, 300);
    }, function() {
        $(this).find('.baiduthi-title').animate({
            top: -260
        }, 300);
    });

    var loading = false;
    var loadmore = $('.loadme-more');
    var off = 6;
    var item_limit = 3;

    function loadpost()
    {
        if(loading == true) 
                return;

        loading = true;

        var catid = $('#active_category').val();

        var url = "<?php echo DOMAIN; ?>default/node/ajax_load_posts/?type=news&limit="+item_limit+"&offset=" + off + "&catid=" + catid;
        console.log(url);

        $.ajax({
            url: url,
            cache: false,
            dataType: 'html',
            type: 'GET',
            success: function(data) {
                loading = false;

                if(data == '')
                {
                    $('.loadme-more').html('Không còn dữ liệu');
                    loading = true;

                    return true;
                }
                else
                {
                    $('.baiduthicontent .tab.active').append(data);
                    $('.baiduthi-item .baiduthi-title').css('height', duthiitemh);
                    $('.baiduthi-item').hover(function() {
                        $(this).find('.baiduthi-title').animate({
                            top: 0
                        }, 300);
                    }, function() {
                        $(this).find('.baiduthi-title').animate({
                            top: -260
                        }, 300);
                    });

                    $('.vote').click(function() {
                        var news_id = $(this).attr('id');
                        $.ajax({
                            url: "<?php echo DOMAIN; ?>default/node/vote/" + news_id,
                            cache: false,
                            dataType: 'html',
                            success: function(data) {
                                alert(data);
                            },
                            error: function() {}
                        })
                    });

                    $('.baiduthi-title a').click(function() {
                        var img = $(this).attr('href');
                        var id = $(this).attr('rel');
                        var title = $(this).attr('title');

                        // alert(id);

                        var fblink = "https://www.facebook.com/sharer/sharer.php?u="+img+"&t=" + title;

                        $('.modal-vote .vote').attr('id', id);
                        $('.modal-vote .fbsharelink').attr('href', fblink);
                        $('.voteimg').attr('src', img);

                        $('.modal-vote').modal();
                        $('.modal-close').click(function() {$('.modal-vote').modal('hide');});
                        
                        return false;
                    });
                }
            },
            error: function() {alert('err');}
        });

        off = off + item_limit;
    }
    
    loadmore.on('click', function() {
        loadpost();
        return false;
    });


    
</script>

<script type="text/javascript">
    $('.vote').click(function() {
        var news_id = $(this).attr('id');
        $.ajax({
            url: "<?php echo DOMAIN; ?>default/node/vote/" + news_id,
            cache: false,
            dataType: 'html',
            success: function(data) {
                alert(data);
            },
            error: function() {}
        })
    });

    $('.baiduthi-title a').click(function() {
        var img = $(this).attr('href');
        var id = $(this).attr('rel');
        var title = $(this).attr('title');

        // alert(id);

        var fblink = "https://www.facebook.com/sharer/sharer.php?u="+img+"&t=" + title;

        $('.modal-vote .vote').attr('id', id);
        $('.modal-vote .fbsharelink').attr('href', fblink);
        $('.voteimg').attr('src', img);

        $('.modal-vote').modal();
        $('.modal-close').click(function() {$('.modal-vote').modal('hide');});
        
        return false;
    });
</script>

<script type="text/javascript">
    $('.tab-duthi li').click(function() {
        $('.tab-duthi li').removeClass('active');
        $(this).addClass('active');

        var id = $(this).attr('id');
        id = id.replace('c_', '');

        off = 6;
        item_limit = 3;
        $('#active_category').val(id);
        $('.loadme-more').html('Xem thêm <span class="fa fa-angle-down"></span>');

        var tab = $(this).find('a').attr('href');
        $('.tab').fadeOut();
        $(tab).fadeIn();

        return false;
    });

    jQuery('.jcarousel').jcarousel({
        vertical: false
    }).jcarouselAutoscroll({
        interval: 3000,
        target: '+=1',
        autostart: true
    });
</script>