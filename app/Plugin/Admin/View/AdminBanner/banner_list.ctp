 <form action="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_banner','action'=>'save_pos'), true); ?>" method="post" class=" form-main">

<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách hình ảnh'); ?>
<?php echo $this->Admin->admin_breadcrumb('Danh sách hình ảnh'); ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
    <a href="<?php echo DOMAINAD; ?>admin_banner/banner_add" class="btn btn-large btn btn-orange pull-right">Thêm</a>
    <a href="#" onclick="document.form.submit();" class="btn btn-large btn btn-default pull-right savepos">Lưu vị trí</a>
</div>

<?php if($multiple_lang == true) : ?>
    <div class="lang">
        <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
        <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
        <!-- <a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a> -->
        <!--<a href="<?php echo $url_here; ?>?lang=kr" <?php if($lang == 'kr') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Hàn</a>-->
    </div>
<?php endif; ?>


<div class="box box-color box-bordered">
    <div class="box-title">
        <h3><i class="icon-table"></i>Danh sách</h3>
    </div>    

	<div class="box-content nopadding">
        <div class="row-fluid" style="padding-top: 14px;">
            <div class="category-select offset2 filter-item">
                <strong class="span2 filter-label">Lọc dạng Banner</strong>
				<select id="banner_type">
					<option value=""> --- Tất cả --- </option>
					<?php foreach($banner_type as $k=>$v) : ?>
					<option value="<?php echo $k; ?>" <?php if($k==$banner_current_type) echo 'selected'; ?>><?php echo $v; ?></option>
					<?php endforeach; ?>
				</select>
            </div>
        </div>



<?php echo $this->Session->flash(); ?>
<table class="table table-hover table-nomargin dataTable table-bordered advertiseTable">
        <thead>
		<tr class="warning" style="font-weight: bold;">
			<th width="30">STT</th>
			<th width="100">Hình ảnh</th>
			<th>Tiêu đề</th>
			<th>Bộ sưu tập</th>
			<th width="50">Vị trí</th>
			<th width="200">Dạng</th>
			<th width="40" style="text-align: center;">Sửa</th>
			<th width="40" style="text-align: center;">Xóa</th>
			<th width="40" style="text-align: center;">ID</th>
		</tr>
		</thead>
		<tbody>
		<?php if($this->data) : ?>
		<?php 
			$current_page = $this->Paginator->current(); 
			$stt = 1;
			
			$showing = $this->Paginator->counter('{:current}');
			$total_pages = $this->Paginator->counter('{:pages}');
		
			$redirectPage = $current_page;
			if($current_page > 1 && $current_page == $total_pages && $showing == 1)
				$redirectPage = $current_page - 1;
		
			if($current_page != 1)	$stt = (($current_page - 1) * $limit) + 1; 
			
			foreach($this->data as $v) : 
		?>
		<tr>
			<td><?php echo $stt; $stt++; ?></td>
            <td>
                <?php if(!preg_match('/http/', $v['Banner']['image'])) : ?>
                    <img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['Banner']['image']; ?>&w=70&zc=1" />
                <?php else : ?>
                    <img src="<?php echo $v['Banner']['image']; ?>" width="70" />
                <?php endif; ?>
            </td>
			<td><?php echo $v['Banner']['title']; ?></td>
            <td>
            <?php echo isset($bosuutap_list[$v['Banner']['bosuutap_id']]) ? $bosuutap_list[$v['Banner']['bosuutap_id']] : ''; ?>
            </td>
			<td><input type="text" style="width: 20px;" name="pos[<?php echo $v['Banner']['id']; ?>]" value="<?php echo $v['Banner']['pos']; ?>" /></td>
			<td>
                <?php
                foreach($banner_type as $key=>$val)
                {
                    if($v['Banner']['type'] == $key)
                        echo $val;
                }
                ?>
			</td>
			<td style="text-align: center;">
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_banner','action'=>'banner_edit', $v['Banner']['id'])); ?>">
					<i class="icon icon-edit"></i>
				</a> 
			</td>
			<td style="text-align: center;">
				<a href="#" class="confirm-delete" goto="<?php echo DOMAINAD . 'admin_banner/banner_delete/' . $v['Banner']['id']; ?>?rp=<?php echo $redirectPage; ?>">
					<i class="icon icon-trash"></i>
				</a>
			</td>
			<td style="text-align: center;"><?php echo $v['Banner']['id']; ?></td>
		</tr>
		<?php endforeach; ?>
		</tbody>
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
    $('#banner_type').change(function() {
        var v = $(this).val();
        document.location.href = "<?php echo DOMAINAD; ?>admin_banner/banner_list/?t="+v;
    });

	$('.savepos').click(function() {
		$('form.form-main').submit();
	});
</script>