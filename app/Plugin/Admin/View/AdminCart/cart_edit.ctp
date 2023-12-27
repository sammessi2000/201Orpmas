<?php 
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
?>


<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Ghi chú đơn hàng'); ?>
<?php echo $this->Admin->admin_breadcrumb('Ghi chú'); ?>

<?php echo $this->Session->flash(); ?>

<?php if($multiple_lang == true) : ?>
    <div class="lang">
        <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
        <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
        <!-- <a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a> -->
        <!--<a href="<?php echo $url_here; ?>?lang=kr" <?php if($lang == 'kr') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Hàn</a>-->
    </div>
<?php endif; ?>

<div class="box">
<div class="box-content">
    <div class="control-group">
        <label class="control-label">Người nhận</label>
        <div class="controls">
        <?php echo $this->Form->input('Order.fullname_nhan', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'span11')); ?>
        </div>
    </div> 
    <div class="control-group">
        <label class="control-label">Điện thoại nhận</label>
        <div class="controls">
        <?php echo $this->Form->input('Order.phone_nhan', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'span11')); ?>
        </div>
    </div> 
    <div class="control-group">
        <label class="control-label">Địa chỉ nhận</label>
        <div class="controls">
        <?php echo $this->Form->input('Order.address_nhan', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'span11')); ?>
        </div>
    </div> 
    <div class="control-group">
        <label class="control-label">Số lượng</label>
        <div class="controls">
        <?php echo $this->Form->input('Order.quanity', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'span11')); ?>
        </div>
    </div> 

    <div class="control-group">
        <label class="control-label">Ghi chú</label>
        <div class="controls">
            <?php
            $CKEditor = new CKEditor();
            $CKEditor->config['width'] = '740';
            $CKEditor->config['height'] = '410';
            CKFinder::SetupCKEditor($CKEditor);

            $initialValue = $this->data['Order']['comment'];
            echo $CKEditor->editor("data[Order][comment]", $initialValue, "extra");
            ?>
        </div>
    </div> 

	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
		</div>
	</div>
     

    </div>
    </div>
</div>

</div>
</div>
</form>