<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Thêm mới tiến độ</a>
    </div>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
<form action="" method="post" class="form-horizontal">
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
		<label class="control-label">Nội dung</label>
        <div class="controls">
            <?php
                $CKEditor = new CKEditor();
                $CKEditor->config['width'] = '740';
                $CKEditor->config['height'] = '180';
                CKFinder::SetupCKEditor($CKEditor);

                $initialValue = "";
                echo $CKEditor->editor("data[Tiendo][content]", $initialValue, "extra");
            ?>
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