
<form action="<?php echo DOMAINAD . 'admin_node/update_pos'; ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Quản lý bài viết chờ duyệt'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý bài viết chờ duyệt'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
</div>

<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>      

    <div class="box-content nopadding">

        <table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
            <tr class="text-bold warning">
                <th width="40">STT</th>
                <th width="100">Ảnh đại diện</th>
                <th>Tiêu đề</th>
                <th width="180">Mục lục</th>
                <th width="40" style="text-align: center;">Duyệt</th>
                <th width="40" style="text-align: center;">Xóa</th>
                <th width="40" style="text-align: center;">ID</th>
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
                <?php if($v['UserPost']['image'] == '') : ?>
                    ----
                <?php elseif(!preg_match('/http/', $v['UserPost']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['UserPost']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['UserPost']['image']; ?>" width="70" />
                <?php endif; ?>
            </td>
            <td>
                <?php echo $v['UserPost']['title']; ?>
            </td>
            <td>
                <?php 
                if(is_numeric($v['UserPost']['category_id']))
                echo $this->requestAction('admin/admin_news/get_category_name/' . $v['UserPost']['category_id']); 
                ?>
            </td>
          
            <td style="text-align: center;">                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_news', 'action'=>'news_res', $v['UserPost']['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
            </td>
            <td style="text-align: center;">     
                <a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_node/node_delete/' . $v['UserPost']['id']; ?>?rp=<?php echo $redirectPage; ?>"><i class="icon icon-trash"></i></a>
            </td>
            <td style="text-align: center;"><?php echo $v['UserPost']['id']; ?></td>
         
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
