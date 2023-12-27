<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Sửa hình ảnh</a>
    </div>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
<form action="" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Tiêu đề</label>
		<div class="controls">
			<?php echo $this->Form->input('Video.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

    <div class="control-group">
        <label class="control-label">Link Youtube</label>
        <div class="controls">
            <?php echo $this->Form->input('Video.image', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span8')); ?>
        </div>
    </div>

    <!-- <div class="control-group">
        <label class="control-label">Mô tả</label>
        <div class="controls">
            <?php echo $this->Form->input('Video.description', array('label'=>false,'div'=>false, 'class'=>'span11')); ?>
        </div>
    </div>
         
    <div class="control-group">
        <label class="control-label">Nội dung</label>
        <div class="controls">
             <?php
            $CKEditor = new CKEditor();
            $CKEditor->config['width'] = '740';
            $CKEditor->config['height'] = '180';
            CKFinder::SetupCKEditor($CKEditor);

            $initialValue = $this->data['Video']['content'];
            echo $CKEditor->editor("data[Video][content]", $initialValue, "extra");
            ?>
        </div>
    </div>    -->

	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
		</div>
	</div>
</form>
</div>