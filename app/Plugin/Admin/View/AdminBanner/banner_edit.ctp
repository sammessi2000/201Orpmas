
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Sửa hình ảnh'); ?>
<?php echo $this->Admin->admin_breadcrumb('Sửa hình ảnh'); ?>

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
			<?php echo $this->Form->input('Banner.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Link</label>
		<div class="controls">
			<?php echo $this->Form->input('Banner.link', array('type'=>'text','label'=>false,'div'=>false,'required'=>'required', 'class'=>'span6')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Hình ảnh</label>
		<div class="controls">
            <div class="thumbnail-preview ss image"></div>
			<?php echo $this->Form->input('Banner.image', array('type'=>'text','label'=>false,'div'=>false,'required'=>'required', 'id'=>'ss', 'class'=>'span8 image_preview')); ?>
			<input type="button" class="btn btn-success" onclick="file_manager('ss');" value="Chọn ảnh"> &nbsp;(.jpg, .gif, .png, .swf) 
		</div>
	</div>	

    <div class="control-group hide youtube">
        <label class="control-label">Youtube</label>
        <div class="controls">
            <?php echo $this->Form->input('Banner.youtube', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span8')); ?>
        </div>
    </div>

<?php /*
    <div class="control-group">
		<label class="control-label">Bộ sưu tập</label>
		<div class="controls">
            <?php 
                echo $this->Form->input('Banner.bosuutap_id', array(
                        'options'=>$bosuutap_list,
                        'label'=>false,
                        'div'=>false,
                        'type'=>'select',
                        'id'=>'select_type',
                        'empty'=>'Không chọn',
                ));
            ?>
		</div>
	</div>
*/ ?>   



<?php if($this->data['Banner']['type'] != 'hidden') : ?>
	<div class="control-group">
		<label class="control-label">Loại</label>
		<div class="controls">
            <?php 
                $value = isset($_GET['type']) ? $_GET['type'] : $this->data['Banner']['type'];
                echo $this->Form->input('Banner.type', array(
                        'options'=>$banner_type,
                        'label'=>false,
                        'div'=>false,
                        'type'=>'select',
                        'id'=>'select_type',
                        'empty'=>'Chọn kiểu banner',
                        'required'=>'required',
                        'value'=>$value
                ));
            ?>
		</div>
	</div>
<?php endif; ?>

    <div class="control-group">
        <label class="control-label">Mô tả</label>
        <div class="controls">
            <?php echo $this->Form->input('Banner.description', array('label'=>false,'div'=>false, 'class'=>'span8')); ?>
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