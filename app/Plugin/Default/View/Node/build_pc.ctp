<?php
    $_buildpc = [];
    $is_valid_to_build = false;

    if($this->App->is_valid_json($settings['buildPC']))
    {
        $is_valid_to_build = true;
        $_buildpc = json_decode($settings['buildPC']);
    }

    if(isset($_GET['dev'])) pr($_buildpc);
?>

<link rel="stylesheet" href="<?php echo DOMAIN; ?>theme/default/css/buildpc.css">

<main class="build-pc pc">
    <div class="container">
        <div class="clear"></div>

        <div class="build-pc_content" style="margin-top:0;">
            <h1 style="color:#333;border:none;float:left;margin: 5px 0 15px 0px;">
                <?php echo $this->App->t_a('buildpc-title'); ?>
            </h1>

            <ul class="list-btn-action" style="margin:0; padding:0; float:right; border:none;">
                <li style="width:auto;">
                    <span onclick="openPopupRebuild()" style="padding:0 20px; background:#ce0707;">
                        Làm mới <i class="fa fa-undo"></i>
                    </span>
                </li>
            </ul>

            <div class="clear"></div>

            <hr color="#ddd">

            <p style="float:left; margin:15px 0;">                
                <?php echo $this->App->t_a('buildpc-selectlk'); ?>
            </p>

            <p style="float:right; font-size:18px; color:#d00; margin-top:10px;">
                <?php echo $this->App->t_a('buildpc-chiphidutinh'); ?>
                <span class="js-config-summary">
                    <span class="total-price-config">0</span> đ
                </span>
            </p>

            <div class="clear"></div>

            <div class="list-drive" id="js-buildpc-layout">
                <?php if($is_valid_to_build == true) { ?>
                <?php $stt = 0; foreach($_buildpc as $k=>$v) { ?>
                <?php if($v->cid != 0) { $stt++; ?>
                <div class="item-drive">
                    <span class="d-name"><?php echo $stt; ?>. <?php echo $v->name; ?></span>
                    <div class="drive-checked">
                        <span class="show-popup_select show-popup_select-<?php echo $v->cid; ?> span-last open-selection" cid="<?php echo $v->cid; ?>">
                            <i class="fa fa-plus"></i>
                            Chọn <?php echo $v->name; ?>
                        </span>
                        <div id="js-selected-item-<?php echo $v->cid; ?>"></div>
                    </div>
                </div>
                <?php } ?>
                <?php } ?>
                <?php } ?>
            </div>

            <div class="clearfix"></div>

            <p style="float:right; font-size:18px; color:#d00; margin-top:10px; margin-bottom:10px;">
                <?php echo $this->App->t('buildpc-chiphidutinh'); ?> 
                <span class="js-config-summary">
                    <span class="total-price-config">0</span> đ
                </span>
            </p>

            <div class="clearfix"></div>

            <ul class="list-btn-action" id="js-buildpc-action" style="margin-top:10px;">
                <li style="float: right;margin: 0;padding: 0;">
                    <span data-action="add-cart" style="background:#ce0707;" onclick="add_cauhinh_tocart()">
                        <?php echo $this->App->t_a('buildpc-addcart'); ?> <i class="fa fa-cart-plus"></i>
                    </span>
                </li>
            </ul>
        </div>
    </div>

    <div id="js-modal-popup">
        <div class="mask-popup">
            <div class="popup-select">
                <div class="header">
                    <h4>Chọn linh kiện</h4>
                    <!-- <form action="">
                        <input type="text" value="" id="buildpc-search-keyword" class="input-search"
                            placeholder="Bạn cần tìm linh kiện gì?">
                        <span class="btn-search"><i class="fa fa-search" id="js-buildpc-search-btn"></i></span>
                        <div class="icon-menu-filter-mobile"><i class="fa fa-list"></i></div>
                    </form> -->

                    <span class="close-popup"><i class="fa fa-times"></i></span>
                </div>

                <div class="popup-main">
                    <div class="popup-main_filter w-30 float_l">
                        <h4><?php echo $this->App->t_a('buildpc-filterproducts'); ?></h4>
                        <div class="list-filter">
                        </div>
                    </div>

                    <div class="popup-main_content w-70 float_r">
                        <div class="sort-paging clear">
                            <div class="sort-block float_l">
                                <span>Sắp xếp: </span>
                                <select id="popup_sort_product" onchange="">
                                    <option value="">Sắp xếp sản phẩm</option>
                            `       <option value="created-desc">Mới nhất</option>
                                    <option value="price-asc">Giá tăng dần</option>
                                    <option value="price-desc">Giá giảm dần</option>`
                                </select>
                            </div>

                            <?php /*
                            <div class="paging-block float_r paging-ajax">
                                <table cellpadding="0" cellspacing="0">
                                    <tbody>
                                        <tr>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=2')">&lt;&lt;</a>
                                            </td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=1')">1</a>
                                            </td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=2')">2</a>
                                            </td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingViewed">3</td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=4')">4</a>
                                            </td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=5')">5</a>
                                            </td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=6')">6</a>
                                            </td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=7')">7</a>
                                            </td>
                                            <td class="pagingSpace"></td>
                                            <td class="pagingFarSide" align="center">...</td>
                                            <td class="pagingIntact"><a href="javascript:;"
                                                    onclick="loadAjaxContent('', '/ajax/get_json.php?action=pcbuilder&amp;action_type=get-product-category&amp;category_id=3&amp;pc_part_id=2700-2&amp;&amp;&amp;page=4')">&gt;&gt;</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            */ ?>
                        </div>

                        <div class="list-product-select">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<script>
