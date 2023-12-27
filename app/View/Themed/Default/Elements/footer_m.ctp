	<?php /*
	<ul class="ufb">
		<li class="t">Kết nối với chúng tôi</li>
		<li class="g"><b></b></li>
		<li class="c">
			<div class="fb-page fb_iframe_widget" data-href="<?php echo $settings['facebook']; ?>" data-width="275" data-height="210" data-tabs="timeline" data-small-header="true" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" fb-xfbml-state="rendered" class=""></div>
		</li>
	</ul>
	*/ ?>

    
<?php 
    $hotline = $this->App->t('hotline');
    $hotline_number = preg_replace('/[^0-9]/', '', $hotline);
?>    


<div class="menu-hot">
	<?php if(is_array($categories_footer) && count($categories_footer) > 0) { ?>
	<ul class="l menu-by-parent">
	    <?php $i=0; $n=count($categories_footer); foreach ($categories_footer as $v) { $i++; ?>
	    <?php 
	    if($i>8) break;
	    $link = DOMAIN . $lang_txt_link . $v['Node']['slug'] . '.html'; 
	    if($v['Category']['type'] == 'link_inline')
	    {
	        $node = $this->requestAction(DOMAIN . 'default/node/get_node/' . $v['Category']['link_inline']);
	        if(is_array($node) && count($node) > 0)
	            $link = DOMAIN . $lang_txt_link . $node['Node']['slug'] . '.html';
	        else
	            $link = DOMAIN . $lang_txt_link;
	    }
	    
	    if($v['Category']['type'] == 'link')
	    {
	        $link = $v['Category']['link'];       
	    }
	    ?>
		<li>
		        <a href="<?php echo $link; ?>">
					<?php echo $this->App->t('title', $v['Node']); ?>
		        </a>
		</li>
		<?php } ?>
	</ul>
	<?php } ?>

    <div class="cl"></div>
</div>


	<p class="w-f-item w-f-callcenter">
	    <span class="w-f-cc-l">Gọi mua hàng:</span>
	    <a href="tel:<?php echo $hotline_number; ?>" class="w-f-cc-r"><?php echo $hotline; ?></a>
	    <?php echo $this->App->adm_link('lang', 'logo'); ?>
	</p>


	<div id="google-map"></div>
	<div style="text-align: right;width:100%;float: left;margin-top: 7px;font-size: 15px;margin-bottom: 10px;">
<a href="https://www.google.com/maps/search/?api=1&query=<?php echo $settings['google_map'] ?>">
    Xem đầy đủ &nbsp; &nbsp;
    </a>
</div>


	<ul class="uff">
		<?php if(is_array($categories_footer_3) && count($categories_footer_3) > 0) { ?>
		<?php foreach($categories_footer_3 as $v) { ?>
		<?php 
		$link = DOMAIN . $lang_txt_link . $v['Node']['slug'] . '.html'; 
		if($v['Category']['type'] == 'link_inline')
		{
		    $node = $this->requestAction(DOMAIN . 'default/node/get_node/' . $v['Category']['link_inline']);
		    if(is_array($node) && count($node) > 0)
		        $link = DOMAIN . $lang_txt_link . $node['Node']['slug'] . '.html';
		    else
		        $link = DOMAIN . $lang_txt_link;
		}

		if($v['Category']['type'] == 'link')
		{
		    $link = $v['Category']['link'];       
		}
		?>
		<li>
			<a href="<?php echo $link; ?>" rel="nofollow"><?php echo $v['Node']['title']; ?></a>
		</li>
		<?php } ?>
		<?php } ?>
	</ul>

	<div class="clearfix"></div>

	<div class="dft">
		<span style="font-size: 17px;"><strong><?php echo $this->App->t('footer-title0'); ?></strong></span><br>
		<?php echo $this->App->t('footer'); ?>
	</div>
</div> 
<!-- /wrap -->

<div id="mobile_menu">
	<ul>
		<?php if(is_array($categories) && count($categories) > 0) { ?>
		<?php foreach($categories as $v) { ?>
		<?php 
		$link = DOMAIN . $lang_txt_link . $v['Node']['slug'] . '.html'; 
		if($v['Category']['type'] == 'link_inline')
		{
		    $node = $this->requestAction(DOMAIN . 'default/node/get_node/' . $v['Category']['link_inline']);
		    if(is_array($node) && count($node) > 0)
		        $link = DOMAIN . $lang_txt_link . $node['Node']['slug'] . '.html';
		    else
		        $link = DOMAIN . $lang_txt_link;
		}

		if($v['Category']['type'] == 'link')
		{
		    $link = $v['Category']['link'];       
		}
		?>
		<li>
			<a href="<?php echo $link; ?>" rel="nofollow"><?php echo $v['Node']['title']; ?></a>
		</li>
		<?php } ?>
		<?php } ?>
	</ul>
</div>

<script src="https://maps.googleapis.com/maps/api/js?v=3&key=AIzaSyBhhN2kfUNjd_1xqd7xzQa25bFSlF9GX00"></script>
<?php 
    $gm = explode(',', $settings['google_map']);
    $l = $gm[0];
    $s = $gm[1];
?>
<script type="text/javascript">

    var myLatlng = new google.maps.LatLng(<?php echo $l; ?>, <?php echo $s; ?>);
    var label = '';
    var mapOptions = {
        zoom: 16,
        center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('google-map'), mapOptions);

    
    var marker = new google.maps.Marker({
        position: myLatlng,
        map: map
    });

    

    // var mapLabel = new MapLabel({
    //     text: label,
    //     position: myLatlng,
    //     map: map,
    //     fontSize: 12,
    //     align: 'center'
    // });

    
    marker.setMap(map);

    var move_map = 0;

</script>


<script>
	$('#mobile_menu').mmenu();
	
	$('#sbm').click(function() {
		var key = $('#key').val();
		var link = "<?php echo DOMAIN; ?>search/?key=" + key;
		document.location.href = link;
	});

	var ww = $(window).width();
		ww = ww - 10;

	$('.fb_iframe_widget').attr('data-width', ww);

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
</body>
</html>