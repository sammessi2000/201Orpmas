<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Sửa đối tác</a>
    </div>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
<form action="" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Tiêu đề</label>
		<div class="controls">
			<?php echo $this->Form->input('Partner.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Link</label>
		<div class="controls">
			<?php echo $this->Form->input('Partner.link', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Hình ảnh</label>
		<div class="controls">
			<?php echo $this->Form->input('Partner.image', array('type'=>'text','label'=>false,'div'=>false,'required'=>'required', 'id'=>'ss', 'class'=>'span8')); ?>
			<input type="button" class="btn btn-success" onclick="file_manager('ss');" value="Chọn ảnh"> &nbsp;(.jpg, .gif, .png, .swf) 
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