<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm Doanh nghiệp'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm Doanh nghiệp'); ?>

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
                <label class="control-label">Tên doanh nghiệp </label>
                <div class="controls">
                    <?php echo $this->Form->input('Node.title', array('label' => false, 'div' => false, 'placeholder' => 'Tiêu đề bài viết', 'class' => 'span11 ketnoi_title', 'id' => 'ketnoi_title', 'maxlength' => '70', 'required')); ?>
                    <div class="clearfix"></div>
                    <div class="msg" id="response_msg"></div>
                </div>
            </div>

<!--            <div class="control-group">
                <label class="control-label">Link tùy chỉnh</label>
                <div class="controls">
                    <?php echo $this->Form->input('Node.link', array('label' => false, 'div' => false, 'type' => 'text', 'class' => 'span11')); ?>
                </div>
            </div>-->
            
            <div class="control-group">
                <label class="control-label">Mục lục </label>
                <div class="controls">
                    <?php echo $this->Form->input('Ketnoi.category_id', array('label' => false, 'div' => false, 'required', 'class' => 'span6', 'options' => $category_tree, 'empty' => 'Chọn mục lục')); ?>
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Logo </label>
                <div class="controls">
                    <div class="thumbnail-preview thumbnail image"></div>
                    <?php echo $this->Form->input('Ketnoi.image', array('label' => false, 'div' => false, 'class' => 'span6 image_preview', 'id' => 'thumbnail', 'required')); ?>
                    <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label">Tóm tắt </label>
                <div class="controls">
                    <?php
                    echo $this->Form->input('Ketnoi.des', array('type' => 'textarea', 'div' => false, 'label' => false, 'class' => 'span11 ketnoi_description', 'rows' => 3, 'cols' => false, 'required'));
                    ?>
                </div>
            </div> 

            <div class="control-group">
                <label class="control-label">Loại hình </label>
                <div class="controls">
                    <?php echo $this->Form->input('Ketnoi.loaihinh', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
                </div>
            </div> 

            <div class="control-group">
                <label class="control-label">Địa chỉ </label>
                <div class="controls">
                    <?php echo $this->Form->input('Ketnoi.diachi', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
                </div>
            </div> 



            <div class="control-group">
                <label class="control-label">Điện thoại </label>
                <div class="controls">
                    <?php echo $this->Form->input('Ketnoi.dienthoai', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
                </div>
            </div> 

            <div class="control-group">
                <label class="control-label">Email </label>
                <div class="controls">
                    <?php echo $this->Form->input('Ketnoi.email', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
                </div>
            </div> 

            <div class="control-group">
                <label class="control-label">Nghành nghề </label>
                <div class="controls">
                    <?php echo $this->Form->input('Ketnoi.nghanhnghe', array('type'=>'text', 'div'=>false, 'label'=>false, 'class'=>'span10')); ?>
                </div>
            </div> 



            <div class="control-group">
                <label class="control-label">&nbsp;</label>
                <div class="span8">
                    <input type="submit" name="submit" value="Hoàn tất" class="btn btn-primary" />
                    <input type="reset" name="reset" value="Làm lại" class="btn" />
                </div>
            </div> 

             

    </div>
    </div>
</div>

</div>
</div>
    </form>
