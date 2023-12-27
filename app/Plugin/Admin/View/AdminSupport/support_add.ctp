
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm mới'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm mới'); ?>

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
		<label class="control-label">Họ tên</label>
		<div class="controls">
			<?php echo $this->Form->input('Support.title', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Avatar</label>
		<div class="controls">
            <div class="thumbnail-preview image thumbnail"></div>
			<?php echo $this->Form->input('Support.image', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6 image_preview', 'id' => 'thumbnail', 'required')); ?>
			<input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Vị trí</label>
		<div class="controls">
			<?php echo $this->Form->input('Support.role', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<?php echo $this->Form->input('Support.email', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Zalo</label>
		<div class="controls">
			<?php echo $this->Form->input('Support.zalo', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<!-- <div class="control-group">
		<label class="control-label">Skype</label>
		<div class="controls">
			<?php echo $this->Form->input('Support.skype', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div> -->

	<div class="control-group">
		<label class="control-label">Điện thoại</label>
		<div class="controls">
			<?php echo $this->Form->input('Support.phone', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>
            
	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
		</div>
	</div>
	
	
</div>
</div>
</div>

</div>
</div>

</form>