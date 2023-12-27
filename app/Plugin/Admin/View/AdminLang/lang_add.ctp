
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm key'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm key'); ?>

<?php echo $this->Session->flash(); ?>

<div class="box">
<div class="box-content">
	

	<div class="control-group">
		<label class="control-label">Key</label>
		<div class="controls">
			<?php echo $this->Form->input('Lang.key', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>
    
	<div class="control-group">
		<label class="control-label">Tiếng Việt</label>
		<div class="controls">
			<?php echo $this->Form->input('Lang.vi', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>
    
	<div class="control-group">
		<label class="control-label">Tiếng Anh</label>
		<div class="controls">
			<?php echo $this->Form->input('Lang.en', array('type'=>'text','label'=>false,'div'=>false)); ?>
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