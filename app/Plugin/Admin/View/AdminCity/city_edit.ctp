<?php 
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
?>

<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Sửa tỉnh thành</a>
    </div>
    <?php if($multiple_lang == true) : ?>
        <div class="lang">
            <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
            <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
            <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
            <!--<a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a>-->
        </div>
    <?php endif; ?>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
<form action="" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Tỉnh</label>
		<div class="controls">
                    <?php echo $this->Form->hidden('City.title'); ?>
			<?php echo $this->Form->input('City.' . $title, array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

    <div class="control-group">
        <label class="control-label">Miền</label>
        <div class="controls">
            <?php echo $this->Form->input('City.mien_id', array('type'=>'select','label'=>false,'div'=>false, 'class'=>'span6', 'options'=>$mien)); ?>
        </div>
    </div>

    <?php /*
    <div class="control-group">
        <label class="control-label">Tóm tắt</label>
        <div class="controls">
            <?php
            $CKEditor = new CKEditor();
            $CKEditor->config['width'] = '740';
            $CKEditor->config['height'] = '110';
            CKFinder::SetupCKEditor($CKEditor);

            $initialValue = $this->data['City']['description'];
            echo $CKEditor->editor("data[City][description]", $initialValue, "extra");
            ?>
        </div>
    </div> 
    */ ?>

	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
		</div>
	</div>
</form>
</div>