
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Sửa tài khoản'); ?>
<?php echo $this->Admin->admin_breadcrumb('Tài khoản'); ?>

<?php echo $this->Session->flash(); ?>


<div class="box">
<div class="box-content">

	<div class="control-group">
		<label class="control-label">Họ và tên</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.fullname', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Username</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.username', array('type'=>'text','readonly', 'label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Mật khẩu</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.password', array('type'=>'text','label'=>false,'div'=>false, 'value'=>'')); ?>
			<small><i>Bỏ trống nếu không thay đổi</i></small>
		</div>
	</div>


	<div class="control-group">
		<label class="control-label">Avatar</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.logo', array('label' => false, 'div' => false, 'class' => 'span6', 'id' => 'thumbnail', 'required')); ?>
                <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
		</div>
	</div>

       
	<div class="control-group">
		<label class="control-label">Email</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.email', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Điện thoại</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.phone', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Address</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.address', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Khóa học</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.khoahoc', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Level</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.level', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">Score</label>
		<div class="controls">
			<?php echo $this->Form->input('Customer.score', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<!--<div class="control-group">
		<label class="control-label">Thư mục upload</label>
		<div class="controls">
			<?php echo $this->Form->input('Admin.folder', array('type'=>'text','label'=>false,'div'=>false)); ?>
			<em><i>(Nên để tên thư mục là chữ cái hoặc số không dấu, không có khoảng cách)</i></em>
		</div>
	</div>-->


<?php
// $role = null;
// if($this->data['Admin']['role'] != '')
// 	$role = explode(',', $this->data['Admin']['role']);
?>
	<!--<div class="control-group">
		<label class="control-label">Quyền</label>
		<div class="controls">
			<input type="checkbox" name="role[]" value="category" <?php if($role != null && in_array('category', $role)) echo 'checked'; ?> /> Mục lục &nbsp;
			<input type="checkbox" name="role[]" value="page" <?php if($role != null && in_array('page', $role)) echo 'checked'; ?> /> Page &nbsp;
			<input type="checkbox" name="role[]" value="product" <?php if($role != null && in_array('product', $role)) echo 'checked'; ?> /> Sản phẩm &nbsp;
			<input type="checkbox" name="role[]" value="news" <?php if($role != null && in_array('news', $role)) echo 'checked'; ?> /> Tin tức &nbsp;

			<br />
			<br />

			<input type="checkbox" name="role[]" value="banner" <?php if($role != null && in_array('banner', $role)) echo 'checked'; ?> /> Media &nbsp;
			<input type="checkbox" name="role[]" value="account" <?php if($role != null && in_array('account', $role)) echo 'checked'; ?> /> Tài khoản &nbsp;
			<input type="checkbox" name="role[]" value="setting" <?php if($role != null && in_array('setting', $role)) echo 'checked'; ?> /> Thiết lập &nbsp;
		</div>
	</div>-->

	<div class="control-group">
		<label class="control-label">&nbsp;</label>
		<div class="controls">
			<input type="submit" name="submit" value="Xác nhận" class="btn btn-primary" />
		</div>
	</div>
	</div>
	</div>
</form>
