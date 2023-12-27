<div class="container-fluid product-banner hidden-xs"  <?php echo 'style="background-image: url('. DOMAIN . $this->App->t('18').');"' ?>>
    <div class="row">
        <div class="wrap-1100">
        <div class="banner-menu">
        </div>
        </div>
    </div>

    <?php echo $this->App->adm_link('lang', '18', 'image'); ?>
</div> 

<div class="container-fluid product-banner-mobile visible-xs">
    <div class="row">
        <div class="wrap-1100">
        <div class="banner-menu">
            <ul>
              <?php /* $i=0; foreach($cats as $v) : $i++; ?>
              <li class="<?php if($v['Category']['id']==$first_cat['Category']['id']) echo 'selected'; ?>">
                <a class=" <?php if($v['Category']['id']==$first_cat['Category']['id']) echo 'selected'; ?>" href="<?php echo DOMAIN. $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                  <?php echo $v['Node']['title']; ?>
                </a>
              </li>
              <?php endforeach; */ ?>
            </ul>
        </div>
        </div>
    </div>
</div> 

<div class="container-fluid product-nbtab" style="padding-bottom: 0;">
    <div class="row">
        <div class="wrap-1200">
         
        </div>
    </div>
</div> 

<div class="container-fluid product-list product-tucauhinh">
    <div class="row">
        <div class="wrap-1200">
        <div class="wrap-tucauhinh">

<div class="tucauhinh-header">
    <?php echo $this->App->t('header-tucauhinh'); ?>
    <?php echo $this->App->adm_link('lang', 'header-tucauhinh'); ?>
</div>

            <?php 
                $customize_tab = $settings['customize_tab'];
                $cpu = $settings['cpu_list'];
                $cpu_for_packages = $settings['cpu_for_packages'];
                $ram_for_packages = $settings['ram_for_packages'];
                $hdd_for_packages = $settings['hdd_for_packages'];
                $customize_tieuchi = $settings['customize_tieuchi'];

                $id = $_GET['i'];

                $data = $this->requestAction(DOMAIN . 'default/node/get_cat_customize/' . $id . '/' . $alias . '/' . $tbl);
                $type = strtolower($alias);

                //cau hinh chi tiet
                $techs = unserialize($data['category']['Category']['tech']);

                $cpu_list = explode("\n", $settings['cpu_list']);
                $cpu_lists = array();
                foreach($cpu_list as $c)
                    $cpu_lists[] = trim($c);

                $tab = explode("\n", $customize_tab);
                $tabs = array();
                foreach($tab as $t)
                    $tabs[] = trim($t);

                $tieuchi = explode("\n", $customize_tieuchi);
                $tieuchis = array();
                foreach($tieuchi as $t)
                    $tieuchis[] = trim($t);

                $cpu_packages = unserialize($cpu_for_packages);
                $ram_packages = unserialize($ram_for_packages);
                $hdd_packages = unserialize($hdd_for_packages);

                $list_cpu = array();
                if(isset($cpu_packages[$type]))
                {
                    foreach($cpu_packages[$type] as $cp)
                    {
                        if($cp['server_title'] == $this->data['Node']['title'])
                        {
                            $list_cpu = $cp['cpu'];
                            break;
                        }
                    }
                }

                $list_ram = array();
                if(isset($ram_packages[$type]))
                {
                    foreach($ram_packages[$type] as $cp)
                    {
                        if($cp['server_title'] == $this->data['Node']['title'])
                        {
                            $list_ram = $cp['ram'];
                            break;
                        }
                    }
                }

                $list_hdd = array();
                if(isset($hdd_packages[$type]))
                {
                    foreach($hdd_packages[$type] as $cp)
                    {
                        if($cp['server_title'] == $this->data['Node']['title'])
                        {
                            $list_hdd = $cp['hdd'];
                            break;
                        }
                    }
                }


                $tucauhinh = array();
                foreach($tabs as $v)
                {
                    $tucauhinh[$v] = array();
                }

                $i=0;
                foreach($techs as $v)
                {
                    $i++;
                    $opt = strtolower($v['option']);

                    if(isset($this->data[$alias][$opt]) && $this->data[$alias][$opt] == $v['val'])
                        $tucauhinh[$v['tab']][$v['option']][0] = $v;
                    else
                        $tucauhinh[$v['tab']][$v['option']][$i] = $v;
                }

                foreach($tucauhinh as $t=>$b)
                {
                    foreach ($b as $k => $v) 
                    {
                        // sort($v);

                        $tucauhinh[$t][$k] = $v;
                    }
                }

                // pr($this->data);
                // pr($data);
                // pr($tucauhinh);
                // pr($techs);
                // pr($tabs);
                // pr($cpu_lists);
                // pr($cpu_packages);
                // pr($tieuchis);
                // pr($list_cpu);
            ?>
