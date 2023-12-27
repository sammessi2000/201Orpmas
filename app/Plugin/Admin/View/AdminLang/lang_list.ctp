
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách'); ?>
<?php echo $this->Admin->admin_breadcrumb('Danh sách'); ?>

<?php echo $this->Session->flash(); ?>

<div class="box">
<div class="box-content">
	

<?php echo $this->Session->flash(); ?>
	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
			<td width="30">STT</td>
            <td width="120">Key</td>
			<td>Tiếng Việt</td>
			<td>Tiếng Anh</td>
			<td width="70">Thay đổi</td>
		</tr>
		<?php if($this->data) : ?>
		<?php 
			$current_page = $this->Paginator->current(); 
			$i = 1;
			if($current_page != 1)	$i = $current_page * 10; 
			foreach($this->data as $v) : 
		?>
		<tr>
                    <td><?php echo $i; $i++; ?></td>
                    <td><?php echo $v['Lang']['key']; ?></td>
                    <td><?php echo $v['Lang']['vi']; ?></td>
                    <td><?php echo $v['Lang']['en']; ?></td>
                    
                    <td>
                        <a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_lang','action'=>'lang_edit', $v['Lang']['id'])); ?>"><i class="icon icon-edit"></i></a> &nbsp; 
                    </td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>

</div>
</div>
</div>

</div>
</div>
