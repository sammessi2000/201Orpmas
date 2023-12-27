<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Cấu hình thông tin chung'); ?>
<?php echo $this->Admin->admin_breadcrumb('Cấu hình thông tin chung'); ?>


<?php if($multiple_lang == true) : ?>
    <div class="lang">
        <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
        <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
        <!-- <a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a> -->
        <!--<a href="<?php echo $url_here; ?>?lang=kr" <?php if($lang == 'kr') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Hàn</a>-->
    </div>
<?php endif; ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <!-- <a href="<?php echo DOMAINAD; ?>admin_setting/setting_theme" class="btn btn-large btn btn-orange pull-right">Cấu hình Theme</a> -->
</div>


<div class="box">
<div class="box-content">

    <?php foreach ($this->data as $k => $v) : ?>
        <div class="control-group">
            <label class="control-label"><?php echo $v['label']; ?></label>
            <div class="controls">
                <?php
                if ($v['type'] == 'ckfinder') 
                {
                    $CKEditor = new CKEditor();
                    $CKEditor->config['width'] = '750';
                    $CKEditor->config['height'] = '120';
                    CKFinder::SetupCKEditor($CKEditor);

                    $initialValue = $v['value'];
                    echo $CKEditor->editor("data[Setting][$k]", $initialValue, "compact");
                } 
                if ($v['type'] == 'file') 
                {
                    echo $this->Form->input("Setting." . $k, array('label' => false, 'div' => false, 'class' => 'span6', 'id' => $k, 'value'=>$v['value']));
                    echo '<input type="button" class="btn btn-info" onclick="file_manager(\''. $k .'\');" value="Chọn ảnh">';
                } 
                else if ($v['type'] == 'textarea') 
                {
                    $textarea = array(
                        'label' => false, 'div' => false,
                        'class' => 'span9',
                        'value' => stripslashes($v['value']),
                        'type' => 'textarea',
                        'id' => $k,
                        'cols' => false,
                    );
                    
                    if($v['maxlength'] > 0)
                        $textarea['maxlength'] = $v['maxlength'];
                    
                    echo $this->Form->input('Setting.' . $k, $textarea);
                } 
                else
                {
                    echo $this->Form->input('Setting.' . $k, array('label' => false, 'div' => false, 'class' => 'input-xxlarge', 'value' => $v['value']));
                }
                ?>
            </div>
        </div>
            <?php endforeach; ?>	

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

<script type="text/javascript">
    $('#description').maxlength({
        alwaysShow: true,
        threshold: 10,
        placement: 'top',
    });

    $('#keyword').maxlength({
        alwaysShow: true,
        threshold: 10,
        placement: 'top',
    });
</script>