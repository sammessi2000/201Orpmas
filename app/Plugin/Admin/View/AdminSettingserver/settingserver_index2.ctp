<form action="" method="post">
<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Danh sách</a>
    </div>
</div>

<?php echo $this->Session->flash(); ?>
    
<div class="well radius-none bg-white">

<table class="table table-hover table-bordered">
<tr class="text-bold warning">
	<td>Gói cước</td>
	<?php foreach($this->data['cpu'] as $c) { ?>
	<td><?php echo $c; ?></td>
	<?php } ?>
</tr>

<?php foreach($this->data['servers'] as $v) { ?>
	<?php $i=-1; foreach($this->data['cpu'] as $c) { $i++; ?>
		<?php 
			$checked = ''; 
			if(	isset($this->data['detail']['server'][$v['Server']['id']]['cpu']) 
				&& is_array($this->data['detail']['server'][$v['Server']['id']]['cpu'])
				&& in_array($c, $this->data['detail']['server'][$v['Server']['id']]['cpu'])
			) 
			{
				$checked = 'checked="checked"';
		?>
		<input type="hidden" name="data[server][<?php echo $v['Server']['id']; ?>][<?php echo $i; ?>]" value="<?php echo $c; ?>" <?php echo $checked; ?> />
	<?php } ?>
	<?php } ?>
<?php } ?>

<?php foreach($this->data['cloud'] as $v) { ?>
<tr>
	<td><?php echo $v['Node']['title']; ?></td>
	<?php $i=-1; foreach($this->data['cpu'] as $c) { $i++; ?>
	<td>
		<?php 
			$checked = ''; 
			if(	isset($this->data['detail']['cloud'][$v['Cloud']['id']]['cpu']) 
				&& is_array($this->data['detail']['cloud'][$v['Cloud']['id']]['cpu'])
				&& in_array($c, $this->data['detail']['cloud'][$v['Cloud']['id']]['cpu'])
			) 
				$checked = 'checked="checked"';
		?>
		<input type="checkbox" name="data[cloud][<?php echo $v['Cloud']['id']; ?>][<?php echo $i; ?>]" value="<?php echo $c; ?>" <?php echo $checked; ?> />
	</td>
	<?php } ?>
</tr>
<?php } ?>

</table>
<input type="submit" name="submit" value="Hoàn tất" class="btn btn-primary" />
</div>
</form>
<?php
	// pr($this->data);
	// pr($this->data['cpu']);
?>
