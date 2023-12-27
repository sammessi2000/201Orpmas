
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm Giảng viên'); ?>
<?php echo $this->Admin->admin_breadcrumb('Giảng viên'); ?>

<?php echo $this->Session->flash(); ?>


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
			<?php echo $this->Form->input('Team.team_position', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
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

<!-- 	<div class="control-group">
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

                $initialValue = '';
                echo $CKEditor->editor("data[Team][content]", $initialValue, "extra");
            ?>
        </div>
    </div>  
    <div class="control-group">
        <label class="control-label">Quotes</label>
        <div class="controls">
            <?php echo $this->Form->input('Team.comment', array('type' => 'textarea', 'div' => false, 'label' => false, 'class' => 'span9', 'rows' => 3)); ?>
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