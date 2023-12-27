 <form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_hangxe','action'=>'save_pos'), true); ?>" method="post">
 <div class="navbar margin-none">
    <div class="navbar-inner radius-none">
	    <a class="brand" href="#">Danh sách</a>
	    <ul class="nav pull-right">
	        <li>
	            <a href="<?php echo DOMAINAD . 'admin_bosuutap/bosuutap_add'; ?>">
					<input type="button" name="add" class="btn btn-primary" value="Thêm mới" />
				</a>
	        </li>
	    </ul>
    </div>
</div>
	
<div class="well bg-white radius-none">
<?php echo $this->Session->flash(); ?>
	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
                    <td width="30">STT</td>
                    <td width="120">Ảnh</td>
                    <td>Tên</td>
                    <td width="70">Home</td>
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
			<td>
				<?php if($v['Bosuutap']['image'] != '') { ?>
				<img src="<?php echo DOMAIN . $v['Bosuutap']['image']; ?>" style="height: 70px;" />
				<?php } ?>
			</td>
			<td><?php echo $v['Bosuutap']['title']; ?></td>

   			<td style="text-align: center;">
                <a href="<?php echo DOMAINAD; ?>admin_bosuutap/update_field/home/<?php echo $v['Bosuutap']['id'] ?>">
                    <?php if($v['Bosuutap']['home'] == 1) : ?>
                        <i class="icon icon-ok"></i>
                    <?php else : ?>
                        <i class="icon icon-pause"></i>
                    <?php endif; ?>
                </a>
            </td> 
			<td>
				<a href="<?php echo DOMAINAD . 'admin_bosuutap/bosuutap_edit/' . $v['Bosuutap']['id']; ?>">
					<i class="icon icon-edit"></i>
				</a> 
				&nbsp; 
				<a  class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_bosuutap/bosuutap_delete/' . $v['Bosuutap']['id']; ?>">
					<i class="icon icon-trash"></i>
				</a>
			</td>
		</tr>
		<?php endforeach; ?>
		<?php endif; ?>
	</table>

	<div class="pagination">
		<?php echo $this->Paginator->first('<< Đầu'); ?>	
		<?php echo $this->Paginator->numbers(array('separator'=>'')); ?>	
		<?php echo $this->Paginator->last('Cuối >>'); ?>	
	</div>
	
</form>
</div>


<script type="text/javascript">
    $('#tag_type').change(function() {
        var v = $(this).val();
        document.location.href = "<?php echo DOMAINAD; ?>admin_hangxe/tag_list/?t="+v;
    });
</script>