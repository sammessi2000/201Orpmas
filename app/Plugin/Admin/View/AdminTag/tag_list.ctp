 <form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_hangxe','action'=>'save_pos'), true); ?>" method="post">
 <div class="navbar margin-none">
    <div class="navbar-inner radius-none">
	    <a class="brand" href="#">Danh sách Tag</a>
	    <ul class="nav pull-right">
	        <li>
	            <a href="<?php echo DOMAINAD . 'admin_tag/tag_add'; ?>">
					<input type="button" name="add" class="btn btn-primary" value="Thêm mới" />
				</a>
	        </li>
	    </ul>
    </div>
</div>
	
<div class="well bg-white radius-none">
<?php echo $this->Session->flash(); ?>
	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
                    <td width="30">STT</td>
                    <td>Tên</td>
                    <td>Tổng số bài viết</td>
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
			<td><?php echo $v['Node']['title']; ?></td>
			<td>
				<?php 
					$count = $this->requestAction('/admin/admin_tag/tag_count_post/' . $v['Node']['id']);
					echo $count;
				?>
			</td>
			<td>
				<a href="<?php echo DOMAINAD . 'admin_tag/tag_edit/' . $v['Node']['id']; ?>">
					<i class="icon icon-edit"></i>
				</a> 
				&nbsp; 
				<a  class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_tag/tag_delete/' . $v['Node']['id']; ?>">
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


<script type="text/javascript">
    $('#tag_type').change(function() {
        var v = $(this).val();
        document.location.href = "<?php echo DOMAINAD; ?>admin_hangxe/tag_list/?t="+v;
    });
</script>