<div class="tucauhinhinfo">
<div class="custome-wrap">
<?php foreach($tucauhinh as $tab=>$tabcontent) { if(!is_array($tabcontent) || count($tabcontent) <=0) continue; ?>
<div class="custome-tab"><span><?php echo $tab; ?></span></div>
<div class="clearfix"></div>
<?php 
    //Nếu dòng dài hơn $total_equal thì cho nút xem thêm và ẩn phần dài đi
    $total_equal = 6;
?>
<?php  foreach($tabcontent as $tieuchi=>$chitiet) {   ?>
<div class="custome-tieuchi"><span><?php echo $tieuchi; ?></span></div>
<?php $tieuchi_slug = Inflector::slug($tieuchi, '_'); ?>
<table class="custome-tbl">
<?php 
    $default_price = 0; 
    $i=-1; 
    $tr = 0;
    foreach($chitiet as $v) { $i++; ?>
<?php 
    // pr($chitiet);
// $tr++;
?>
<?php 
    $checked = '';
    $price = number_format($v['price']);
    $new_alias = strtolower($alias);
    $field = strtolower($v['option']);

    if($v['price'] == 0 && $i==0)
    {
        $checked = 'checked="checked"';
    }

    if(
        isset($this->data[$new_alias][$field]) 
        && (trim($v['val']) == trim($this->data[$new_alias][$field]))
    )
    {
        $default_price = $v['price'];
        $price = '0đ';
        $checked = 'checked="checked"';
    }
    // pr($v);
    // echo $this->data[$alias][$v['option']];
?>


<?php if(strtolower($v['option']) == 'cpu') { ?>
    <?php if(in_array($v['val'], $list_cpu)) { $tr++; ?>
        <tr <?php //if($tr>=$total_equal) echo 'class="tr-hide hide '.$v['option'].'"'; ?>>
            <td width="40">
                <input type="radio" sp="<?php echo $v['val']; ?>" default-price="<?php echo $price=='0đ' ? 1: 0; ?>" price="<?php echo $v['price']; ?>" option="<?php echo $v['option']; ?>" name="data[<?php echo $tieuchi_slug; ?>]" class="check_radio" val="<?php echo $v['option']; ?>" <?php echo $checked; ?> />
            </td>
            <td>
                <?php echo $v['val']; ?>
            </td>
            <td width="100">
                <div class="price">
                    <?php 
                    if($price == '0đ')
                        echo $price; 
                    else
                        echo number_format($v['price'] - $default_price) . 'đ';
                    ?>
                </div>
            </td>
        </tr>
     <?php } ?>
<?php } else if(strtolower($v['option']) == 'ram') { ?>
    <?php if(in_array($v['val'], $list_ram)) { $tr++; ?>
        <tr <?php //if($tr>=$total_equal) echo 'class="tr-hide hide '.$v['option'].'"'; ?>>
            <td width="40">
                <input type="radio" sp="<?php echo $v['val']; ?>" default-price="<?php echo $price=='0đ' ? 1: 0; ?>" price="<?php echo $v['price']; ?>" option="<?php echo $v['option']; ?>" name="data[<?php echo $tieuchi_slug; ?>]" class="check_radio" val="<?php echo $v['option']; ?>" <?php echo $checked; ?> />
            </td>
            <td>
                <?php echo $v['val']; ?>
            </td>
            <td width="100">
                <div class="price">
                    <?php 
                    if($price == '0đ')
                        echo $price; 
                    else
                        echo number_format($v['price'] - $default_price) . 'đ';
                    ?>
                </div>
            </td>
        </tr>
     <?php } ?>
<?php } else if(strtolower($v['option']) == 'hdd') { ?>
    <?php if(in_array($v['val'], $list_hdd)) { $tr++; ?>
        <tr <?php //if($tr>=$total_equal) echo 'class="tr-hide hide '.$v['option'].'"'; ?>>
            <td width="40">
                <input type="radio" sp="<?php echo $v['val']; ?>" default-price="<?php echo $price=='0đ' ? 1: 0; ?>" price="<?php echo $v['price']; ?>" option="<?php echo $v['option']; ?>" name="data[<?php echo $tieuchi_slug; ?>]" class="check_radio" val="<?php echo $v['option']; ?>" <?php echo $checked; ?> />
            </td>
            <td>
                <?php echo $v['val']; ?>
            </td>
            <td width="100">
                <div class="price">
                    <?php 
                    if($price == '0đ')
                        echo $price; 
                    else
                        echo number_format($v['price'] - $default_price) . 'đ';
                    ?>
                </div>
            </td>
        </tr>
     <?php } ?>
 <?php } else { $tr++; ?>
    <tr <?php //if($tr>=$total_equal) echo 'class="tr-hide hide '.$v['option'].'"'; ?>>
        <td width="40">
            <input type="radio" sp="<?php echo $v['val']; ?>" default-price="<?php echo $price=='0đ' ? 1: 0; ?>" price="<?php echo $v['price']; ?>" option="<?php echo $v['option']; ?>" name="data[<?php echo $tieuchi_slug; ?>]" class="check_radio" val="<?php echo $v['option']; ?>" <?php echo $checked; ?> />
        </td>
        <td>
            <?php echo $v['val']; ?>
        </td>
        <td width="100">
            <div class="price"><?php echo $price; ?>đ</div>
        </td>
    </tr>
 <?php } ?>


 <?php } ?>


<?php /*if($tr>=$total_equal) { 
?>
    <tr>
        <td colspan="3">
            <span class="readmore" rel="<?php echo $v['option']; ?>">Xem thêm</span>
        </td>
    </tr>
<?php }*/ ?>


 </table>
 <div class="clearfix"></div>
 <?php } ?>

 <?php } ?>
 </div>
 </div>

