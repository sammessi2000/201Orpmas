<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Thêm mới tỉnh thành</a>
    </div>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
<?php echo $this->Form->create(null, array('url'=>array('plugin'=>'admin', 'controller'=>'admin_city','action'=>'city_add'), 'type'=>'post', 'class'=>'form-horizontal')); ?>
	<div class="control-group">
		<label class="control-label">Tỉnh</label>
		<div class="controls">
			<?php echo $this->Form->input('City.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

    <div class="control-group">
        <label class="control-label">Miền</label>
        <div class="controls">
            <?php echo $this->Form->input('Agency.mien_id', array('type'=>'select','label'=>false,'div'=>false, 'class'=>'span6', 'options'=>$mien)); ?>
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

            $initialValue = "";
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