<div class="wrap">
    <div class="container-fluid main-content">
        <div class="row ">
            <?php /* 	?>
            <div class="col-md-3 col-sm-3 hidden-xs">
                <?php echo View::element('sidebar'); ?>
            </div> */ ?>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="contact-info">
                    <div class="news-list-title">
                        <h1><?php echo $this->App->t('company_name'); ?></h1>
                    </div>
                    <p><strong>Địa chỉ:</strong> <?php echo $this->App->t_a('company_address'); ?></p>
                    <p><strong>Điện thoại:</strong> <?php echo $this->App->t_a('company_hotline'); ?></p>
                    <p><strong>Email:</strong> <span style="color: #e56d8e;"><?php echo $this->App->t_a('company_email'); ?></span></p>
                </div>

                <?php if (isset($error)) : ?>
                    <div class="cart-error">
                        <?php echo $error; ?>
                    </div>
                <?php else : ?>

                    <div class="row-fluid">
                        <form class="form-horizontal form-cart" method="post" action="<?php echo DOMAIN; ?>cart/payment" method="post">
                            <p class="frm-contact-title">Quý khách vui lòng điền thông tin bên dưới</p>

                            <div class="control-group">
                                <label class="control-label">Họ và Tên <span class="text-error">*</span></label>
                                <div class="controls">
                                    <input type="text" name="fullname" id="name" required="required" class="form-control" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Địa chỉ <span class="text-error">*</span></label>
                                <div class="controls">
                                    <input type="text" name="address" id="address" required="required" class="form-control" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Điện thoại <span class="text-error">*</span></label>
                                <div class="controls">
                                    <input type="text" name="phone" id="phone" required="required" class="form-control" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Email <span class="text-error">*</span></label>
                                <div class="controls">
                                    <input type="text" name="email" required="required" class="form-control" />
                                </div>
                            </div>

                            <div class="control-group">
                                <label class="control-label">Nội dung</label>
                                <div class="controls">
                                    <textarea name="content" class="form-control"></textarea>
                                </div>
                            </div>

                            <div class="cart-title">Sản phẩm đặt mua</div>

                            <div class="table table-bordered table-hovered">
                                <?php /* 	?>
							<tr style="font-weight: bold; background: #f6f6f6; text-align: center;">
								<td colspan="2">Thông tin sản phẩm</td>
								<td>Số lượng</td>
								<td width="90">Đơn giá</td>
								<td width="90">Thành tiền</td>
								<td width="20">&nbsp;</td>
							</tr> */ ?>
                                <?php $tong = 0;
                                foreach ($this->data as $k => $v) : ?>
                                    <div class="tr_id itemCart js-item-row" rel="<?php echo $v['id']; ?>" data-price="<?php echo $v['price']; ?>">
                                        <div class="d-flex">
                                            <div width="80"><img src="<?php echo DOMAIN; ?>timthumb.php?src=<?php echo DOMAIN . $v['image']; ?>&w=75&h=100&zc=1&q=100" /></div>
                                        </div>
                                        <div class="pro-order-infor" style="padding-left: 8px;">
                                            <div style="max-width: 200px;"><?php echo $v['title']; ?></div>
                                            <div style="color: #de3168;"><?php echo number_format($v['price']); ?> VNĐ</div>
                                            <div>
                                                <?php /* 	?>
                                                <div style="min-width: 100px;" class="cart-quantity quantity">
                                                    <span class=" quantity-down">-</span>
                                                    <input type="text" name="" class="quantity-cart-header qty tr_id_<?php echo $v['id']; ?>" value="<?php echo $v['quantity']; ?>" step="1" min="1" max="10000" />
                                                    <span class=" quantity-up">+</span>
                                                </div> */ ?>
                                                <div class="sl-dtproduct quantity">
                                                    <div class="quantity-button quantity-down" data-product-id="<?php echo $v['id']; ?>">
                                                        -
                                                    </div>
                                                    <input type="number" name="quantity" class="quantity-cart-header qty tr_id_<?php echo $v['id']; ?>" id="sl-add-cart" data-product-id="<?php echo $v['id']; ?>" value="<?php echo $v['quantity']; ?>" step="1" min="1" max="10000">
                                                    <div class="quantity-button quantity-up" data-product-id="<?php echo $v['id']; ?>">
                                                        +
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div style="color: #de3168;" class="">
                                            <?php
                                            $num = $v['price'] * $v['quantity'];
                                            $tong = $tong + $num;
                                            ?>
                                            <div class="cart-delete"><a href="<?php echo DOMAIN ?>cart/delete/<?php echo $k; ?>"><img src="<?php echo DOMAIN . 'theme/linhchi/img/delete.svg' ?>" alt="" width="18"></a></div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <div class="d-flex" style="font-weight: bold; margin-top: 15px; font-size: 16px;  padding: 5px ;">
                                    <div colspan="4" style="text-align: right;">Tổng cộng : &nbsp;</div>
                                    <div colspan="2" style="color: #de3168; font-size: 14px; font-weight: bold;" id="total-cart-price"><?php echo number_format($tong); ?> VNĐ</div>
                                    <input type="hidden" name="cart_sum" value="<?php echo $tong ?>" class="">
                                </div>
                            </div>
                            <button class="btn btn-danger" name="submit">Gửi đơn hàng</button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(() => {
        $('.form-cart').submit(function() {
            var mobile = $('#phone').val();
            var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;

            if (mobile !== '') {
                if (vnf_regex.test(mobile) == false) {
                    alert('Số điện thoại của bạn không đúng định dạng!');
                    return false;
                } else {
                    // alert('Số điện thoại của bạn hợp lệ!');
                }
            } else {
                alert('Bạn chưa điền số điện thoại!');
                return false;
            }

            if (!isnull($('#name'))) {
                alert('Vui lòng nhập tên !')
                return false
            }
            if (!isnull($('#address'))) {
                alert('Vui lòng nhập địa chỉ !')
                return false
            }

        })
    })



    $('.update_cart').click(function() {
        // var cart_arr = new Array();
        var str = '?data=';
        $('.update_field').each(function() {
            var v = $(this).val();
            var k = $(this).attr('name');
            if (v != '' && k != '')
                str = str + ';' + k + '.' + v;
        });

        document.location.href = "<?php echo DOMAIN; ?>cart/update/" + str;
        return false;
    });

    var is_sending = false;

    function update_cart() {
        if (is_sending == true) return;
        var str = '';
        var total = 0;

        $('.tr_id').each(function() {
            var id = $(this).attr('rel');
            var v = $('.tr_id_' + id).val();
            str = str + id + '.' + v + ';';

            var price = $(this).attr('data-price');
            price = parseInt(price);

            // $(this).find('.itemCart-price').text(price * v);
            // $(this).find('.itemCart-price').number(true, 0);


            total = total + price * v;
        });

        // var total_format = formatMoney(total)


        $('#total-cart-price').text(total + 'VNĐ');
        $('#total-cart-price').number(true, 0);
        $('input[name="cart_sum"]').val(total);
        $('#total-cart-price').text($('#total-cart-price').text() + 'VNĐ');


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
    }

    jQuery('.quantity').each(function() {
        var spinner = jQuery(this),
            input = spinner.find('input.qty'),
            btnUp = spinner.find('.quantity-up'),
            btnDown = spinner.find('.quantity-down'),
            min = input.attr('min'),
            max = input.attr('max');

        console.log('min');
        console.log(min);
        console.log('max');
        console.log(max);

        btnUp.click(function() {
            var oldValue = parseInt(input.val());
            console.log('oldValue');
            console.log(oldValue);
            if (oldValue >= max) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue + 1;
                console.log('else');
            }
            console.log('newVal');
            console.log(newVal);
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
            update_cart();
        });
        btnDown.click(function() {
            var oldValue = parseInt(input.val());
            console.log(oldValue);
            if (oldValue <= min) {
                var newVal = oldValue;
            } else {
                var newVal = oldValue - 1;
            }
            console.log(newVal);
            spinner.find("input").val(newVal);
            spinner.find("input").trigger("change");
            update_cart();
        });
    });
</script>