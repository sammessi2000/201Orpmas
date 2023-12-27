
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm tài liệu'); ?>
<?php echo $this->Admin->admin_breadcrumb('Tài liệu'); ?>

<?php echo $this->Session->flash(); ?>


<div class="box">
<div class="box-content">

	<div class="control-group">
		<label class="control-label">Tiêu đề</label>
		<div class="controls">
			<?php echo $this->Form->input('Node.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>
            
    <div class="control-group">
		<label class="control-label">Mục lục</label>
        <div class="controls">
            <?php echo $this->Form->input('category_id', array('label' => false, 'div' => false, 'required', 'class' => 'span6', 'options' => $category_tree, 'empty' => 'Chọn mục lục', 'multiple' => true, 'style'=>'height: 200px;')); ?>
        </div>
    </div>

	<div class="control-group">
		<label class="control-label">File tài liệu</label>
		<div class="controls">
			<?php echo $this->Form->input('Document.link', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6', 'id'=>'sfile')); ?>
			<input type="button" class="btn btn-success" onclick="file_manager('sfile');" value="File">
			<small><i>(doc, pdf, excel)</i></small>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Hình ảnh</label>
		<div class="controls">
			<?php echo $this->Form->input('Document.image', array('type'=>'text','label'=>false,'div'=>false, 'id'=>'ss', 'class'=>'span8')); ?>
			<input type="button" class="btn btn-success" onclick="file_manager('ss');" value="Chọn ảnh"> &nbsp;(.jpg, .gif, .png, .swf) 
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
    </form>