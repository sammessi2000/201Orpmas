<form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_node','action'=>'update_pos'), true); ?>" method="post">
<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Danh sách <?php echo $form_title; ?></a>
        <ul class="nav pull-right">
            <li>
                <a href="<?php echo Router::url(array('plugin' => 'admin', 'controller' => 'admin_' . $type, 'action' => 'add')); ?>">
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
    
<div class="well radius-none bg-white">
<?php /*
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
    */ ?>
    <table class="table table-hover table-bordered">
        <tr class="text-bold warning">
            <!-- <td width="100">Ảnh đại diện</td> -->
            <td>Tên miền</td>
            <!-- <td width="180">Mục lục</td> -->
            <!-- <td width="40">Comment</td> -->
            <td width="40">Vị trí</td>
            <!-- <td width="40">Nổi bật</td> -->
            <!-- <td width="80">Trạng thái</td> -->
            <td width="60">Thay đổi</td>
            <td width="40">ID</td>
            <!-- <td width="40">Copy</td> -->
        </tr>
        <?php foreach($this->data as $k=>$v) : ?>
        <tr>
            <!-- <td>
                <?php if($v[$tbl]['image'] == '') : ?>
                    ----
                <?php elseif(!preg_match('/http/', $v[$tbl]['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v[$tbl]['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v[$tbl]['image']; ?>" width="70" />
                <?php endif; ?>
            </td> -->
            <td>
                <?php echo $v['Node']['title']; ?>
            </td>
        <!--     <td>
                <?php //echo $this->requestAction('admin/admin_node/get_list_category_name/' . $v['Node']['id']); ?>
            </td> -->
           <!--  <td>
                <a href="<?php echo DOMAINAD; ?>admin_comment/comment_list/<?php echo $v['Node']['id']; ?>">
                <?php //echo $this->requestAction(DOMAINAD.'admin_comment/comment_count/'.$v['Node']['id']); ?>
                </a>
            </td> -->
            <td>
                <input name="sort[<?php echo $v[$tbl]['id']; ?>]" value="<?php echo $v[$tbl]['pos']; ?>" style="width: 30px;" />
            </td>
            <?php /*
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_news/update_field/featured/<?php echo $v[$tbl]['id']; ?>">
                    <?php if($v[$tbl]['featured'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td>
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_node/update_status/<?php echo $v[$tbl]['id']; ?>">
                    <?php if($v[$tbl]['status'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td>
            */ ?>
            <td>                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_' . $type, 'action'=>'edit', $v[$tbl]['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_' . $type, 'action'=>'delete', $v[$tbl]['id']), true); ?>"><i class="icon icon-trash"></i></a>
            </td>
            <td><?php echo $v[$tbl]['id']; ?></td>
           <!--  <td>
                <a href="<?php echo DOMAINAD; ?>admin_<?php echo $type; ?>/<?php echo $type; ?>_copy/<?php echo $v[$tbl]['id']; ?>">
                    <i class="icon-share"></i>
                </a> 
            </td> -->
        </tr>
        <?php endforeach; ?>
    </table>    
    <div class="pagination">
        <?php echo $this->Paginator->first('<< Đầu '); ?>
        <?php echo $this->Paginator->numbers(array('separator'=>'')); ?>
        <?php echo $this->Paginator->last(' Cuối >>'); ?>
    </div>
</div>
</form>

<script type="text/javascript">
$('#btn-filter').click(function() {
    var category = $('#list_category').val();
    var status = $('#filter_status').val();
    document.location.href = "<?php echo DOMAINAD; ?>admin_<?php echo $type; ?>/<?php echo $type; ?>_list/?list_category="+category + "&filter_status=" + status;
});  
</script>