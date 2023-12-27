 <form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_partner','action'=>'save_pos'), true); ?>" method="post">
 <div class="navbar margin-none">
    <div class="navbar-inner radius-none">
	    <a class="brand" href="#">Danh sách đối tác</a>
	    <ul class="nav pull-right">
	        <li>
	            <a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_partner','action'=>'partner_add')); ?>">
					<input type="button" name="add" class="btn btn-primary" value="Thêm mới" /></a>
	        </li>
	        <li>
	            <a href="#"><input type="submit" name="save_pos" class="btn btn-warning" value="Lưu vị trí" /></a>
	        </li>
	    </ul>
    </div>
</div>
	
<div class="well bg-white radius-none">

<?php echo $this->Session->flash(); ?>
	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
			<td width="30">STT</td>
			<td width="100">Hình ảnh</td>
			<td>Tên</td>
			<td>Link</td>
			<td width="50">Vị trí</td>
			<td width="70">Thay đổi</td>
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
            <td>
                <?php if(!preg_match('/http/', $v['Partner']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['Partner']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['Partner']['image']; ?>" width="70" />
                <?php endif; ?>
            </td>
			<td><?php echo $v['Partner']['title']; ?></td>
			<td><?php echo $v['Partner']['link']; ?></td>
			<td>
				<input type="text" style="width: 20px;" name="pos[<?php echo $v['Partner']['id']; ?>]" value="<?php echo $v['Partner']['pos']; ?>" />
			</td>
			<td>
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_partner','action'=>'partner_edit', $v['Partner']['id'])); ?>">
					<i class="icon icon-edit"></i>
				</a> 
				&nbsp; 
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_partner','action'=>'partner_delete', $v['Partner']['id'])); ?>">
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
	
</form>
</div>