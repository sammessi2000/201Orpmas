<div class="container">
	<div id="breadcrumb">
		<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
			<a href="<?php echo DOMAIN; ?>" itemprop="url" class="nopad-l">
			<span itemprop="title">Trang chủ</span>
			</a>
		</div>
		<div itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
			&nbsp;/&nbsp;<a href="<?php echo DOMAIN; ?>/cart/list" itemprop="url">
			<span itemprop="title"><?php echo $this->App->t('mycart'); ?></span>
			</a>
		</div>
	</div>

  	<div class="clear"></div>

	<?php if(count($this->data) > 0) { ?>
  	<h1 style="font-size:18px; display:inline; font-weight:500;"><?php echo $this->App->t_a('mycart'); ?></h1>
  	<a href="<?php echo DOMAIN; ?>" class="btn" style="background: #24aa98;color: #fff;font-size: 15px;padding: 5px 10px;border-radius: 3px;-moz-border-radius: 3px;margin-left: 10px;"><?php echo $this->App->t_a('continueshopping'); ?></a>
  
  	<div class="space20"></div>

	<div id="cart-page">
		<form method="post" enctype="multipart/form-data" action="<?php echo DOMAIN; ?>cart/payment">
			<div class="cart-left">
				<div class="clearfix"></div>
				<table class="tbl-cart">
					<tbody>
						<?php $tong = 0; foreach($this->data as $k=>$v) { ?>
						<tr class="tr_id itemCart js-item-row" rel="<?php echo $v['id']; ?>">
							<td style="width:100px;">
								<img src="<?php echo DOMAIN . $v['image']; ?>" class="loading">
							</td> 

							<td style="border-right:solid 1px #eee; padding-right:15px;">
								<a href="#" onclick="return false;" class="name-item-cart">
									<b><?php echo $v['title']; ?></b>
								</a>
							</td>

							<td style="width:210px;">
								<div class="cart-price">
									<span class="red" style="font-size:16px;">
										<?php echo number_format($v['price']); ?>đ
									</span>
								</div>

								<div class="space10"></div>

								<?php 
									$num = $v['price'] * $v['quantity'];
									$tong = $tong + $num;
									
								?> 
								<div class="cart-total"><b>Tổng :
									<span class="itemCart-price total-item-price">
										<?php echo number_format($num); ?>
									</span>đ
								</div>
							</td>

							<td width="110px" class="cart-quantity quantity">
								<a class="btn btn-xs btn-flat btn-cart-quantity quantity-button quantity-down">-</a>
								<input type="text" name="" class="quantity-cart-header qty tr_id_<?php echo $v['id']; ?>" value="<?php echo $v['quantity']; ?>" step="1" min="1" max="10000" />
								<a class="btn btn-xs btn-flat btn-cart-quantity quantity-button quantity-up">+</a>
							</td>

							<td width="45px"> 
								<a href="<?php echo DOMAIN; ?>cart/delete/<?php echo $v['id']; ?>" class="delete-from-cart">
									<i class="fa fa-trash font30"></i>
								</a>
							</td>
						</tr>
						<?php } ?>

						<tr class="itemCart" style="border-bottom:none;">
							<td colspan="2" align="right" style="vertical-align:middle; font-size:15px;">Tổng giá trị đơn hàng: </td>
							<td colspan="3" class="red">
								<span id="total-cart-price" style="color: #e00; font-size:20px;">
									<?php echo number_format($tong); ?>
								</span>đ
							</td>
						</tr>
					</tbody>
				</table>

				<div class="nd thanhtoan"></div>
			</div>

			<div class="cart-right">
				<div class="title"><?php echo $this->App->t_a('thongtin_tt'); ?></div>
				<p><?php echo $this->App->t_a('cartdes'); ?></p>
				<p>
					<label>Họ và tên*</label>
					<input type="text" name="fullname" id="buyer_name" value="" required="required" placeholder="Họ tên người nhận hàng">
				</p>
				<p>
					<label>Số điện thoại *</label>
					<input type="text" name="phone" id="buyer_tel" value="" required="required" placeholder="Dùng để liên lạc khi giao hàng">
				</p>
				<p>
					<label>Email:</label>
					<input type="text" name="email" id="buyer_email" value="" placeholder="Để nhận thông báo đơn hàng">
				</p>
				<div class="ship-info" id="address-info">
					<p>
					<label>Địa chỉ*</label>
					<input type="text" name="address" id="buyer_address" required="required" value="" placeholder="Địa chỉ nhận hàng">
					</p>
				</div><!--address-->
				
				<p>
					<label>Ghi chú</label>
					<textarea name="content" id="buyer_note" placeholder="Ghi chú khách hàng"></textarea>
				</p>
				
				<div class="btn-buy-order">
					<input type="submit" id="btn-submit" value="Đặt hàng" class="submit">
					<span><?php echo $this->App->t_a('cartterm'); ?></span>
				</div>
			</div><!--cart-right-->
			</form>
    		<div class="space20"></div>
		</div><!--cart-page-->
		<?php } else { ?>
			<div style="margin-bottom: 50px; font-weight: bold; text-align: center;">
				<p><?php echo $this->App->t_a('cart-empty', 'editor'); ?></p>
			</div>
		<?php } ?>
</div>


<script type="text/javascript">
	var is_sending = false;

    function update_cart()
    {
		if(is_sending == true) return;

        var str = '';

        $('.tr_id').each(function() {
            var id = $(this).attr('rel');
            var v = $('.tr_id_' + id).val();
            str = str + id + '.' + v + ';';
			tr_id_311
        });

		var uri = "<?php echo DOMAIN; ?>cart/update/?data=" + str + "&ajx=1";
		is_sending = true;

		$.ajax({
			url: uri,
			type: 'get',
			dataType: 'html',
			success: function(d) {
				console.log(d);
				is_sending = false;
			},
			error: function(err) {
				console.log(err);
				is_sending = false;
			}
		});

		is_sending = false;
        // document.location.href = "<?php echo DOMAIN; ?>cart/update/?data=" + str;
    }

	jQuery('.quantity').each(function() {
		var spinner = jQuery(this),
		input = spinner.find('input.qty'),
		btnUp = spinner.find('.quantity-up'),
		btnDown = spinner.find('.quantity-down'),
		min = input.attr('min'),
		max = input.attr('max');
		btnUp.click(function() {
			var oldValue = parseInt(input.val());
			if (oldValue >= max) {
				var newVal = oldValue;
			} else {
				var newVal = oldValue + 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
			update_cart();
		});

		btnDown.click(function() {
			var oldValue = parseInt(input.val());
			if (oldValue <= min) {
				var newVal = oldValue;
			} else {
				var newVal = oldValue - 1;
			}
			spinner.find("input").val(newVal);
			spinner.find("input").trigger("change");
			update_cart();
		});
	});
</script>