<?php 
// echo $this->data[$alias]['price'];
$one_price = $this->data[$alias]['price'] + $this->data[$alias]['price_hide'];
?>

<div class="tongket">
    <div class="tongket-tab-title"><span><?php echo $this->App->t('tongchiphi'); ?><?php echo $this->App->adm_link('lang', 'tongchiphi'); ?></span></div>
    <div class="tongket-item tongket-item-1">
        <input type="radio" name="thoigian" sp="5" value="5" <?php if(isset($_GET['sl']) && $_GET['sl'] == 5) echo 'checked="checked" class="active"'; ?> /> 
        <span>24 tháng</span>
        <span class="thanhtien-24m"><?php echo number_format($this->data[$alias]['price5y']); ?>đ </span>
    </div>
    <div class="tongket-item tongket-item-2">
        <input type="radio" name="thoigian" sp="4" value="4" <?php if(isset($_GET['sl']) && $_GET['sl'] == 4) echo 'checked="checked" class="active"'; ?> /> 
        <span>12 tháng</span>
        <span class="thanhtien-12m"><?php echo number_format($this->data[$alias]['price4y']); ?>đ </span>
    </div>
    <div class="tongket-item tongket-item-3">
        <input type="radio" name="thoigian" sp="3" value="3" <?php if(isset($_GET['sl']) && $_GET['sl'] == 3) echo 'checked="checked" class="active"'; ?> /> 
        <span>6 tháng</span>
        <span class="thanhtien-6m"><?php echo number_format($this->data[$alias]['price3y']); ?>đ </span>
    </div>
    <div class="tongket-item tongket-item-4">
        <input type="radio" name="thoigian" sp="2" value="2" <?php if(isset($_GET['sl']) && $_GET['sl'] == 2) echo 'checked="checked" class="active"'; ?> /> 
        <span>3 tháng</span>
        <span class="thanhtien-3m"><?php echo number_format($this->data[$alias]['price2y']); ?>đ </span>
    </div>
    <div class="tongket-item tongket-item-5">
        <input type="radio" name="thoigian" disabled="disabled" sp="1" value="1" <?php if(isset($_GET['sl']) && $_GET['sl'] == 1) echo 'checked="checked" class="active"'; ?> /> 
        <span>1 tháng</span>
        <span class="thanhtien-1m"><?php echo number_format($one_price); ?>đ </span>
    </div>
    <div class="tongket-sum">
        <div class="sum-item sum-item-1">
            <span class="lbl">Cước phí / tháng: </span>
            <span class="thanhtien-thang"><?php echo number_format($this->data[$alias]['price5y']); ?>đ</span>
        </div>
        <div class="sum-item sum-item-2">
            <span class="thanhtien-tietkiem"><?php echo number_format(($one_price*24) - ($this->data[$alias]['price5y']*24)); ?>đ</span>
            <span class="lbl">Tiết kiệm: </span>
        </div>
        <div class="sum-item sum-item-3">
            <span class="lbl">Tổng cước: </span>
            <span class="thanhtien-tongcuoc"><?php echo number_format($this->data[$alias]['price5y'] * 24); ?>đ</span>
        </div>
    </div>
    <div class="tongket-order">
    <input type="button" class="btn btn-primary ordernow" value="Đặt hàng" />
    </div>
