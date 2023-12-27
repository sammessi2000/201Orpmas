<form action="" method="post" class="form-horizontal form-main">
<div id="main">
<div class="container-fluid">
<?php echo $this->Admin->admin_head('Danh sách đơn hàng'); ?>
<?php echo $this->Admin->admin_breadcrumb('Danh sách đơn hàng'); ?>

<?php if($multiple_lang == true) : ?>
    <div class="lang">
        <a href="<?php echo $url_here; ?>?lang=vi" <?php if($lang == 'vi') echo 'class="active"'; ?>><i class="icon icon-vi"></i> Tiếng Việt</a>
        <a href="<?php echo $url_here; ?>?lang=en" <?php if($lang == 'en') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Anh</a>
        <!--<a href="<?php echo $url_here; ?>?lang=jp" <?php if($lang == 'jp') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Nhật</a>-->
        <!-- <a href="<?php echo $url_here; ?>?lang=cn" <?php if($lang == 'cn') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Trung</a> -->
        <!--<a href="<?php echo $url_here; ?>?lang=kr" <?php if($lang == 'kr') echo 'class="active"'; ?>><i class="icon icon-en"></i> Tiếng Hàn</a>-->
    </div>
<?php endif; ?>

<div style="margin:10px 0 10px;" class="row-fluid">
    <?php echo $this->Session->flash(); ?>
	
    <a href="<?php echo DOMAINAD; ?>admin_cart/cart_list/all" class="btn btn-large btn btn-orange pull-right">
		Tất cả
	</a>
</div>

<div class="box">
<div class="box-content">

<?php echo $this->Session->flash(); ?>
	<table class="table table-bordered table-hover">
		<tr class="warning" style="font-weight: bold;">
			<td width="30">STT</td>
			<td width="30">ID</td>
			<td width="80">Ảnh</td>
			<!-- <td width="60">Xưng hô</td> -->
			<td width="140">Người đặt</td>
			<!-- <td width="140">Người nhận</td> -->
			<td>Tên SP</td>
			<td>Nội dung</td>
			<!-- <td width="140">Vận chuyển</td> -->
			<!-- <td width="140">Thanh toán</td> -->
			<!-- <td>Quy cách</td> -->
			<!-- <td width="40">Mã SP</td> -->
			<!-- <td width="40">Size</td> -->
			<!-- <td>Nguồn</td> -->
			<!-- <td width="80">Loại</td> -->
			<!-- <td width="80">Thời gian</td> -->
			<td width="40">S.lượng</td>
			<td width="70">Giá</td>
			<td width="70">Tổng</td>
			<td width="70">Ngày</td>
			<td width="40">Xong</td>
			<td width="40">Note</td>
			<td width="40">Xóa</td>
		</tr>
		<?php if($this->data) : ?>
		<?php $i = 1; $total = 0; ?>
		<?php foreach($this->data as $v) : ?>
		<tr>
			<td><?php echo $i; $i++; ?></td>
			<td><?php echo $v['Order']['id']; ?></td>
			<td><img src="<?php echo DOMAIN.$v['Order']['image']; ?>" width="80" /></td>
			<!-- <td><?php echo $v['Customer']['anhchi']; ?></td> -->
			<td>
				<a href="<?php echo DOMAINAD; ?>admin_cart/cart_list/?uid=<?php echo $v['Customer']['id']; ?>">
				<?php echo $v['Customer']['fullname']; ?>
				</a>
				<br />
				DT: <?php echo $v['Customer']['phone']; ?>
				<br />
				Đ/c: <?php echo $v['Customer']['address']; ?>
				<br />
				<br />


				<?php if($v['Order']['fullname_nhan'] != '') { ?> 
				<strong>Người nhận</strong>
				<br />
				Tên: <?php echo $v['Order']['fullname_nhan']; ?>
				<br />
				ĐT: <?php echo $v['Order']['phone_nhan']; ?>
				<br />
				Đ/c: <?php echo $v['Order']['address_nhan']; ?>
				<?php } ?>
			</td>
			<!-- <td>
				<?php echo $v['Order']['fullname_nhan']; ?>
				<br />
				<?php echo $v['Order']['phone_nhan']; ?>
			</td> -->
			<td><?php echo $v['Order']['title']; ?></td>
			<td><?php echo $v['Order']['content']; ?></td>
			<!-- <td>
				<?php 
					switch ($v['Order']['codegg']) {
						case 1:
							echo 'Liên hệ để biết chi tiết';
							break;
						case 2:
							echo 'Phí vận chuyển ngoại thành';
							break;
						default:
							# code...
							break;
					}
				?>
			</td> -->
			<!-- <td>
				<?php 
					switch ($v['Order']['thanhtoan']) {
						case 0:
							echo 'Thu tiền tại nhà';
							break;
						
						case 1:
							echo 'Alepay';
							break;
						case 2:
							echo 'Chuyển khoản ngân hàng';
							break;
						default:
							# code...
							break;
					}
				?>
			</td> -->
			<!-- <td><?php echo $v['Order']['extra']; ?></td> -->
			<!-- <td><?php echo $v['Order']['code']; ?></td> -->
			<!-- <td><?php echo $v['Order']['size']; ?></td> -->
			<!-- <td><?php //echo $v['Order']['referer_source']; ?></td> -->
			<!-- <td><?php echo $v['Order']['thanhtoan'] == 0 ? 'COD' : 'Trực tiếp'; ?></td> -->
			<!-- <td><?php echo $v['Order']['thoigian']; ?></td> -->
			<td><?php echo $v['Order']['quanity']; ?></td>
			<td><?php echo number_format($v['Order']['price']); ?></td>
			<td><?php $tong = $v['Order']['price'] * $v['Order']['quanity']; echo number_format($tong); ?></td>
			<td><?php echo date('d-m-Y', strtotime($v['Order']['created'])); ?></td>
			<td>
				<?php if($v['Order']['status'] == 0) : ?>
				<a href="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_cart','action'=>'cart_done', $v['Order']['id'])); ?>"><i class="icon icon-chevron-down" title="Xong"></i></a> &nbsp; 
				<?php endif; ?>
			</td>
			<td>
                <a href="<?php echo DOMAINAD; ?>admin_cart/cart_edit/<?php echo $v['Order']['id']; ?>" class=""><i class="icon icon-edit"></i></a>
			</td>
			<td>
                <a href="#" class="confirm-delete" goto="<?php echo Router::url(array('plugin'=>'admin','controller'=>'admin_cart','action'=>'cart_delete', $v['Order']['id'])); ?>"><i class="icon icon-trash"></i></a>
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
</form>


<script>
	$('#left').addClass('toogle-menu-hide');
	$('#main').addClass('toogle-menu-hide');
</script>