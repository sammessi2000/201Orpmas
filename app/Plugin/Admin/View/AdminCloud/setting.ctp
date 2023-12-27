<form action="" method="post">
<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Hiển thị trong bảng so sánh <?php echo $form_title; ?></a>
    </div>
</div>

<?php echo $this->Session->flash(); ?>
    
<div class="well radius-none bg-white">
	<?php foreach($this->data as $k=>$v) { ?>
	<p>
		<input type="checkbox" name="data[<?php echo $k; ?>][show]" value="1" <?php if($v['show'] == 1) echo 'checked'; ?> /> 
		<?php echo $v['title']; ?>
	</p>
	<?php } ?>

	<p>
		<input type="submit" name="submit" value="Hoàn tất" class="btn btn-primary" />
	</p>
</div>
</form>

<?php //pr($this->data); ?>