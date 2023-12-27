
<form action="<?php echo DOMAINAD . 'admin_Customer/update_pos'; ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Quản lý Doanh nghiệp'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý Doanh nghiệp'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <!-- <a href="<?php echo DOMAINAD; ?>admin_Customer/Customer_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a> -->
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
                <th width="280">Tên</th>
                <th width="180">Lĩnh vực</th>
                <th>Thông tin</th>
                <!-- <th width="40">Vị trí</th> -->
                <!-- <th width="40">Nổi bật</th>  -->
                <th width="60">Trạng thái</th>
                <!-- <th width="40" style="text-align: center;">Sửa</th> -->
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
                <?php if($v['Customer']['logo'] == '') : ?>
                    ----
                <?php elseif(!preg_match('/http/', $v['Customer']['logo'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['Customer']['logo']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['Customer']['logo']; ?>" width="70" />
                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_ketnoi/ketnoi_banner?c=<?php echo $v['Customer']['id']; ?>">
                <?php echo $v['Customer']['fullname']; ?>
                </a>
            </td>
            <td>
                <?php echo isset($hangs[$v['Customer']['hang_id']]) ? $hangs[$v['Customer']['hang_id']] : '---'; ?>
            </td>
            <td>
                <?php //echo $this->requestAction('admin/admin_Customer/get_category_name/' . $v['Customer']['category_id']); ?>
                <b>Địa chỉ:</b> <?php echo $v['Customer']['address']; ?><br />
                <b>Điện thoại:</b> <?php echo $v['Customer']['phone']; ?><br />
                <b>Email:</b> <?php echo $v['Customer']['email']; ?><br />
                <b>Nghành nghề:</b> <?php echo $v['Customer']['nganhnghe']; ?><br />
                <b>Loại hình DN:</b> <?php echo $v['Customer']['loaihinh']; ?><br />
            </td>
        
            <!-- <td>
                <input name="sort[<?php //echo $v['Customer']['id']; ?>]" value="<?php //echo $v['Customer']['pos']; ?>" style="width: 30px;" />
            </td> -->
  
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_ketnoi/update_field/duyet_thongtin/<?php echo $v['Customer']['id']; ?>">
                    <?php if($v['Customer']['duyet_thongtin'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td>
            <!-- <td style="text-align: center;">                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_customer', 'action'=>'customer_edit', $v['Customer']['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
            </td> -->
            <td style="text-align: center;">     
                <a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_ketnoi/customer_delete/' . $v['Customer']['id']; ?>?rp=<?php echo $redirectPage; ?>"><i class="icon icon-trash"></i></a>
            </td>
            <td style="text-align: center;"><?php echo $v['Customer']['id']; ?></td>
          <!--   <td>
                <a href="<?php echo DOMAINAD; ?>admin_Customer/Customer_copy/<?php echo $v['Customer']['id']; ?>">
                    <i class="icon-share"></i>
                </a> 
            </td> -->
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
    document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_Customer','action'=>'Customer_list'), TRUE); ?>/?list_category="+category + "&filter_status=" + status;
});  

$('.savepos').click(function() {
    $('form.form-main').submit();
});
</script>