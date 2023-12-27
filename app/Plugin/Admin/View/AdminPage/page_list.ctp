<form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_news','action'=>'news_sort'), true); ?>" method="post">
<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Danh sách bài viết</a>
        <ul class="nav pull-right">
            <li>
                <a href="<?php echo Router::url(array('plugin' => 'admin', 'controller' => 'admin_page', 'action' => 'page_add')); ?>">
                    <input type="button" name="add" class="btn btn-primary btn-small" value="Thêm mới" />
                </a>
            </li>
        </ul>
    </div>
</div>
<?php echo $this->Session->flash(); ?>
<div class="well radius-none bg-white">
    <table class="table table-hover table-bordered">
        <tr class="text-bold warning">
            <td>Tiêu đề</td>
            <td width="80">Trạng thái</td>
            <td width="80">Thay đổi</td>
            <td width="40">ID</td>
        </tr>
        
        <?php foreach($this->data as $k=>$v) : ?>
        <tr>
            <td>
                <?php echo $v['Node']['title']; ?>
            </td>
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_node/update_status/<?php echo $v['Node']['id']; ?>">
                <?php if($v['Node']['status'] == 1) : ?>
                    <i class="icon icon-ok"></i>
                <?php else : ?>
                    <i class="icon icon-pause"></i>
                <?php endif; ?>
                </a>
            </td>
            <td>                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_page', 'action'=>'page_edit', $v['Node']['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_node', 'action'=>'node_delete', $v['Node']['id']), true); ?>"><i class="icon icon-trash"></i></a>
            </td>
            <td><?php echo $v['Node']['id']; ?></td>
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
    $('#list_category').change(function() {
        var v = $(this).val();
        document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_news','action'=>'news_list'), TRUE); ?>/"+v;
    });
</script>