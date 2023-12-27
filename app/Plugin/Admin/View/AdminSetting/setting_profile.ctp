<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Thay đổi thông tin cá nhân</a>
    </div>
</div>

<div class="well bg-white radius-none">

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
<?php echo $this->Form->create(null, array('url'=>array('plugin'=>'admin', 'controller'=>'admin_setting','action'=>'setting_profile'), 'type'=>'post', 'class'=>'form-horizontal')); ?>


	<div class="control-group">
		<label class="control-label">Họ và Tên</label>
		<div class="controls">
			<?php 
			echo $this->Form->input('Admin.fullname', array('label'=>false,'div'=>false, 'class'=>'input-xlarge','required'=>'required')); 
			?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<?php 
			echo $this->Form->input('Admin.email', array('label'=>false,'div'=>false, 'class'=>'input-xlarge','required'=>'required')); 
			?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Mật khẩu mới</label>
		<div class="controls">
			<?php 
			echo $this->Form->input('Admin.new_password', array('label'=>false,'div'=>false, 'class'=>'input-xlarge','value'=>'')); 
			?>
                        <small><i>Bỏ trống nếu không thay đổi</i></small>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Mật khẩu hiện tại</label>
		<div class="controls">
			<?php 
			echo $this->Form->input('Admin.current_password', array('label'=>false,'div'=>false, 'class'=>'input-xlarge')); 
			?>
                        <small><i>Bỏ trống nếu không thay đổi mật khẩu</i></small>
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