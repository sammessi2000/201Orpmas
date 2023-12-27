
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm màu'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm màu'); ?>

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
        <label class="control-label">Tên </label>
        <div class="controls">
            <?php echo $this->Form->input('Color.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span3')); ?>
        </div>
	</div>
    
    <div class="control-group">
        <div class="control-label"></div>
        <div class="controls">
            <div class="color-preview"></div>
        </div>
    </div>

    
    <div class="control-group">
        <div class="control-label">Màu </div>
        <div class="controls">
            <?php echo $this->Form->input('Color.image', array('label' => false, 'div' => false, 'class' => 'span2', 'id' => 'thumbnail', 'required', 'autocomplete'=>'off')); ?>
        </div>
    </div>

    <?php 
    /*
    <div class="control-group">
        <div class="control-label">Hình ảnh </div>
        <div class="controls">
            <div class="thumbnail-preview image thumbnail"></div>
            <?php echo $this->Form->input('Color.image', array('label' => false, 'div' => false, 'class' => 'span6 image_preview', 'id' => 'thumbnail', 'required')); ?>
            <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
        </div>
    </div>

    <div class="control-group">
        <div class="control-label">Website </div>
        <div class="controls">
            <?php echo $this->Form->input('Color.website', array('label' => false, 'div' => false, 'class' => 'span6')); ?>
        </div>
    </div>


    <div class="control-group">
        <div class="control-label">Mô tả </div>
        <div class="controls">
            <?php
            $CKEditor = new CKEditor();
            $CKEditor->config['width'] = '740';
            $CKEditor->config['height'] = '180';
            CKFinder::SetupCKEditor($CKEditor);

            $initialValue = '';

            echo $CKEditor->editor("data[Color][description]", $initialValue, "extra");
            ?>
        </div>
    </div>

        <div class="control-group">
            <div class="control-label">Mô tả (EN)</div>
            <div class="controls">
                <?php
                $CKEditor = new CKEditor();
                $CKEditor->config['width'] = '740';
                $CKEditor->config['height'] = '180';
                CKFinder::SetupCKEditor($CKEditor);

                $initialValue = '';

                echo $CKEditor->editor("data[Color][description_en]", $initialValue, "extra");
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

    
</div>
</div>
</div>

</div>
</div>

</form>

<script>
    $('#thumbnail').colorpicker();
    $('#thumbnail').change(function () {
        var v = $(this).val();
        $('.color-preview').attr('style', 'background: ' + v);
    });
</script>