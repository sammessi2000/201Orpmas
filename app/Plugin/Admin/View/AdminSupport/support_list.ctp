<form action="<?php echo DOMAINAD; ?>admin_hang/save_pos" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách Nhân viên hỗ trợ'); ?>
<?php echo $this->Admin->admin_breadcrumb('Danh sách Nhân viên hỗ trợ'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_support/support_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a>
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>   

	
    <div class="box-content nopadding">

	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
			<td width="30">STT</td>
			<td>Avatar</td>
			<td>Họ tên</td>
			<td>Email</td>
			<td>Zalo</td>
			<td>Điện thoại</td>
			<td width="50">Vị trí</td>
			<td width="50">Sửa</td>
			<td width="50">Xóa</td>
		</tr>
		<?php if($this->data) : ?>
		<?php 
			$current_page = $this->Paginator->current(); 
			$stt = 1;
			
			$showing = $this->Paginator->counter('{:current}');
			$total_pages = $this->Paginator->counter('{:pages}');
		
			$redirectPage = $current_page;
			if($current_page > 1 && $current_page == $total_pages && $showing == 1)
				$redirectPage = $current_page - 1;
		
			if($current_page != 1)	$stt = (($current_page - 1) * $limit) + 1; 
			foreach($this->data as $v) : 
		?>
		<tr>
			<td><?php echo $stt; $stt++; ?></td>
			<td><img src="<?php echo DOMAIN. $v['Support']['image']; ?>" style="height: 70px; width: auto;" /></td>
			<td><?php echo $v['Support']['title']; ?></td>
			<td><?php echo $v['Support']['email']; ?></td>
			<td><?php echo $v['Support']['zalo']; ?></td>
			<td><?php echo $v['Support']['phone']; ?></td>
			<td><input type="text" style="width: 20px;" name="pos[<?php echo $v['Support']['id']; ?>]" value="<?php echo $v['Support']['pos']; ?>" /></td>
			<td>
				<a href="<?php echo DOMAINAD; ?>admin_support/support_edit/<?php echo $v['Support']['id']; ?>"><i class="icon icon-edit"></i></a> &nbsp; 
			</td>
			<td>
				<a href="#" class="confirm-delete" goto="<?php echo DOMAINAD; ?>admin_support/support_delete/<?php echo $v['Support']['id']; ?>?rp=<?php echo $redirectPage; ?>"><i class="icon icon-trash"></i></a>
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
</div>
</div>
</div>


</form>