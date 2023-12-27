<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Gửi mail tới thành viên'); ?>
<?php echo $this->Admin->admin_breadcrumb('Gửi mail Profile'); ?>

<?php echo $this->Session->flash(); ?>

<?php if($multiple_lang == true) : ?>
    <div class="lang">
        <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
        <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
        <!-- <a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a> -->
        <!--<a href="<?php echo $url_here; ?>?lang=kr" <?php if($lang == 'kr') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Hàn</a>-->
    </div>
<?php endif; ?>

<div class="box">
<div class="box-content">

	<div class="control-group">
		<label class="control-label">Tiêu đề</label>
		<div class="controls">
			<?php 
			echo $this->Form->input('Email.title', array('label'=>false,'div'=>false, 'class'=>'title input-xlarge span9','required'=>'required')); 
			?>
		</div>
	</div>

    <div class="control-group">
        <label class="control-label">Nội dung</label>
        <div class="controls">
            <?php echo $this->Form->input('Email.content', array('type' => 'textarea', 'div' => false, 'label' => false, 'class' => 'span9 content', 'rows' => 6)); ?>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Chọn thành viên </label>
        <div class="controls">
        	<div class="email-thanhvien">
        		<input type="checkbox" class="thanhvien-all" id="checkAll" /> <strong>Chọn hết</strong>
        	</div>
        	<?php $i=0; foreach($thanhvien as $k=>$v) { ?>
        	<div class="email-thanhvien">
        		<input type="checkbox" name="thanhvien[<?php echo $i; ?>]" class="thanhvien-item thanhvien-item-<?php echo $i; ?>" value="<?php echo $k; ?>" /> <?php echo $v; ?>
        	</div>
        	<?php $i++; } ?>
        </div>
    </div>

	<div class="control-group sendmail">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<div class="msg hide" style="font-weight: bold; color: red; margin-bottom: 10px;">
				Đang xử lý dữ liệu vui lòng chờ....
			</div>
			<input type="submit" name="submit" id="send" value="Gửi" class="btn btn-primary" />
		</div>
	</div>
</div>
</div>
</div>

</div>
</form>


<script type="text/javascript">
	$("#checkAll").click(function(){
	    $('input:checkbox').not(this).prop('checked', this.checked);
	});

	var total = <?php echo count($thanhvien); ?>;
	var current = 0;

	$('#send').click(function() {
		var title = $('.title').val();
		var content = $('.content').val();

		if(title == '' || content == '')
		{
			alert("Vui lòng nhập đầy đủ thông tin");
			return false;
		}

		var is_check = $('.thanhvien-item:checked').length > 0;

		if(is_check == false)
		{
			alert("Vui lòng chọn email cần gửi");
			return false;
		}

		$('.msg').removeClass('hide');

		var iter = setInterval(function() {
			var cls = '.thanhvien-item-' + current;
			var email = '';

			if($(cls).is(':checked'))
			{
				email = $(cls).val();
			}

			current++;

			if(email != '')
			{
				console.log(current - 1);
				console.log(email);

				$.ajax({
					url: "<?php echo DOMAINAD; ?>admin_email/send_smtp_mail",
					data: {title: title, content: content, email: email},
					type: 'post',
					dataType: 'json',
					success: function(d) {
						console.log(d);
					},
					error: function(err) {
						console.log(err);
					}
				});
			}

			if(current >= total)
			{
				alert("Đã gửi email tới các thành viên");
				$('.msg').addClass('hide');
				clearInterval(iter);
			}
		}, 1000);

		return false;
	})
</script>