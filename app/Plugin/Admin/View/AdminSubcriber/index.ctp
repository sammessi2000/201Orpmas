 <div class="navbar margin-none">
    <div class="navbar-inner radius-none">
	    <a class="brand" href="#">Danh sách Mail đăng ký</a>
    </div>
</div>
	
<div class="well bg-white radius-none">

<?php echo $this->Session->flash(); ?>
	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
			<td width="30">STT</td>
			<td>Mail</td>
			<td>Ngày đăng ký</td>
			<td width="80">Xoá</td>
		</tr>
		<?php if($this->data) : ?>
		<?php 
			$current_page = $this->Paginator->current(); 
			$i = 1;
			if($current_page != 1)	$i = $current_page * 10; 
			foreach($this->data as $v) : 
		?>
		<tr>
			<td><?php echo $i; $i++; ?></td>
			<td><?php echo $v['Subcriber']['email']; ?></td>
			<td><?php echo date('d-m-Y', $v['Subcriber']['created']); ?></td>
			<td>
				<a href="#" class="confirm-delete" goto="<?php echo DOMAINAD; ?>admin_subcriber/delete/<?php echo $v['Subcriber']['id']; ?>">
					<i class="icon icon-trash"></i>
				</a>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>

	<div class="pagination">
		<?php echo $this->Paginator->first('<< Đầu'); ?>	
		<?php echo $this->Paginator->numbers(array('separator'=>'')); ?>	
		<?php echo $this->Paginator->last('Cuối >>'); ?>	
	</div>
	
</div>