<form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_team','action'=>'save_pos'), true); ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách Giảng viên'); ?>
<?php echo $this->Admin->admin_breadcrumb('Giảng viên'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_team/team_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a>
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
			<th width="100">Hình ảnh</th>
			<th>Tên</th>
			<th>Vị trí</td>
			<th width="50">N.bật</th>
			<th width="50">Vị trí</th>
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
            <td>
                <?php if(!preg_match('/http/', $v['Team']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['Team']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['Team']['image']; ?>" width="70" />
                <?php endif; ?>
            </td>
			<td><?php echo $v['Team']['fullname']; ?></td>
			<td><?php echo $v['Team']['team_position']; ?></td>

			<td style="text-align: center;">
                    <a href="<?php echo DOMAINAD; ?>admin_team/update_field/featured/<?php echo $v['Team']['id'] ?>">
                        <?php if($v['Team']['featured'] == 1) : ?>
                            <i class="icon icon-ok"></i>
                        <?php else : ?>
                            <i class="icon icon-pause"></i>
                        <?php endif; ?>
                    </a>
                </td>
			<td>
				<input type="text" style="width: 20px;" name="pos[<?php echo $v['Team']['id']; ?>]" value="<?php echo $v['Team']['pos']; ?>" />
			</td>
			<td>
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_team','action'=>'team_edit', $v['Team']['id'])); ?>">
					<i class="icon icon-edit"></i>
				</a> 
				&nbsp; 
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_team','action'=>'team_delete', $v['Team']['id'])); ?>">
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