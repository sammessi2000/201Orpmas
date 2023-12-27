<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Thêm mới Tiện ích</a>
    </div>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
<form action="" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Tên tiện ích</label>
		<div class="controls">
			<?php echo $this->Form->input('Benefit.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Hình ảnh</label>
		<div class="controls">
			<?php
            $CKEditor = new CKEditor();
            $CKEditor->config['width'] = '740';
            $CKEditor->config['height'] = '380';
            CKFinder::SetupCKEditor($CKEditor);

            $initialValue = "";
            echo $CKEditor->editor("data[Benefit][images]", $initialValue, "extra");
            ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
		</div>
	</div>
</form>
</div>