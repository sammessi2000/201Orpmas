<form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_node','action'=>'update_pos'), true); ?>" method="post">
<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Tìm kiếm</a>
        <ul class="nav pull-right">
           
        </ul>
    </div>
</div>

<div class="well radius-none bg-white">
    <table class="table table-hover table-bordered">
        <tr class="text-bold warning">
            <td width="100">Ảnh đại diện</td>
            <td>Tiêu đề</td>
            <td width="180">Mục lục</td>
            <td width="80">Trạng thái</td>
            <td width="80">Thay đổi</td>
            <td width="40">ID</td>
        </tr>
        
        <?php foreach($this->data as $k=>$v) : ?>
        <?php 
        	$tbl = 'News';
        	switch ( $v['Node']['type']) {
        		case 'news':
        			$tbl = 'News';
        			break;
        		case 'product':
        			$tbl = 'Product';
        			break;
        		default:
        			# code...
        			break;
        	}

        	$node = $this->requestAction('/default/node/get_node/' . $v['Node']['id']); 
        ?>
        <tr>
            <td>
                <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $node[$tbl]['image']; ?>&w=70&zc=1" />
            </td>
            <td>
                <?php echo $v['Node']['title']; ?>
            </td>
            <td>
                <?php echo $this->requestAction('admin/admin_news/get_list_category_name/' . $v['Node']['id']); ?>
            </td>
            <td>
                <?php if($v['Node']['status'] == 1) : ?>
                    <a href="#"><i class="icon icon-ok"></i></a>
                <?php else : ?>
                    <a href="#"><i class="icon icon-pause"></i></a>
                <?php endif; ?>
            </td>
            <td>                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_' . $v['Node']['type'], 'action'=>$v['Node']['type'] . '_edit', $v['Node']['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
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
    $('#list_category, #filter_status').change(function() {
        var category = $('#list_category').val();
        var status = $('#filter_status').val();
        document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_news','action'=>'news_list'), TRUE); ?>/"+category + "/" + status;
    });
</script>