var is_requesting = false;
var processing_cat_id = 0;


$('.show-popup_select').click(function() {
    var cid = $(this).attr('cid');
        processing_cat_id = cid;

    var link = "<?php echo DOMAIN; ?>default/build/get_data/" + cid;

    $.ajax({
        url: link,
        type: 'post',
        dataType: 'json',
        success: function(d) {
            // console.log(d);

            var lftHtml = build_menu(d, cid);
            // console.log(lftHtml);
            $('#js-modal-popup .list-filter').html(lftHtml);

            var productsHtml = build_list_products(d, cid);
            // console.log(productsHtml);
            $('#js-modal-popup .list-product-select').html(productsHtml);
        },
        errof: function(err) {
            // console.log(err);
        }
    });

    $('#js-modal-popup .mask-popup').addClass('active');
});

$('.close-popup').click(function() {
    $('#js-modal-popup .mask-popup').removeClass('active');
});


function build_list_products(res, catId) {
    var str = '';

    for(var i=0; i<res.products.length; i++)
    {
        str += build_product_item(res.products[i], catId);
    }

    return str;
}

function build_menu(res, catId) 
{
    var str = '';

    if(res.has_filter_hang == '1')
    {
        str += build_hang(res._hang, catId);
    }

    if(res.has_filter_price == '1')
    {
        str += build_price(res._price, catId);
    }

    return str;
}

function build_hang(d, catId)
{
    var str = '<div class="gr-filter brand">';
        str += '<h5 class="title-filter">Hãng sản xuất</h5>';
        str += '<ul>';

        
    for(var i = 0; i < d.length; i++)
    {
        str += '<li>';
        str += '<input type="checkbox" class="checkboxhang checkboxhang-' + d[i].id + '" value="' + d[i].id + '" onclick="change_hang(' + d[i].id + ')" />';
        str += d[i].title;
        str += '</li>';
    }

    str += '</ul>';
    str += '</div>';

    return str;
}

function update_data() {
    // console.log('update_data');
    // console.log(is_requesting);
    // console.log(processing_cat_id);
    if(is_requesting == true) return;
    if(processing_cat_id == 0) return;

    var hang_id = "";
    var min = "";
    var max = "";
    var sort = $('#popup_sort_product').val();

    $('.checkboxhang').each(function() {
        if($(this).is(":checked"))
        {
            hang_id = $(this).val();
        }
    });
    
    $('.checkboxprice').each(function() {
        if($(this).is(":checked"))
        {
            min = $(this).attr('min');
            max = $(this).attr('max');
        }
    });

    is_requesting = true;
        
    var link = "<?php echo DOMAIN; ?>default/build/get_update_products/" + processing_cat_id + "?min=" + min + '&max=' + max + '&hang=' + hang_id + '&sort=' + sort;
    // console.log(link);

    $.ajax({
        url: link,
        type: 'get',
        dataType: 'json',
        success: function(d) {
            // console.log('update d');
            var productsHtml = build_list_products(d, processing_cat_id);
            // console.log(productsHtml);
            $('#js-modal-popup .list-product-select').html(productsHtml);
        },
        errof: function(err) {
            // console.log('err d');
            // console.log(err);
        }
    });
    
    // console.log('end');
    is_requesting = false;
}

function change_hang(hang_id)
{
    // console.log('change_hang: '+ hang_id);
    if($('.checkboxhang-' + hang_id).is(":checked") == true)
    {
        $('.checkboxhang').prop('checked', false);
        $('.checkboxhang-' + hang_id).prop('checked', true);
    }
    else
    {
        $('.checkboxhang').prop('checked', false);
    }

    update_data();
}

function change_price(pmin, pmax, stt)
{
    // console.log('change_price, min: '+ pmin + ', max: ' + pmax);

    if($('.checkboxprice-' + stt).is(":checked"))
    {
        $('.checkboxprice').prop('checked', false);
        $('.checkboxprice-' + stt).prop('checked', true);
    }
    else
    {
        $('.checkboxprice').prop('checked', false);
    }

    update_data();
}

function build_price(d, catId)
{
    var str = '<div class="gr-filter brand">';
        str += '<h5 class="title-filter">Khoảng giá</h5>';
        str += '<ul>';

        
    for(var i = 0; i < d.length; i++)
    {
        str += '<li>';
        str += '<input type="checkbox" class="checkboxprice checkboxprice-' + i + '" min="' + d[i].min + '" max="' + d[i].max + '" onclick="change_price(' + d[i].min + ',' + d[i].max + ', ' + i + ')" />';
        str += d[i].txt;
        str += '</li>';
    }

    str += '</ul>';
    str += '</div>';

    return str;
}

