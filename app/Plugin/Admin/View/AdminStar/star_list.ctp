<form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_team','action'=>'save_pos'), true); ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Duyệt Vote sao'); ?>
<?php echo $this->Admin->admin_breadcrumb('Vote sao'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>   

    <div class="box-content nopadding">

        <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
            <tr class="text-bold warning">
			<th width="30">STT</th>
			<th width="100">Ảnh Giáo viên</th>
			<th>Tên Giáo viên</th>
			<th>Người Vote</th>
			<th>Số sao</th>
			<th width="40">Duyệt</th>
			<th width="40">Xóa</th>
			<th width="40">ID</th>
		</tr>
		</thead>
        <tbody>
		<?php if($this->data) : ?>
		<?php 
			$current_page = $this->Paginator->current(); 
			$i = 1;
			if($current_page != 1)	$i = $current_page * 10; 
			foreach($this->data as $v) : 

				$giaovien = $this->requestAction('/admin/admin_star/get_giaovien/' . $v['Star']['ex_id']);
				$hocvien = $this->requestAction('/admin/admin_star/get_hocvien/' . $v['Star']['customer_id']);
			// pr($hocvien);
		?>
		<?php //if(isset($giaovien['Team']['fullname'])) { ?>
		<tr>
			<td><?php echo $i; $i++; ?></td>
            <td>
            	<?php if(isset($giaovien['Team']['image'])) { ?>
                <?php if(!preg_match('/http/', $giaovien['Team']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $giaovien['Team']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $giaovien['Team']['image']; ?>" width="70" />
                <?php endif; ?>
                <?php } ?>
            </td>
			<td><?php echo isset($giaovien['Team']['fullname']) ? $giaovien['Team']['fullname'] : ''; ?></td>
			<td><?php echo isset($hocvien['Customer']['username']) ? $hocvien['Customer']['username'] : ''; ?></td>
			<td><?php echo $v['Star']['vote']; ?></td>

			
			<td>
				<a href="<?php echo DOMAINAD; ?>admin_star/update_field/status/<?php echo $v['Star']['id']; ?>">
					<?php if($v['Star']['status'] == 1) { ?>
					<i class="icon icon-play"></i>
					<?php } else { ?>
					<i class="icon icon-pause"></i>
					<?php } ?>
				</a> 
			</td>
			<td>
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_star','action'=>'star_delete', $v['Star']['id'])); ?>">
                	<i class="icon icon-trash"></i>
                </a>
			</td>
			<td><?php echo $v['Star']['id']; ?></td>
		</tr>
		<?php //} ?>
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