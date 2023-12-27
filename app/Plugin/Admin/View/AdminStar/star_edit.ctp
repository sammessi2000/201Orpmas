<?php
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
$description = $lang != 'vi' ? 'description_' . $lang : 'description'; 
$content = $lang != 'vi' ? 'content_' . $lang : 'content'; 
$comment = $lang != 'vi' ? 'comment_' . $lang : 'comment'; 
$team_position = $lang != 'vi' ? 'team_position_' . $lang : 'team_position'; 
?>
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Sửa Giảng viên'); ?>
<?php echo $this->Admin->admin_breadcrumb('Giảng viên'); ?>

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
		<label class="control-label">Tên</label>
		<div class="controls">
			<?php echo $this->Form->input('Team.fullname', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Thông tin</label>
		<div class="controls">
			<?php echo $this->Form->input('Team.' . $team_position, array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Sao</label>
		<div class="controls">
			<?php echo $this->Form->input('Team.stars', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span3')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Hình ảnh</label>
		<div class="controls">
			<?php echo $this->Form->input('Team.image', array('type'=>'text','label'=>false,'div'=>false,'required'=>'required', 'id'=>'ss', 'class'=>'span8')); ?>
			<input type="button" class="btn btn-success" onclick="file_manager('ss');" value="Chọn ảnh"> &nbsp;(.jpg, .gif, .png, .swf) 
		</div>
	</div> 

	<!-- <div class="control-group">
		<label class="control-label">Nhóm</label>
		<div class="controls">
			<?php //echo $this->Form->input('Team.category_id', array('type'=>'select','label'=>false,'div'=>false, 'class'=>'span6', 'options'=>$team_categories)); ?>
		</div>
	</div> -->

    <div class="control-group">
        <label class="control-label">Mô tả</label>
        <div class="controls">
            <?php
                $CKEditor = new CKEditor();
                $CKEditor->config['width'] = '740';
                $CKEditor->config['height'] = '180';
                CKFinder::SetupCKEditor($CKEditor);

                $initialValue = $this->data['Team'][$content];
                echo $CKEditor->editor("data[Team][$content]", $initialValue, "extra");
            ?>

        </div>
    </div>     
    <div class="control-group">
        <label class="control-label">Quotes</label>
        <div class="controls">
            <?php echo $this->Form->input('Team.' . $comment, array('type' => 'textarea', 'div' => false, 'label' => false, 'class' => 'span9', 'rows' => 3)); ?>
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
    </form>