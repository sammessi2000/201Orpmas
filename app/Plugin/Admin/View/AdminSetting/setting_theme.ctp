<link rel="stylesheet" href="<?php echo DOMAIN; ?>css/bootstrap-colorpicker.min.css" />
<script type="text/javascript" src="<?php echo DOMAIN; ?>js/bootstrap-colorpicker.min.js"></script>

<?php 
    $data = array();

    for($i=1; $i<=13; $i++)
    {
        $data['s' . $i]['background'] = '';
        $data['s' . $i]['background_2'] = '';
        $data['s' . $i]['text'] = '';
        $data['s' . $i]['link'] = '';
        $data['s' . $i]['hover'] = '';
    }

    if($this->App->is_valid_json($theme_setting))
    {
        $new_data = json_decode($theme_setting, TRUE);
    }
?>

<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Cấu hình Theme'); ?>
<?php echo $this->Admin->admin_breadcrumb('Cấu hình Theme'); ?>

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

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_setting/setting_theme" class="btn btn-large btn btn-orange pull-right">Cấu hình Theme</a>
</div>


<div class="box">
<div class="box-content">
    <div class="container-fluid">
        <div class="row">
            <div class="span7">
                <?php foreach($data as $key=>$val) { ?>
                <?php foreach($val as $k=>$v) { ?>
                <?php
                    $value = isset($new_data[$key][$k]) ? $new_data[$key][$k] : '';
                    $style = isset($new_data[$key][$k]) ?  'style="background: ' . $new_data[$key][$k] . '"' : '';
                ?>
                    <div class="control-group">
                        <label class="control-label"><?php echo strtoupper($key) . ' ' . $k; ?> </label>
                        <div class="controls">
                            <input type="text" name="data[<?php echo $key; ?>][<?php echo $k; ?>]" value="<?php echo $value; ?>" <?php echo $style; ?> autocomplete="off" />
                        </div>
                    </div>
                <?php } ?>
                <?php } ?>

                <div class="control-group">
                    <label class="control-label">&nbsp;</label>
                    <div class="controls">
                        <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
                    </div>
                </div>

            </div>
            <div class="span5">
                <img src="<?php echo DOMAIN; ?>theme/admin/theme.jpg">
            </div>
        </div>  
    </div>	
    
</div>
</div>
</div>

</div>
</div>

</form>
<script type="text/javascript">
    $('input[type=text]').colorpicker();
    $('input[type=text]').change(function() {
        var v = $(this).val();
        $(this).css('background', v);
    });
</script>