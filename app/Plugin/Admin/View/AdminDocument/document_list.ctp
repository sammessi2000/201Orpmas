 <form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_document','action'=>'save_pos'), true); ?>" method="post" class="form-main">

	
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách tài liệu'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý tài liệu'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_document/document_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a>
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>   

    <div class="box-content nopadding">


   <div class="row-fluid" style="padding-top: 14px;">
            <div class="category-select offset2 filter-item">
                <strong class="span2 filter-label">Lọc danh mục</strong>

               
<select id="list_category">
        <option value="">Tất cả mục lục</option>
        <?php foreach($category_tree as $k=>$v) : ?>
        <option value="<?php echo $k; ?>" <?php if($k==$filter_category) echo 'selected'; ?>><?php echo $v; ?></option>
        <?php endforeach; ?>
    </select>
               

                <span class="btn btn-warning" id="btn-filter">Lọc</span>
            </div>
        </div>
	
<?php echo $this->Session->flash(); ?>
        <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
            <tr class="text-bold warning">
			<th width="30">STT</th>
			<th width="100">Hình ảnh</th>
			<th>Tên</th>
            <th width="180">Mục lục</th>
			<th>File tài liệu</th>
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
                <?php /*if(!preg_match('/http/', $v['Document']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['Document']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['Document']['image']; ?>" width="70" />
                <?php endif; */ ?>
            </td>
			<td><?php echo $v['Node']['title']; ?></td>
            <td>
                <?php echo $this->requestAction('admin/admin_document/get_list_category_name/' . $v['Node']['id']); ?>
            </td>
			<td><?php echo $v['Document']['link']; ?></td>
			<td>
				<input type="text" style="width: 20px;" name="pos[<?php echo $v['Node']['id']; ?>]" value="<?php echo $v['Node']['pos']; ?>" />
			</td>
			<td>
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_document','action'=>'document_edit', $v['Node']['id'])); ?>">
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
</form>


<script type="text/javascript">
$('#btn-filter').click(function() {
    var category = $('#list_category').val();
    var status = $('#filter_status').val();
    // document.location.href = "<?php echo DOMAINAD; ?>admin_document/document_list/?list_category="+category + "&filter_status=" + status;
    document.location.href = "<?php echo DOMAINAD; ?>admin_document/document_list/?list_category="+category;
});  
</script>