
<form action="" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Quản lý Bình luận'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý Bình luận'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_news/news_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
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
			<td width="30">STT</td>
			<td>Tên người bình luận</td>
			<!-- <td>Tiêu đề</td> -->
			<td>Email</td>
			<td>Website</td>
			<td>Nội dung</td>
			<td width="70">Trạng thái</td>
			<td width="70">Thay đổi</td>
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
			<td><?php echo $v['Comment']['fullname']; ?></td>
			<td><?php echo $v['Comment']['email']; ?></td>
			<td><?php echo $v['Comment']['website']; ?></td>
			<!-- <td><?php echo $v['Node']['title']; ?></td> -->
			<td>
				<a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" target="_blank">
					<?php echo $v['Node']['title']; ?>
				</a>
				<br />
				<?php echo $v['Comment']['content']; ?>
			</td>
                        
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_comment/update_status/<?php echo $v['Comment']['id']; ?>">
                    <?php if($v['Comment']['status'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td>
			<td>
				<!-- <a href="<?php echo DOMAINAD . 'admin_comment/comment_edit/' . $v['Comment']['id']; ?>"><i class="icon icon-edit"></i></a> &nbsp;  -->
                <a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_comment/comment_delete/' . $v['Comment']['id']; ?>"><i class="icon icon-trash"></i></a>
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