<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Thêm mới</a>
    </div>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>


<?php echo $this->Form->create(null, array('url'=>array('plugin'=>'admin', 'controller'=>'admin_tag','action'=>'tag_add'), 'type'=>'post', 'class'=>'form-horizontal')); ?>


	<div class="control-group">
            <label class="control-label">Tên </label>
            <div class="controls">
                <?php echo $this->Form->input('Node.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
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