<div id="body_content">
    <div class="page_path">
        <div id="breadcrumb" class="block-breadcrumb-mb">
            <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo DOMAIN; ?>">
                        <span itemprop="name">Trang chủ</span>
                    </a> 
                    <i class="fa fa-angle-right"></i>
                    <meta itemprop="position" content="1">
                </li>
                
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo DOMAIN; ?>/cart/list">
                        <span itemprop="name">Giỏ hàng</span>
                    </a> 
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>
    </div>

    <div class="clear_fix">
        <div id="cart_page" style="padding: 10px;">
            <div style="font-weight:bold;font-family:Tahoma; font-size:15px; margin-bottom: 15px;">
            <?php echo $this->App->t_a('mycart'); ?>
            </div>
        
            <form method="post" enctype="multipart/form-data" action="<?php echo DOMAIN; ?>cart/payment" onsubmit="return check_field()">
                <table id="table-shopping-cart" cellpadding="5" border="1" bordercolor="#CCCCCC" width="100%">
                    <tbody>
                        <tr id="shopping-cart-first-row">
                            <td>Sản phẩm</td>
                            <td id="shopping-cart-price-col">Giá bán</td>
                            <td id="shopping-cart-quantity-col">Số lượng</td>
                            <td id="shopping-cart-sum-col">Thành tiền</td>
                            <td id="shopping-cart-del-col">Xóa</td>
                        </tr>
                
                        <?php $tong = 0; foreach($this->data as $k=>$v) { ?>
                        <tr class="itemCart js-item-row" data-variant_id="0" data-item_id="1417" data-item_type="product">
                            <td> 
                                <img src="<?php echo DOMAIN . $v['image']; ?>" class="" />
                                <br />
                                <a href="#" onclick="return false;" class="name-item-cart">
                                    <b><?php echo $v['title']; ?></b>
                                </a>
                            </td>

                            <td>
                                <span><?php echo number_format($v['price']); ?>đ</span>
                            </td>
                            <td width="110px" class="cart-quantity quantity">
                                <a class="btn btn-xs btn-flat btn-cart-quantity quantity-button quantity-down">-</a>
                                <input type="text" name="" class="quantity-cart-header qty tr_id_<?php echo $v['id']; ?>" value="<?php echo $v['quantity']; ?>" step="1" min="1" max="10000" />
                                <a class="btn btn-xs btn-flat btn-cart-quantity quantity-button quantity-up">+</a>
                            </td>
                            <?php 
                                $num = $v['price'] * $v['quantity'];
                                $tong = $tong + $num;
                                
                            ?> 
                            <td>
                                <span class="itemCart-price total-item-price">
                                    <?php echo number_format($num); ?>
                                </span>đ
                            </td>
                            <td style="width: 20px;">
                                <a href="<?php echo DOMAIN; ?>cart/delete/<?php echo $v['id']; ?>" class="delete-from-cart">
                                    <i class="fa fa-trash font30"></i>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="3" align="right">Tổng giá trị : </td>
                            <td colspan="3" class="red">
                                <b><span id="total-cart-price" style="color: #ff001c;"><?php echo number_format($tong); ?></span>đ</b>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div class="b_shop chudam">
                    <input type="button" onclick="location.href='<?php echo DOMAIN; ?>';" value="Tiếp tục mua hàng" style="cursor:pointer;" />
                </div>

                <div class="spacer"></div>
                
                <br />
                <br />

                <div id="cart-form">
                    <h4><?php echo $this->App->t_a('thongtin_tt'); ?></h4>
                    <p>
                        <label>Họ và tên*</label>
                        <input type="text" name="fullname" id="buyer_name" required="required" value="" placeholder="Họ tên người nhận hàng">
                    </p>

                    <p>
                        <label>Số điện thoại *</label>
                        <input type="text" name="phone" id="buyer_tel" required="required" value="" placeholder="Dùng để liên lạc khi giao hàng">
                    </p>

                    <p>
                        <label>Email</label>
                        <input type="text" name="email" id="buyer_email" value="" placeholder="Để nhận thông báo đơn hàng">
                    </p>

                    <div class="ship-info" id="address-info">
                        <p>
                            <label>Địa chỉ*</label>
                            <input type="text" name="address" id="buyer_address" required="required" value="" placeholder="Địa chỉ nhận hàng">
                        </p>
                    </div>

                    <p>
                        <label>Ghi chú</label>
                        <textarea name="content" id="buyer_note" placeholder="Ghi chú khách hàng"></textarea>
                    </p>

                    <br>

                    <input type="submit" value="Gửi đơn hàng >>" style="cursor:pointer; height:30px;">
                </div>
            </form>
            <div class="clear_fix"></div>
        </div>
    </div>
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