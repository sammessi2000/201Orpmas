 <form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_node','action'=>'update_pos'), true); ?>" method="post">
   <div class="navbar margin-none">
    <div class="navbar-inner radius-none">
       <a class="brand" href="#">Danh sách Bộ sưu tập</a>
       <ul class="nav pull-right">
        <li>
            <a href="<?php echo Router::url(array('plugin' => 'admin', 'controller' => 'admin_collection', 'action' => 'collection_add')); ?>">
                <input type="button" name="add" class="btn btn-primary btn-small" value="Thêm mới" />
            </a>
        </li>
        <li>
            <a href="#"><input type="submit" name="save" id="serialize" class="btn btn-warning btn-small" value="Lưu vị trí" /></a>
        </li>
    </ul>
</div>
</div>

<?php echo $this->Session->flash(); ?>

<div class="well bg-white radius-none">
    <select id="list_category">
        <option value="">Tất cả mục lục</option>
        <?php foreach($category_tree as $k=>$v) : ?>
        <option value="<?php echo $k; ?>" <?php if($k==$filter_category) echo 'selected'; ?>><?php echo $v; ?></option>
        <?php endforeach; ?>
    </select>
    
    <select id="filter_status">
        <option value="" <?php if($filter_status == "") echo 'selected'; ?>>Tất cả trạng thái</option>
        <option value="0" <?php if($filter_status == "0") echo 'selected'; ?>>Nháp</option>
        <option value="1" <?php if($filter_status == "1") echo 'selected'; ?>>Xuất bản</option>
    </select>
    <span class="btn btn-warning" id="btn-filter">Lọc</span>
    
    <table class="table table-bordered table-hover">
      <tr class="warning" style="font-weight: bold;">
         <td width="30">STT</td>
         <td width="100">Hình ảnh</td>
         <td>Tiêu đề</td>
         <td width="140">Mục lục</td>
         <!-- <td width="40">Comment</td> -->
         <td width="40">Vị trí</td>
         <td width="70">Thay đổi</td>
         <!-- <td width="40">Copy</td> -->
     </tr>
     <?php if($this->data) : ?>
     <?php 
     $current_page = $this->Paginator->current(); 
     $i = 1;
     if($current_page != 1) $i = $current_page * 10; 
     foreach($this->data as $v) : 
      ?>
  <tr>
     <td><?php echo $i; $i++; ?></td>
     <td>
        <img src="<?php echo DOMAIN . $v['Collection']['image']; ?>" width="70" />
    </td>
    <td><?php echo $v['Node']['title']; ?></td>
    <td>
        <?php echo $this->requestAction('admin/admin_collection_/get_list_category_name/' . $v['Node']['id']); ?>
    </td>
 <!--    <td>
        <a href="<?php echo DOMAINAD; ?>admin_comment/comment_list/<?php echo $v['Node']['id']; ?>">
        <?php //echo $this->requestAction(DOMAINAD.'admin_comment/comment_count/'.$v['Node']['id']); ?>
        </a>
    </td> -->
    <td>
        <input name="sort[<?php echo $v['Node']['id']; ?>]" value="<?php echo $v['Node']['pos']; ?>" style="width: 30px;" />
    </td>
    <td>
        <a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_collection','action'=>'collection_edit', $v['Node']['id'])); ?>">
            <i class="icon icon-edit"></i>
        </a> 
        &nbsp; 
        <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_node','action'=>'node_delete', $v['Node']['id'])); ?>">
            <i class="icon icon-trash"></i>
        </a>
    </td>
   <!--  <td>
        <a href="<?php echo DOMAINAD; ?>admin_collection/collection_copy/<?php echo $v['Node']['id']; ?>">
            <i class="icon-share"></i>
        </a> 
    </td> -->
</tr>
<?php endforeach; ?>
<?php endif; ?>
</table>
<div class="pagination">
    <?php echo $this->Paginator->first('<< Đầu '); ?>
    <?php echo $this->Paginator->numbers(array('separator'=>'')); ?>
    <?php echo $this->Paginator->last(' Cuối >>'); ?>
</div>
</form>
</div>

<script type="text/javascript">     
$('#btn-filter').click(function() {
    var category = $('#list_category').val();
    var status = $('#filter_status').val();
    document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_collection','action'=>'collection_list'), TRUE); ?>/?list_category="+category + "&filter_status=" + status;
});     
</script>