</div>

<?php 
// pr($this->data);
// pr($tucauhinh);
// pr($settings);
 ?>



      </div>


  </div> 
  </div> 
</div> 

<div class="mobile-sum visible-xs">
    <div class="sum-item sum-item-1">
        <span class="lbl">Cước phí / tháng: </span>
        <span class="thanhtien-thang"><?php echo number_format($this->data[$alias]['price5y']); ?>đ</span>
    </div>
</div>

<div class="clearfix"></div>

<?php echo View::element('nav-footer'); ?>


<script type="text/javascript">
    setTimeout(function() {
        $('.tongket-item .active').click();
    }, 1000);

    $('span.readmore').click(function() {
        var tc = $(this).attr('rel');
        $('.'+tc).removeClass('hide');
        $(this).hide();
    });
</script>


<?php 
    $tl3 = ($this->data[$alias]['price2y'] / $one_price);
    $tl6 = ($this->data[$alias]['price3y'] / $one_price);
    $tl12 = ($this->data[$alias]['price4y'] / $one_price);
    $tl24 = ($this->data[$alias]['price5y'] / $one_price);
?>

<script type="text/javascript">
    $('.ordernow').click(function() {
        var str = '';
        var thoigian = '1';
        var tien = 0;

        $('input[type=radio]:checked').each(function() {
            var name=$(this).attr('name');
            var val = $(this).attr('sp');
            str += name + ':::' + val + '|||';

            if(name=='thoigian')
                thoigian = val;
        });


        switch(thoigian)
        {
            case '5': 
            tien = $('.thanhtien-24m').html();
            break;
            case '4': 
            tien = $('.thanhtien-12m').html();
            break;
            case '3': 
            tien = $('.thanhtien-6m').html();
            break;
            case '2': 
            tien = $('.thanhtien-3m').html();
            break;
            case '1': 
            tien = $('.thanhtien-1m').html();
            break;

            default: 
            break;
        }

        str += 'tien:::' + tien;

        var lnk = "<?php echo DOMAIN; ?>cart/add/<?php echo time() . rand(0,100); ?>/?customize=1&content=" + str;
        document.location.href = lnk;
        return false;
    });
</script>

<?php 
// pr($this->data);
?>

