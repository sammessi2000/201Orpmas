
<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Sửa key'); ?>
<?php echo $this->Admin->admin_breadcrumb('Sửa key'); ?>

<?php echo $this->Session->flash(); ?>

<div class="box">
<div class="box-content">

    <?php echo $this->Form->input('Lang.key', array('type'=>'hidden', 'value'=>$this->data['Lang']['key'])); ?>
	<div class="control-group">
		<label class="control-label">
		<?php
			if($editor == 1) 
			{
				echo 'Nội dung';
			}
			else if($image == 1)
			{
				echo 'Chọn ảnh';
			}
			else if($image_link == 1)
			{
				echo 'Chọn ảnh';
			}
			else if($image_link_text == 1)
			{
				echo 'Chọn ảnh';
			}
			else if($text_link == 1)
			{
				echo 'Tiêu đề';
			}
			else if($category == 1)
			{
				echo 'Nhập CID mục lục (xem trong quản trị mục lục)';
			}
			else
			{
				echo 'Tiếng Việt';
			}
			?>
		</label>
		<div class="controls">
			<?php 
				if($editor == 1) 
				{
		            $CKEditor = new CKEditor();
		            $CKEditor->config['width'] = '800';
		            $CKEditor->config['height'] = '280';
		            CKFinder::SetupCKEditor($CKEditor);

		            $initialValue = $this->data['Lang']['vi'];
		            echo $CKEditor->editor("data[Lang][vi]", $initialValue, "extra");
				} 
				else if($image == 1)
				{
					?>

			
	                    <?php echo $this->Form->input('Lang.vi', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6', 'id' => 'thumbnail', 'required')); ?>
	                    <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
		            <input type="hidden" name="flag_image" value="1" />

					<?php 
				}
				else if($image_link == 1)
				{
					?>

			
	                    <?php echo $this->Form->input('Lang.vi', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6', 'id' => 'thumbnail', 'required')); ?>
	                    <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
		            <input type="hidden" name="flag_image" value="1" />

					<?php 
				}
				else if($image_link_text == 1)
				{
					?>

			
	                    <?php echo $this->Form->input('Lang.vi', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6', 'id' => 'thumbnail', 'required')); ?>
	                    <input type="button" class="btn btn-info" onclick="file_manager('thumbnail');" value="Chọn ảnh">
		            <input type="hidden" name="flag_image" value="1" />

					<?php 
				}
				else if($textarea == 1)
				{
					?>

			
	                    <?php echo $this->Form->input('Lang.vi', array('type'=>'textarea', 'label' => false, 'div' => false, 'class' => 'span8', 'required')); ?>

					<?php 
				}
				else if($text_link == 1)
				{
					?>
	                    <?php echo $this->Form->input('Lang.vi', array('type'=>'text', 'label' => false, 'div' => false, 'class' => 'span6', 'id' => 'thumbnail', 'required')); ?>
		            <input type="hidden" name="flag_text" value="1" />

					<?php 
				}
				else 
				{
				 	echo $this->Form->input('Lang.vi', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span10'));
				} 
			?>
		</div>
	</div>

	<?php if($image == 1) { ?>
	<?php 
		$key = trim($this->data['Lang']['key']); 
		//$check = $this->requestAction(DOMAINAD . 'admin_lang/exists_lang_key/' . $key . '-mobile');
		
		// echo $key . ' - ';
		// echo $check; 
		// pr($this->data);
	?>

	<?php /*if($check == 1) { $data_link = $this->requestAction(DOMAINAD . 'admin_lang/data_link/' . $this->data['Lang']['key'] . '-mobile');  ?>
		<div class="control-group">
			<label class="control-label">Chọn Ảnh mobile</label>
			<div class="controls">
				<?php echo $this->Form->input('Lang.' . $key . '-mobile', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6', 'id'=>"thumbnailmobile", 'value'=>$data_link));
				?>
                <input type="button" class="btn btn-info" onclick="file_manager('thumbnailmobile');" value="Chọn ảnh">
			</div>
		</div>
		<input type="hidden" name="data[Lang][image_link]" value="1" />
	<?php } ?> */ ?>
	<?php } ?>

	<?php if($image_link == 1) { ?>
	<?php 
		//$data_link = $this->requestAction(DOMAINAD . 'admin_lang/data_link/' . $this->data['Lang']['key'] . '_link'); 
	?>
		<div class="control-group">
			<label class="control-label">Chọn link</label>
			<div class="controls">
				<?php echo $this->Form->input('Lang.link', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span10', 'value'=>$data_link));
				?>
			</div>
		</div>
		<input type="hidden" name="data[Lang][image_link]" value="1" />
	<?php } ?>





	<?php if($image_link_text == 1) { ?>
	<?php 
		$data_link = $this->requestAction(DOMAINAD . 'admin_lang/data_link/' . $this->data['Lang']['key'] . '_link'); 
		$data_title = $this->requestAction(DOMAINAD . 'admin_lang/data_link/' . $this->data['Lang']['key'] . '_title'); 
		$data_des = $this->requestAction(DOMAINAD . 'admin_lang/data_link/' . $this->data['Lang']['key'] . '_description'); 
	?>
		<div class="control-group">
			<label class="control-label">Chọn link</label>
			<div class="controls">
				<?php echo $this->Form->input('Lang.link', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span10', 'value'=>$data_link));
				?>
			</div>
		</div>
		<input type="hidden" name="data[Lang][image_link_text]" value="1" />


		<div class="control-group">
			<label class="control-label">Tên</label>
			<div class="controls">
				<?php echo $this->Form->input('Lang.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span10', 'value'=>$data_title));
				?>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label">Mô tả</label>
			<div class="controls">
				<?php echo $this->Form->input('Lang.des', array('type'=>'textarea','label'=>false,'div'=>false, 'class'=>'span10', 'value'=>$data_des));
				?>
			</div>
		</div>
	<?php } ?>



	<?php if($text_link == 1) { ?>
	<?php 
		$data_link = $this->requestAction('/admin/admin_lang/data_link/' . $this->data['Lang']['key'] . '_link'); 
	?>
		<div class="control-group">
			<label class="control-label">Chọn link</label>
			<div class="controls">
				<?php echo $this->Form->input('Lang.link', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span10', 'value'=>$data_link));
				?>
			</div>
		</div>
		<input type="hidden" name="data[Lang][text_link]" value="1" />
	<?php } ?>
    
    <?php if($multiple_lang == true && $category != 1 && (!isset($image_link) || $image_link == 0)) { ?>
	<div class="control-group">
		<label class="control-label">Tiếng Anh</label>
		<div class="controls">
			<?php 
				if($editor == 1) 
				{
		            $CKEditor = new CKEditor();
		            $CKEditor->config['width'] = '800';
		            $CKEditor->config['height'] = '280';
		            CKFinder::SetupCKEditor($CKEditor);

		            $initialValue = $this->data['Lang']['en'];
		            echo $CKEditor->editor("data[Lang][en]", $initialValue, "extra");
				} 
				else
				{
					echo $this->Form->input('Lang.en', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span11'));
				}
			?>
		</div>
	</div>
    
<!-- 	<div class="control-group">
		<label class="control-label">Tiếng Nhật</label>
		<div class="controls">
			<?php 
				if($editor == 1) 
				{
		            $CKEditor = new CKEditor();
		            $CKEditor->config['width'] = '800';
		            $CKEditor->config['height'] = '280';
		            CKFinder::SetupCKEditor($CKEditor);

		            $initialValue = $this->data['Lang']['jp'];
		            echo $CKEditor->editor("data[Lang][jp]", $initialValue, "extra");
				} 
				else
				{
					echo $this->Form->input('Lang.jp', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span11'));
				}
			?>
		</div>
	</div> -->
    
	<!-- <div class="control-group">
		<label class="control-label">Tiếng Trung</label>
		<div class="controls">
			<?php 
				if($editor == 1) 
				{
		            $CKEditor = new CKEditor();
		            $CKEditor->config['width'] = '800';
		            $CKEditor->config['height'] = '280';
		            CKFinder::SetupCKEditor($CKEditor);

		            $initialValue = $this->data['Lang']['cn'];
		            echo $CKEditor->editor("data[Lang][cn]", $initialValue, "extra");
				} 
				else
				{
					echo $this->Form->input('Lang.cn', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span11'));
				}
			?>
		</div>
	</div> -->
	<?php } ?>
    

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