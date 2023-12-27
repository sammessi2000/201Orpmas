<?php 
$title = $lang != 'vi' ? 'title_' . $lang : 'title'; 
?>

<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Sửa</a>
    </div>
    <?php /*if($multiple_lang == true) : ?>
        <div class="lang">
            <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
            <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        </div>
    <?php endif;*/ ?>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>


<form action="" class="form-horizontal" id="NodeTagEditForm" method="post" accept-charset="utf-8">
    <div class="control-group">
        <label class="control-label">Tên </label>
        <div class="controls">
            <?php echo $this->Form->input('Bosuutap.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label">Tên (EN)</label>
        <div class="controls">
            <?php echo $this->Form->input('Bosuutap.title_en', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label">Thumbnail </label>
        <div class="controls">
            <div class="thumbnail-preview thumbnail image"></div>
            <?php echo $this->Form->input('Bosuutap.image', array('label' => false, 'div' => false, 'class' => 'span6 image_preview', 'id' => 'thumbnail', 'required')); ?>
            <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
        </div>
    </div>

    <div class="control-group">
        <label class="control-label">&nbsp;</label>
        <div class="controls">
            <input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
        </div>
    </div>
</form>
</div>