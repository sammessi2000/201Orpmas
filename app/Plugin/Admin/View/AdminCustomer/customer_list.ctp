<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách tài khoản'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý tài khoản'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
</div>

<a href="<?php echo DOMAINAD; ?>admin_customer/export_excel" target="_blank" class="btn btn-warning btn-sm ">
	<span>Xuất Excel</span>
</a>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>   

    <div class="box-content nopadding">


        <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
            <tr class="text-bold warning">
			<th width="30">STT</th>
			<td>Username</td>
			<th>Email</th>
			<th>Họ tên</th>
			<th>Điện thoại</th>
			<th>Địa chỉ</th>
			<th>Khóa học</th>
			<th>Level</th>
			<th>Score</th>
			<th>Vị trí</th>
			<!-- <th>BTK Họ tên</th> -->
			<!-- <th>BTK Email</th> -->
			<!-- <th>BTK Điện thoại</th> -->
			<!-- <th>Nội dung</th> -->
			<th>T.biểu</th>
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
			<td><?php echo $v['Customer']['username']; ?></td>
			<td><?php echo $v['Customer']['email']; ?></td>
			<td><?php echo $v['Customer']['fullname']; ?></td>
			<td><?php echo $v['Customer']['phone']; ?></td>
			<td><?php echo $v['Customer']['address']; ?></td>
			<td><?php echo $v['Customer']['khoahoc']; ?></td>
			<td><?php echo $v['Customer']['level']; ?></td>
			<td><?php echo $v['Customer']['score']; ?></td>
			<td><?php echo $v['Customer']['role']; ?></td>
			<!-- <td><?php echo $v['Customer']['fullnamebtk']; ?></td> -->
			<!-- <td><?php echo $v['Customer']['emailbtk']; ?></td> -->
			<!-- <td><?php echo $v['Customer']['phonebtk']; ?></td> -->
			<!-- <td><?php echo $v['Customer']['content']; ?></td> -->
			<td>
				<a href="<?php echo DOMAINAD; ?>admin_customer/change_field/featured/<?php echo $v['Customer']['id']; ?>">
					<?php if($v['Customer']['featured'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
				</a>
			</td>

 			<td>
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_customer','action'=>'customer_edit', $v['Customer']['id'])); ?>"><i class="icon icon-edit"></i></a> &nbsp; 
				
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_customer','action'=>'customer_delete', $v['Customer']['id'])); ?>"><i class="icon icon-trash"></i></a>
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