function format_number(num) {
    num = parseFloat(num).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
    num_arr = num.split('.');
    return num_arr[0];
}

function update_total() {
    var total = 0;
    $('.product-item-inserted').each(function () {
        var price = $(this).attr('data-price');
        price = parseInt(price);
        total = total + price;
    });

    total = format_number(total);
    $('.total-price-config').html(total);
    
    is_requesting = false;
    processing_cat_id = 0;
}

function build_product_item(d, catId)
{
    // console.log(d);
    var link = DOMAIN + d.Node.slug + '.html';
    var title = d.Node.title;
    var node_id = d.Node.id;
    var img = DOMAIN + d.Product.image;
    var baohanh = d.Product.baohanh + ' tháng';
    var priceInt = d.Product.price;
    var price = priceInt == '' ? 'Liên hệ' : priceInt;

    if(price != 'Liên hệ')
        price = format_number(price) + 'đ';

    var status = d.Product.status == '1' ? 'Còn hàng' : 'Hết hàng';
    
    var item = '<div class="p-item product-item-' + catId + '" data-node-id="' + node_id + '">';
        item += '<a href="' + link + '" class="p-img">';
        item += '<img src="' + img + '" alt="' + title + '" class="product-item-img-' + catId + '">';
        item += '</a>';
        item += '<div class="info">';
        item += '<a href="' + link + '" class="p-name product-item-link-' + catId + '">' + title + '</a>';
        item += '<table>';
        item += '<tbody>';
        item += '<tr>';
        item += '<td><b>Bảo hành:</b></td>';
        item += '<td class="product-item-baohanh-' + catId + '">' + baohanh + '</td>';
        item += '</tr>';
        item += '<tr>';
        item += '<td valign="top"><b>Kho hàng:</b></td>';
        item += '<td class="product-item-khohang-' + catId + '">' + status + '</td>';
        item += '</tr>';
        item += '</tbody>';
        item += '</table>';
        item += '<span data-price="' + priceInt + '" class="p-price product-item-price-' + catId + '">' + price + '</span>';
        item += '</div>';
        item += '<span class="btn-buy js-select-product" onclick="select_product(' + catId + ')" data-cid="' + catId + '">Thêm vào cấu hình <i class="fa fa-angle-right"></i></span>';
        item += '</div>';

    return item;
}

function openPopupRebuild()
{
    $('.product-item-inserted').remove();
    update_total();
}

function remove_inserted(selector) {
    var p = confirm("Bạn chắc chắn muốn loại bỏ linh kiện này?");
    if(p == true)
    {
        $('.' + selector).remove();
        processing_cat_id = 0;

        update_total();
    }
}

function edit_inserted(cid) {
    $('.show-popup_select-' + cid).click();
}

function add_cauhinh_tocart() {
    var ids = new Array();

    $('.product-item-inserted').each(function () {
        var node_id = $(this).attr('data-node-id');
        ids.push(node_id);
    });

    var link = DOMAIN + 'cart/adds/?ids=' + ids.join(',');
    // console.log(link);

    document.location.href = link;
}

function select_product(catId) {
    var item = $('.product-item-' + catId);
    var node_id = item.attr('data-node-id');
    var link = item.find('.product-item-link-' + catId).attr('href');
    var img = item.find('.product-item-img-' + catId).attr('src');
    var title = item.find('.product-item-img-' + catId).attr('alt');
    var baohanh = item.find('.product-item-baohanh-' + catId).html();
    var price = item.find('.product-item-price-' + catId).html();
    var priceInt = item.find('.product-item-price-' + catId).attr('data-price');
    var status = item.find('.product-item-khohang-' + catId).html();

    var str = '<div class="contain-item-drive product-item-inserted product-item-inserted-' + catId + '" data-node-id="' + node_id + '" data-price="' + priceInt + '">';
    str += '<a target="_blank" href="' + link + '" class="d-img">';
    str += '<img src="' + img + '" />';
    str += '</a>';
    str += '<span class="d-name">';
    str += '<a target="_blank" href="' + link + '">' + title;
    str += '</a> <br>';
    str += 'Bảo hành: ' + baohanh + ' <br>';
    str += 'Kho hàng: <span style="color: red">' + status + '</span>';
    str += '</span>';
    // str += '<span class="d-price">' + price + '</span>';
    // str += '<i>x</i> <input class="count-p" type="number" value="1" min="1" max="50"><i>=</i>';
    str += '<span class="sum_price">' + price + '</span>';
    str += '<span class="btn-action_seclect show-popup_select2" onclick="edit_inserted(' + catId + ')"><i class="fa fa-edit edit-item"></i></span>';
    str += '<span class="btn-action_seclect delete_select" onclick="remove_inserted(\'product-item-inserted-' + catId + '\')"><i class="fa fa-trash remove-item"></i></span>';
    str += '</div>';

    $('#js-selected-item-' + catId).html(str);

    update_total();
    $('.close-popup').click();
}
</script>