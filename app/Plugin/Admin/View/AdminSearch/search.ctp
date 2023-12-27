
<form action="<?php echo DOMAINAD . 'admin_node/update_pos'; ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Kết quả Tìm kiếm'); ?>
<?php echo $this->Admin->admin_breadcrumb('Kết quả Tìm kiếm'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>      

    <div class="box-content nopadding">

        <div class="row-fluid" style="padding-top: 14px;">
            <div class="category-select offset2 filter-item">
                <span style='font-size: 14px; line-height: 50px; margin-bottom: 20px;'>
                    Kết quả cho từ khóa: <strong style="color: #ff0000; font-size: 17px;"><?php echo $_GET['s']; ?></strong>
                </span>
            </div>
        </div>

        <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
            <tr class="text-bold warning">
                <th width="40">STT</th>
                <th width="100">Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th width="100">Loại Nội dung</th>
                <th width="180">Mục lục</th>
                <th width="60">Trạng thái</th>
                <th width="40" style="text-align: center;">Sửa</th>
                <th width="40" style="text-align: center;">Xóa</th>
                <th width="40" style="text-align: center;">ID</th>
                <!-- <th width="40">Copy</th> -->
            </tr>
        </thead>
        <tbody>
        <?php 
            // echo $this->Paginator->counter(
            //     'Page {:page} of {:pages}, showing {:current} records out of
            //      {:count} total, starting on record {:start}, ending on {:end}'
            // );

            $current_page = $this->Paginator->current(); 
            $stt = 1;
            
            $showing = $this->Paginator->counter('{:current}');
            $total_pages = $this->Paginator->counter('{:pages}');

            $redirectPage = $current_page;
            if($current_page > 1 && $current_page == $total_pages && $showing == 1)
                $redirectPage = $current_page - 1;

            if($current_page != 1)	$stt = (($current_page - 1) * $limit) + 1; 
        ?>  
        <?php foreach($this->data as $k=>$v) { ?>
        <tr>
            <td><?php echo $stt; $stt++; ?></td>
            <td>
                <?php echo $this->requestAction('admin/admin_search/search_get_image/' . $v['Node']['id'] . '/' . $v['Node']['type']); ?>
            </td>
            <td>
                <?php echo $v['Node']['title']; ?>
            </td>
            <td>
                <?php 
                    switch($v['Node']['type'])
                    {
                        case 'news':
                            echo 'Bài viết';
                            break;
                        case 'category':
                            echo 'Mục lục';
                            break;
                        case 'tag':
                            echo 'Tag';
                            break;
                        case 'product':
                            echo 'Sản phẩm';
                            break;
                        default:
                        break;
                    }
                ?>
            </td>
            <td>
                <?php echo $this->requestAction('admin/admin_news/get_list_category_name/' . $v['Node']['id']); ?>
            </td>
            <td>
                <?php if($v['Node']['status'] == 1) : ?>
                    <i class="icon icon-ok"></i>
                <?php else : ?>
                    <i class="icon icon-pause"></i>
                <?php endif; ?>
            </td>
            <td style="text-align: center;">                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_news', 'action'=>'news_edit', $v['Node']['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
            </td>
            <td style="text-align: center;">     
                <a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_node/node_delete/' . $v['Node']['id']; ?>?rp=<?php echo $redirectPage; ?>"><i class="icon icon-trash"></i></a>
            </td>
            <td style="text-align: center;"><?php echo $v['Node']['id']; ?></td>
        </tr>
        <?php } ?>
        </tbody>
    </table>    
    <div class="pagination">
        <?php echo $this->Paginator->first('<< Đầu '); ?>
        <?php echo $this->Paginator->numbers(array('separator'=>'')); ?>
        <?php echo $this->Paginator->last(' Cuối >>'); ?>
    </div>
 

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
    document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_news','action'=>'news_list'), TRUE); ?>/?list_category="+category + "&filter_status=" + status;
});  

$('.savepos').click(function() {
    $('form.form-main').submit();
});
</script>