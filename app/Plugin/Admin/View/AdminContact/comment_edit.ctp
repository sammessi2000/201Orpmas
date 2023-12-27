<div class="navbar margin-none">
    <div class="navbar-inner radius-none">
        <a class="brand" href="#">Sửa bình luận "<?php echo $node_comment['Node']['title']; ?>"</a>
    </div>
</div>

<div class="clearfix"></div>

<div class="well bg-white radius-none">    

<span class="text-error"><h4><?php echo $this->Session->flash(); ?></h4></span>
    <form action="" method="post" class="form-horizontal">
	<div class="control-group">
		<label class="control-label">Tiêu đề</label>
		<div class="controls">
                    <?php echo $this->Form->input('Comment.title', array('type'=>'text','label'=>false,'div'=>false, 'class'=>'span6')); ?>
                    <?php echo $this->Form->hidden('Comment.id'); ?>
		</div>
	</div>

        <div class="control-group">
		<label class="control-label">Người gửi</label>
		<div class="controls">
			<?php echo $this->Form->input('Comment.fullname', array('type'=>'text','label'=>false,'div'=>false)); ?>
		</div>
	</div>

	<div class="control-group">
		<label class="control-label">Nội dung</label>
		<div class="controls">
			<?php echo $this->Form->input('Comment.content', array('type'=>'textarea','label'=>false,'div'=>false,'required'=>'required', 'class'=>'span7')); ?>
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