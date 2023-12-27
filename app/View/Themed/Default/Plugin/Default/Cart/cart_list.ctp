<?php $bread_array = $this->App->breadarray($current_category); ?>
<div class="bannercatpro-vt1">
    <div class="container">
        <div>
            <a href="<?php echo $this->App->t('cart_text_1_link'); ?>">
                <img src="<?php echo DOMAIN . $this->App->t('cart_text_1'); ?>">
            </a>
            <?php echo $this->App->adm_link('lang', 'cart_text_1', 'image_link'); ?>
        </div>
    </div>
</div>

<div class="main-index product-list">
    <div class="container">
        <div class="line-breacrumb">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <?php foreach ($bread_array as $v) { ?>
                            <?php if (empty($v['title'])) {     ?>
                                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a></li>
                            <?php } else {     ?>
                                <li class="breadcrumb-item"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                            <?php }     ?>

                        <?php } ?>
                        <li class="breadcrumb-item"> <a href="#">Giỏ hàng</a></li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="box-home-pro pcatpro">
            <div class="row m-0">
                <div class="col p-0">

                    <div class="tt-page-ctt cart-paget-title san-bold text-uppercase tt-pctsp"><?php echo $this->App->t('ttdh'); ?><?php echo $this->App->adm_link('lang', 'ttdh'); ?></div>
                    <div class="line-calendar">
                    </div>

                    <div class="box-ttvff box-taitro">

                        <?php if ($cart_number <= 0) { ?>

                            <?php echo $this->App->t_a('cart_empty'); ?>

                        <?php } else { ?>
                            <form action="<?php echo DOMAIN; ?>cart/payment" method="post" class="frm-tttk form-cart">
                                <div class="row">
                                    <div class="col-sm-9">
                                        <div class="table-responsive">

                                            <table class="uk-margin-remove uk-table uk-table-hover table table-bordered" cellspacing="1">
                                                <thead>
                                                    <tr>
                                                        <th>Hình ảnh</th>
                                                        <th>Tên sản phẩm</th>
                                                        <th width="150">Số lượng</th>
                                                        <th width="120">Đơn giá </th>
                                                        <th width="120">Tổng cộng</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $tong = 0;
                                                    foreach ($this->data as $k => $v) { ?>
                                                        <tr class="tr_id" rel="<?php echo $v['id']; ?>" data-price="<?php echo $v['price']; ?>">
                                                            <td>
                                                                <div class="img">
                                                                    <img src="<?php echo DOMAIN . $v['image']; ?>" style="height: 70px;" />
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <?php echo $v['title']; ?>

                                                                <div class="clearfix"></div>

                                                                <div class="cart-delete">
                                                                    <a href="<?php echo DOMAIN; ?>cart/delete/<?php echo $v['id']; ?>"><span class="fa fa-trash"></span> Xóa</a>
                                                                </div>
                                                            </td>
                                                            <td class="uk-text-center">
                                                                <div class="sl-dtproduct quantity">
                                                                    <div class="quantity-button quantity-down" data-product-id="<?php echo $v['id']; ?>">
                                                                        -
                                                                    </div>
                                                                    <input type="number" name="quantity" class="tr_id_<?php echo $v['id'] ?>" id="sl-add-cart" data-product-id="<?php echo $v['id']; ?>" value="<?php echo $v['quantity']; ?>" step="1" min="1" max="10000">
                                                                    <div class="quantity-button quantity-up" data-product-id="<?php echo $v['id']; ?>">
                                                                        +
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="uk-text-center uk-price "><?php echo number_format($v['price']); ?> ₫</td>
                                                            <td class="uk-text-center uk-price itemCart-price">
                                                                <?php
                                                                $num = $v['price'] * $v['quantity'];
                                                                $tong = $tong + $num;
                                                                echo number_format($num);
                                                                ?>
                                                                ₫
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                    <tr>
                                                        <td colspan="3"></td>
                                                        <td class="text-uppercase">Tổng tiền</td>
                                                        <td><span class="tonggiohang" id="total-cart-price"><span><?php echo number_format($tong); ?></span> ₫</span>
                                                            <input type="hidden" name="cart_sum" value="<?php echo $tong ?>">
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    if ($this->Session->check('coupon_price')) {
                                                        $coupon_price = $this->Session->read('coupon_price');
                                                        $tong = $tong - $coupon_price;
                                                    ?>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td class="">Giảm giá</td>
                                                            <td><span class="uk-price giamgia"><span><?php echo number_format($coupon_price); ?></span> ₫</span></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3"></td>
                                                            <td class="text-uppercase">Thành tiền</td>
                                                            <td><span class="uk-price thanhtien"><span><?php echo number_format($tong); ?></span> ₫</span></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>


                                        <div class="form-cus">
                                            <div class="title">
                                                <?php echo $this->App->t('cart_text_4'); ?><?php echo $this->App->adm_link('lang', 'cart_text_4'); ?>
                                            </div>
                                            <div class="frm-tttk">
                                                <div class="uk-grid-medium" uk-grid>
                                                    <div class="uk-width-1-3@m">
                                                        <div>
                                                            <label for="name"><?php echo $this->App->t('fullname'); ?><?php echo $this->App->adm_link('lang', 'fullname'); ?> <span>*</span></label>
                                                            <input type="text" name="fullname" id="name" class="uk-input" value="" placeholder="" required="required" />
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-3@m">
                                                        <div>
                                                            <label for="email">Email <span>*</span></label>
                                                            <input type="email" name="email" id="email" class="uk-input" value="" placeholder="" required="required" />
                                                        </div>
                                                    </div>
                                                    <div class="uk-width-1-3@m">
                                                        <div>
                                                            <label for="phone"><?php echo $this->App->t('phone'); ?><?php echo $this->App->adm_link('lang', 'phone'); ?> <span>*</span></label>
                                                            <input type="number" name="phone" id="phone" class="uk-input" value="" placeholder="" required="required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="uk-grid-medium uk-margin-remove-top" uk-grid>
                                                    <div class="uk-width-2-3@m">
                                                        <div>
                                                            <label for="address"><?php echo $this->App->t('address'); ?><?php echo $this->App->adm_link('lang', 'address'); ?> <span>*</span></label>
                                                            <input type="text" name="address" id="address" class="uk-input" value="" placeholder="" required="required" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div>
                                                    <label for="tg-note"><?php echo $this->App->t('ghichudh'); ?><?php echo $this->App->adm_link('lang', 'ghichudh'); ?></label>
                                                    <textarea class="uk-input" name="content"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="uk-margin-medium-top text-right form-cart-sbm" style="margin-top: 10px;">
                                            <button type="submit" name="" class="uk-button uk-button-primary btn-xndh btn-muahangback pull-left" onclick="window.history.go(-1); return false;"><?php echo $this->App->t('cart_text_2'); ?>
                                                <?php echo $this->App->adm_link('lang', 'cart_text_2'); ?>
                                            </button>
                                            <button type="submit" name="" class="uk-button uk-button-primary btn-xndh"><?php echo $this->App->t('cart_text_3'); ?>
                                                <?php echo $this->App->adm_link('lang', 'cart_text_3'); ?>
                                            </button>
                                        </div>


                                    </div>

                                    <div class="col-sm-3">
                                        <div><?php echo $this->App->t_a('cart_text_5'); ?></div>
                                        <div class="magiamgia uk-text-center">
                                            <label class="uk-margin-small-right"><?php echo $this->App->t('cart_text_6'); ?><?php echo $this->App->adm_link('lang', 'cart_text_6'); ?></label>
                                            <div class="group-btn">
                                                <input type="text" name="coupon" class="uk-input input_coupon" value="<?php echo $this->Session->check('coupon') ? $this->Session->read('coupon') : ''; ?>">
                                                <span class="uk-button uk-button-primary apdung-coupon apdung"><?php echo $this->App->t('cart_text_7'); ?><?php echo $this->App->adm_link('lang', 'cart_text_7'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        <?php } ?>
                    </div>
                </div>
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


    $('.apdung-coupon').click(function() {
        var code = $('input[name=code]').val();
        // alert(code); return;
        if (code != '') {
            var link = "<?php echo DOMAIN; ?>cart/list?coupon=" + code;
            document.location.href = link;
        }
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        // change input number
        jQuery('.quantity').each(function() {
            var product_id = $(this).attr('data-product-id');
            var spinner = jQuery(this),
                input = spinner.find('input[type="number"]'),
                btnUp = spinner.find('.quantity-up'),
                btnDown = spinner.find('.quantity-down'),
                min = input.attr('min'),
                max = input.attr('max');
            btnUp.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue >= max) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue + 1;
                }
                spinner.find("input[name=quantity]").val(newVal);
                spinner.find("input[name=quantity]").trigger("change");

                var product_id = $(this).attr('data-product-id');
                var param = product_id + '.' + newVal;
                update_cart();
            });
            btnDown.click(function() {
                var oldValue = parseFloat(input.val());
                if (oldValue <= min) {
                    var newVal = oldValue;
                } else {
                    var newVal = oldValue - 1;
                }
                spinner.find("input[name=quantity]").val(newVal);
                spinner.find("input[name=quantity]").trigger("change");

                var product_id = $(this).attr('data-product-id');
                var param = product_id + '.' + newVal;
                update_cart();
            });
        });
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

            $(this).find('.itemCart-price').text(price * v);
            $(this).find('.itemCart-price').number(true, 0);
            $(this).find('.itemCart-price').text($(this).find('.itemCart-price').text() + '₫');


            total = total + price * v;
        });

        // var total_format = formatMoney(total)


        $('#total-cart-price').text(total);
        $('#total-cart-price').number(true, 0);
        $('input[name="cart_sum"]').val(total);
        $('#total-cart-price').text($('#total-cart-price').text() + '₫');


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

    function calculate() {
        var tonggiohang = $('.tonggiohang span').html();
        tonggiohang = tonggiohang.split(',').join('');
        tonggiohang = parseInt(tonggiohang);

        console.log(tonggiohang);

        var giamgia = $('.giamgia span').html();
        giamgia = giamgia.split(',').join('');
        giamgia = parseInt(giamgia);

        console.log(giamgia);

        var thanhtien = tonggiohang - giamgia;
        //    thanhtien = thanhtien.toLocaleString();
        $('input[name="cart_sum"]').val(thanhtien);
        $('#total-cart-price').text(thanhtien);
        $('#total-cart-price').number(true, 0);
    }

    // $('.apdung').click(function() {
    //     var v = $('.input_coupon').val();
    //     if(v == '')
    //         return false;
    //     else
    //         document.location.href = "http://www.minhhoa.com.vn/cart/list/?coupon=" + v;
    // });
</script>

<?php

// pr($this->data); 
?>