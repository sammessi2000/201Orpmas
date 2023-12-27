
<form action="<?php echo DOMAINAD . 'admin_CustomerBanner/update_pos'; ?>" method="post" class="form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Quản lý SP Doanh nghiệp'); ?>
<?php echo $this->Admin->admin_breadcrumb('Quản lý Doanh nghiệp'); ?>

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
                <th width="280">Sản phẩm / Dịch vụ</th>
                <th>Mô tả</th>
                <th width="60">Duyệt</th>
                <th width="40" style="text-align: center;">ID</th>
                <!-- <th width="40">Copy</th> -->
            </tr>
        </thead>
        <tbody>
        <?php 
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
                <?php if($v['CustomerBanner']['image'] == '') : ?>
                    ----
                <?php elseif(!preg_match('/http/', $v['CustomerBanner']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['CustomerBanner']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['CustomerBanner']['image']; ?>" width="70" />
                <?php endif; ?>
            </td>
            <td>
                <?php echo $v['CustomerBanner']['title']; ?>
            </td>
            <td>
                <?php echo $v['CustomerBanner']['description']; ?>
            </td>
        
            <!-- <td>
                <input name="sort[<?php //echo $v['CustomerBanner']['id']; ?>]" value="<?php //echo $v['CustomerBanner']['pos']; ?>" style="width: 30px;" />
            </td> -->
  
            <td>
                <a href="<?php echo DOMAINAD; ?>admin_ketnoi/update_field_b/status/<?php echo $v['CustomerBanner']['id']; ?>">
                    <?php if($v['CustomerBanner']['status'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td>
            <!-- <td style="text-align: center;">                
                <a href="<?php echo Router::url(array('plugin'=>'admin', 'controller'=>'admin_CustomerBanner', 'action'=>'CustomerBanner_edit', $v['CustomerBanner']['id']), true); ?>"><i class="icon icon-edit"></i></a> &nbsp;
            </td>
            <td style="text-align: center;">     
                <a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_CustomerBanner/CustomerBanner_delete/' . $v['CustomerBanner']['id']; ?>?rp=<?php echo $redirectPage; ?>"><i class="icon icon-trash"></i></a>
            </td> -->
            <td style="text-align: center;"><?php echo $v['CustomerBanner']['id']; ?></td>
          <!--   <td>
                <a href="<?php echo DOMAINAD; ?>admin_CustomerBanner/CustomerBanner_copy/<?php echo $v['CustomerBanner']['id']; ?>">
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
    document.location.href = "<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_CustomerBanner','action'=>'CustomerBanner_list'), TRUE); ?>/?list_category="+category + "&filter_status=" + status;
});  

$('.savepos').click(function() {
    $('form.form-main').submit();
});
</script>