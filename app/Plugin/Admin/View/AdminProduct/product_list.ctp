 
<form action="<?php echo DOMAINAD . 'admin_node/update_pos'; ?>" method="post" class="form-main" name="form">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Quản lý Sản phẩm'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý Sản phẩm'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_product/product_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
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
                        
            <select id="filter_status">
                <option value="" <?php if($filter_status == "") echo 'selected'; ?>>Tất cả trạng thái</option>
                <option value="0" <?php if($filter_status == "0") echo 'selected'; ?>>Nháp</option>
                <option value="1" <?php if($filter_status == "1") echo 'selected'; ?>>Xuất bản</option>
            </select>

            <span class="btn btn-warning" id="btn-filter">Lọc</span>
        </div>
    </div>

    <table class="table table-bordered table-hover">
    <thead>
        <tr class="warning" style="font-weight: bold;">
            <th width="30">STT</th>
            <th width="100">Hình ảnh</th>
            <th>Tiêu đề</th>
            <th width="140">Mục lục</th>
            <!-- <th width="40">Comment</th> -->
            <!-- <th width="40">N.xét</th> -->
            <th width="40">Vị trí</th>
            <th width="40">Featured locations</th>
            <th width="40">Top rated ski resorts</th> 
            <!-- <th width="40">Home Tab 1</th>  -->
            <!-- <th width="40">Home Tab 2</th>  -->
            <!-- <th width="40">Home Tab 3</th>  -->
            <!-- <th width="40">Home Tab 4</th>  -->
            <th width="40" style="text-align: center;">Sửa</th>
            <th width="40" style="text-align: center;">Xóa</th>
            <th width="40" style="text-align: center;">Copy</th>
            <th width="40" style="text-align: center;">Trạng thái</th>
            <th width="40" style="text-align: center;">ID</th>
        </tr>
    </thead>
    <tbody>
    <?php if($this->data) : ?>
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
     foreach($this->data as $v) : 
      ?>
  <tr>
     <td><?php echo $stt; $stt++; ?></td>
     <td>
        <img src="<?php echo DOMAIN . $v['Product']['image']; ?>" width="70" />
    </td>
    <td><?php echo $v['Node']['title']; ?></td>
    <td>
        <?php echo $this->requestAction('admin/admin_product/get_list_category_name/' . $v['Node']['id']); ?>
    </td>
<!--     <td>
        <a href="<?php echo DOMAINAD; ?>admin_comment/comment_list/<?php echo $v['Node']['id']; ?>">
        <?php //echo $this->requestAction(DOMAINAD.'admin_comment/comment_count/'.$v['Node']['id']); ?>
        </a>
    </td>
    <td>
        <a href="<?php echo DOMAINAD; ?>admin_rate/rate_list/<?php echo $v['Node']['id']; ?>">
        <?php //echo $this->requestAction(DOMAINAD.'admin_rate/rate_count/'.$v['Node']['id']); ?>
        </a>
    </td> -->

    <td>
        <input name="sort[<?php echo $v['Node']['id']; ?>]" value="<?php echo $v['Node']['pos']; ?>" style="width: 30px;" />
    </td>

    <td>
        <a href="<?php echo DOMAINAD; ?>admin_product/product_change/featured/<?php echo $v['Product']['id']; ?>">
            <?php if($v['Product']['featured'] == 1) : ?>
                <i class="icon icon-ok"></i>
            <?php else : ?>
                <i class="icon icon-pause"></i>
            <?php endif; ?>
        </a>
    </td>   
    <td>
        <a href="<?php echo DOMAINAD; ?>admin_product/product_change/newest/<?php echo $v['Product']['id']; ?>">
            <?php if($v['Product']['newest'] == 1) : ?>
                <i class="icon icon-ok"></i>
            <?php else : ?>
                <i class="icon icon-pause"></i>
            <?php endif; ?>
        </a>
    </td>   

    <!-- <td>
        <a href="<?php echo DOMAINAD; ?>admin_product/product_change/home1/<?php echo $v['Product']['id']; ?>">
            <?php if($v['Product']['home1'] == 1) : ?>
                <i class="icon icon-ok"></i>
            <?php else : ?>
                <i class="icon icon-pause"></i>
            <?php endif; ?>
        </a>
    </td>     
   <td>
        <a href="<?php echo DOMAINAD; ?>admin_product/product_change/home2/<?php echo $v['Product']['id']; ?>">
            <?php if($v['Product']['home2'] == 1) : ?>
                <i class="icon icon-ok"></i>
            <?php else : ?>
                <i class="icon icon-pause"></i>
            <?php endif; ?>
        </a>
    </td>     
    <td>
        <a href="<?php echo DOMAINAD; ?>admin_product/product_change/home3/<?php echo $v['Product']['id']; ?>">
            <?php if($v['Product']['home3'] == 1) : ?>
                <i class="icon icon-ok"></i>
            <?php else : ?>
                <i class="icon icon-pause"></i>
            <?php endif; ?>
        </a>
    </td>     
    <td>
        <a href="<?php echo DOMAINAD; ?>admin_product/product_change/home4/<?php echo $v['Product']['id']; ?>">
            <?php if($v['Product']['home4'] == 1) : ?>
                <i class="icon icon-ok"></i>
            <?php else : ?>
                <i class="icon icon-pause"></i>
            <?php endif; ?>
        </a>
    </td>   -->   
   
    <td style="text-align: center;">
        <a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_product','action'=>'product_edit', $v['Node']['id'])); ?>">
            <i class="icon icon-edit"></i>
        </a> 
    </td>
    
    <td style="text-align: center;">
        <a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_node/node_delete/' . $v['Node']['id']; ?>?rp=<?php echo $redirectPage; ?>">
            <i class="icon icon-trash"></i>
        </a>
    </td>

     <td style="text-align: center;">
        <a href="<?php echo DOMAINAD; ?>admin_product/product_copy/<?php echo $v['Node']['id']; ?>?">
            <i class="icon-share"></i>
        </a> 
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

    <td style="text-align: center;"><?php echo $v['Node']['id']; ?></td>
</tr>
<?php endforeach; ?>
<?php endif; ?>
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
    document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_product','action'=>'product_list'), TRUE); ?>/?list_category="+category + "&filter_status=" + status;
});     
</script>