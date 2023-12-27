 <form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_tiendo','action'=>'save_pos'), true); ?>" method="post">
 <div class="navbar margin-none">
    <div class="navbar-inner radius-none">
	    <a class="brand" href="#">Danh sách tiến độ</a>
	    <ul class="nav pull-right">
	        <li>
	            <a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_tiendo','action'=>'tiendo_add')); ?>">
					<input type="button" name="add" class="btn btn-primary" value="Thêm mới" /></a>
	        </li>
	        <li>
	            <a href="#"><input type="submit" name="save_pos" class="btn btn-warning" value="Lưu vị trí" /></a>
	        </li>
	    </ul>
    </div>
</div>
	
<div class="well bg-white radius-none">
<select id="list_category">
        <option value="">Tất cả mục lục</option>
        <?php foreach($category_tree as $k=>$v) : ?>
        <option value="<?php echo $k; ?>" <?php if($k==$filter_category) echo 'selected'; ?>><?php echo $v; ?></option>
        <?php endforeach; ?>
    </select>
    <span class="btn btn-warning" id="btn-filter">Lọc</span>
<?php echo $this->Session->flash(); ?>
	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
			<td width="30">STT</td>
			<!-- <td width="100">Hình ảnh</td> -->
			<td>Tên</td>
            <td width="180">Mục lục</td>
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
            <?php /*<td>
                <?php if(!preg_match('/http/', $v['Tiendo']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['Tiendo']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['Tiendo']['image']; ?>" width="70" />
                <?php endif; ?>
            </td>*/ ?>
			<td><?php echo $v['Node']['title']; ?></td>
            <td>
                <?php echo $this->requestAction('admin/admin_tiendo/get_list_category_name/' . $v['Node']['id']); ?>
            </td>
			<td>
				<input type="text" style="width: 20px;" name="pos[<?php echo $v['Node']['id']; ?>]" value="<?php echo $v['Node']['pos']; ?>" />
			</td>
			<td>
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_tiendo','action'=>'tiendo_edit', $v['Node']['id'])); ?>">
					<i class="icon icon-edit"></i>
				</a> 
				&nbsp; 
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_node','action'=>'node_delete', $v['Node']['id'])); ?>">
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
$('#btn-filter').click(function() {
    var category = $('#list_category').val();
    var status = $('#filter_status').val();
    // document.location.href = "<?php echo DOMAINAD; ?>admin_tiendo/tiendo_list/?list_category="+category + "&filter_status=" + status;
    document.location.href = "<?php echo DOMAINAD; ?>admin_tiendo/tiendo_list/?list_category="+category;
});  
</script>