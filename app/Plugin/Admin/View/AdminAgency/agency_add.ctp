<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Thêm link'); ?>
<?php echo $this->Admin->admin_breadcrumb('Thêm link'); ?>

<?php echo $this->Session->flash(); ?>

<div class="box">
<div class="box-content">

<!-- 	<div class="control-group">
		<label class="control-label">Tên</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>
     <div class="control-group">
        <div class="control-label">Hình ảnh </div>
        <div class="controls">
            <?php echo $this->Form->input('Agency.image', array('label' => false, 'div' => false, 'class' => 'span6', 'id' => 'thumbnail', 'required')); ?>
            <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
        </div>
    </div>  -->

<!-- 	<div class="control-group">
		<label class="control-label">Miền</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.mien_id', array('type'=>'select','label'=>false,'div'=>false, 'class'=>'span6', 'options'=>$mien)); ?>
		</div>
	</div> -->

	<!-- <div class="control-group">
		<label class="control-label">Thành phố</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.city_id', array('type'=>'select','label'=>false,'div'=>false, 'class'=>'span6', 'options'=>$cities)); ?>
		</div>
	</div> -->

	<!-- <div class="control-group">
		<label class="control-label">Địa chỉ</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.address', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>

 	<div class="control-group">
		<label class="control-label">Google map</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.map', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div> 

	<div class="control-group">
		<label class="control-label">Hotline</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.hotline', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div>
-->

 	<div class="control-group">
		<label class="control-label">Link</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.link', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div> 

	<!-- <div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<?php echo $this->Form->input('Agency.email', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
		</div>
	</div> -->

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