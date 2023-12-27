<form action="<?php echo DOMAINAD . 'admin_agency/save_pos'; ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Quản lý Link'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý Link'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_agency/agency_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <!-- <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a> -->
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>   
    <div class="box-content nopadding">
	
<div class="well bg-white radius-none">
        <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
            <tr class="text-bold warning">
				<th width="30">STT</th>
				<!-- <th width="100">Hình ảnh</th>  -->
				<!-- <th>Tên</th> -->
				<!-- <td>Địa chỉ</td> -->
				<!-- <td>Hotline</td> -->
				<!-- <td>Email</td> -->
				<th>Link</th>
				<th width="70">Thay đổi</th>
			</tr>
		</thead>
        <tbody>
		<?php if($this->data) : ?>
		<?php 
			$current_page = $this->Paginator->current(); 
			$i = 1;
			if($current_page != 1)	$i = $current_page * 10; 
			foreach($this->data as $v) : 
		?>
		<tr>
			<td><?php echo $i; $i++; ?></td>
			<!-- <td><img src="<?php echo DOMAIN . $v['Agency']['image']; ?>" style="height: 70px;" /></td> -->
			<!-- <td><?php echo $v['Agency']['title']; ?></td> -->
			<!-- <td><?php echo $v['Agency']['address']; ?></td> -->
			<!-- <td><?php echo $v['Agency']['hotline']; ?></td> -->
			<!-- <td><?php echo $v['Agency']['email']; ?></td> -->
			 <td><?php echo $v['Agency']['link']; ?></td> 			
			 <td>
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_agency','action'=>'agency_edit', $v['Agency']['id'])); ?>">
					<i class="icon icon-edit"></i>
				</a> 
				&nbsp; 
				<a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_agency','action'=>'agency_delete', $v['Agency']['id'])); ?>">
					<i class="icon icon-trash"></i>
				</a>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
        </tbody>
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
</div>
</form>
<script type="text/javascript">
    $('#agency_type').change(function() {
        var v = $(this).val();
        document.location.href = "<?php echo DOMAINAD; ?>admin_agency/agency_list/?t="+v;
    });
</script>