<script type="text/javascript">
     var phantram3thang = '<?php echo $tl3; ?>';
     var phantram6thang = '<?php echo $tl6; ?>';
     var phantram12thang = '<?php echo $tl12; ?>';
     var phantram24thang = '<?php echo $tl24; ?>';

    $('input[type=radio]').click(function() {
        calculate_price();
    });

    function calculate_price()
    {
        var tong_gia = 0;
        var tong_gia_default = 0;
        var price_hide = <?php echo $this->data[$alias]['price_hide']; ?>;

        $('.check_radio').each(function() {
            if($(this).is(':checked'))
            {
                var price = $(this).attr('price'); price = parseInt(price);
                var price_default = $(this).attr('price_default');
                if(price_default == '1') tong_gia_default += price;
                else tong_gia += price;
            }
        });
        
		// console.log(tong_gia_default);
		// console.log('price hide: '+price_hide);

        var sum = (tong_gia - tong_gia_default) + price_hide;
        var sum3 = (sum * phantram3thang);
        var sum6 = (sum * phantram6thang);
        var sum12 = (sum * phantram12thang);
        var sum24 = (sum * phantram24thang);

        // var tongsum3 = sum3 * 3;
        // var tongsum6 = sum6 * 6;
        // var tongsum12 = sum12 * 12;
        // var tongsum24 = sum24 * 24;

        var tongsum3 = sum3 * 3;
        var tongsum6 = sum6 * 6;
        var tongsum12 = sum12 * 12;
        var tongsum24 = sum24 * 24;

        var strsum = sum.format() + 'đ';

        var strsum3 = sum3.format() + 'đ';
        var strsum6 = sum6.format() + 'đ';
        var strsum12 = sum12.format() + 'đ';
        var strsum24 = sum24.format() + 'đ';

        var strtongsum3 = tongsum3.format() + 'đ';
        var strtongsum6 = tongsum6.format() + 'đ';
        var strtongsum12 = tongsum12.format() + 'đ';
        var strtongsum24 = tongsum24.format() + 'đ';

        $('.thanhtien-1m').html(strsum);
        $('.thanhtien-3m').html(strsum3);
        $('.thanhtien-6m').html(strsum6);
        $('.thanhtien-12m').html(strsum12);
        $('.thanhtien-24m').html(strsum24);

        var tietkiem = 0;

        var thoigian = $('input[name=thoigian]:checked').val();
        
        switch(thoigian)
        {
            case '5':
                $('.thanhtien-thang').html(strsum24);
                $('.thanhtien-tongcuoc').html(strtongsum24);
                tietkiem = sum * 24 - tongsum24;
                $('.thanhtien-tietkiem').html(tietkiem.format());
                break;
            case '4':
                $('.thanhtien-thang').html(strsum12);
                $('.thanhtien-tongcuoc').html(strtongsum12);
                tietkiem = sum * 12 - tongsum12;
                $('.thanhtien-tietkiem').html(tietkiem.format());
                break;
            case '3':
                $('.thanhtien-thang').html(strsum6);
                $('.thanhtien-tongcuoc').html(strtongsum6);
                tietkiem = sum * 6 - tongsum6;
                $('.thanhtien-tietkiem').html(tietkiem.format());
                break;
            case '2':
                $('.thanhtien-thang').html(strsum3);
                $('.thanhtien-tongcuoc').html(strtongsum3);
                tietkiem = sum * 3 - tongsum3;
                $('.thanhtien-tietkiem').html(tietkiem.format());
                break;
            case '1':
                $('.thanhtien-thang').html(strsum);
                $('.thanhtien-tongcuoc').html(strsum);
                tietkiem = 0;
                $('.thanhtien-tietkiem').html('0đ');
                break;
            default: 
                break;
        }
    }

    Number.prototype.format = function(n, x) {
        var re = '\\d(?=(\\d{' + (x || 3) + '})+' + (n > 0 ? '\\.' : '$') + ')';
        return this.toFixed(Math.max(0, ~~n)).replace(new RegExp(re, 'g'), '$&,');
    };
</script>

<?php if(!isset($is_mobile) || $is_mobile != 1) : ?>
<script type="text/javascript" src="<?php echo DOMAIN; ?>theme/default/js/stickyMojo.js"></script>
<script>
    var tw = $('.tongket').width();
    $('.tongket').css('width', tw);

  $(document).ready(function(){
    $('.tongket').stickyMojo({footerID: '.tuvan', contentID: '.tucauhinhinfo'});
  });
</script>
<?php endif; ?>

