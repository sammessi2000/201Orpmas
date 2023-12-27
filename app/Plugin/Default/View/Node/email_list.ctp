<?php 
$catroot = $this->requestAction(DOMAIN . 'default/node/find_root_category/' . $current_category['Category']['id']);
$cats = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $catroot);
$ids = array();

foreach($cats as $v)
{
  $ids[] = $v['Category']['id'];
} 

$first_cat = $current_category;

if(!in_array($current_category['Category']['id'], $ids))
  $first_cat = $cats[0];


?>
<?php if($current_category['Node']['id'] == 146 || $first_cat['Node']['id'] == 146) { ?>
<?php echo View::element('email_hosting', array('ids'=>$ids, 'first_cat'=>$first_cat, 'cats'=>$cats)); ?>
<?php } else { ?>
<div class="container-fluid product-banner hidden-xs fixbackground-repon"  <?php echo 'style="background-image: url('. $this->App->t('32').'); background-size: contain;"' ?>>
    <div class="row">
        <div class="wrap-1100">
        <div class="banner-menu">
            <ul>
              <?php $i=0; foreach($cats as $v) : $i++; ?>
              <li class="mmmenu<?php echo $i; ?> <?php if($v['Category']['id']==$first_cat['Category']['id']) echo 'selected'; ?>" rel="<?php echo $i; ?>">
                <a class=" <?php if($v['Category']['id']==$first_cat['Category']['id']) echo 'selected'; ?>" href="<?php echo DOMAIN. $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                  <?php echo $v['Node']['title']; ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
        </div>
        </div>
    </div>

    <?php echo $this->App->adm_link('lang', '32', 'image'); ?>
</div> 

<div class="container-fluid product-banner-mobile visible-xs">
    <div class="row">
        <div class="wrap-1100">
        <div class="banner-menu">
            <ul>
              <?php $i=0; foreach($cats as $v) : $i++; ?>
              <li class="<?php if($v['Category']['id']==$first_cat['Category']['id']) echo 'selected'; ?>">
                <a class=" <?php if($v['Category']['id']==$first_cat['Category']['id']) echo 'selected'; ?>" href="<?php echo DOMAIN. $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                  <?php echo $v['Node']['title']; ?>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
        </div>
        </div>
    </div>
</div> 

<div class="container-fluid product-nbtab">
    <div class="row">
        <div class="wrap-1200">
        </div>
    </div>
</div> 

<?php
  $data = $this->requestAction(DOMAIN . 'default/node/get_dynamic_rows/' . $first_cat['Category']['id'] . '/emails/Email/email_category/30');
?>

<div class="container-fluid product-list">
    <div class="row">
        <div class="wrap-1200">
            <?php //$k=0; foreach($tab as $t) { $k++; ?>
            <div id="product-tab<?php //echo $k; ?>" class="product-list-tab <?php //if($k>1) echo 'hide'; ?>">
                <?php $n=count($data); $i=-1; foreach($data as $v) { $i++; ?>
                <?php //if($v->tab == $t->tab) { ?>
                <?php ?>
                <div class="product-item col-sm-3" id="p-<?php echo $v['Node']['id']; ?>">
                    <div class="product-item-detail <?php if($v['Email']['featured'] == 1) echo 'active'; ?>">
                      <div class="product-price">
                      <span>Chỉ với</span> <?php echo number_format($v['Email']['price5y']); ?> <span><strong>đ/tháng</strong></span>
                      </div>
                      <div class="product-package">
                      <h2 class="pkg-<?php echo $v['Node']['id']; ?>"><?php echo $v['Node']['title']; ?></h2>
                      </div>
                      <div class="product-info">
                          <div class="row_item HDD">
                            Dung lượng              
                            <span><?php echo $v['Email']['space']; ?></span>
                          </div>
                          <div class="row_item email">
                            Địa chỉ Email      
                            <span><?php echo $v['Email']['email']; ?></span>
                          </div>
                          <div class="row_item email_forwarder">
                            Email Forwarder             
                            <span><?php echo $v['Email']['forwarder']; ?></span>
                          </div>
                          <div class="row_item mail_list">
                            Mail list             
                            <span><?php echo $v['Email']['mail_list']; ?></span>
                          </div>
                          <div class="row_item park_domain">
                            Park domain              
                            <span><?php echo $v['Email']['park']; ?></span>
                          </div>
                      </div>
                      <div class="product-times" id="pkg-<?php echo $v['Node']['id']; ?>">
                            <span class="time-grand">Chọn gói thời gian</span>
                            <div class="hide" id="hide-pkg-<?php echo $v['Node']['id']; ?>">
                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="1 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      1 tháng <span><?php echo number_format($v['Email']['price']); ?> đ</span>/Tháng
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Email']['price']); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="3 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      3 tháng <span><?php echo number_format($v['Email']['price2y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Email']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Email']['price'] * 3;
                                      $p2 = $v['Email']['price2y'] * 3;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Email']['price2y'] * 3); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="6 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      6 tháng <span><?php echo number_format($v['Email']['price3y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Email']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Email']['price'] * 6;
                                      $p2 = $v['Email']['price3y'] * 6;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Email']['price3y'] * 6); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="12 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      12 tháng <span><?php echo number_format($v['Email']['price4y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Email']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Email']['price'] * 12;
                                      $p2 = $v['Email']['price4y'] * 12;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Email']['price4y'] * 12); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="24 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      24 tháng <span><?php echo number_format($v['Email']['price5y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Email']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Email']['price'] * 24;
                                      $p2 = $v['Email']['price5y'] * 24;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Email']['price5y'] * 24); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="clearfix"></div>

                                <div class="package-extras">
                                <?php echo $this->App->t('email-plan-note'); ?>
                                <?php echo $this->App->adm_link('lang', 'email-plan-note', 'editor'); ?>
                              </div>

                              <script type="text/javascript">
                  $('.package-item').click(function() {
                    var pname = $(this).attr('rel');
                    var pd = $(this).attr('data');

                    var arr = pname.split(' ');
                    var num = arr[0];

                    if(num == '1') return false;

                    var y = 1;

                    switch(num)
                    {
                      case '3':
                        y=2;
                        break;
                      case '6':
                        y=3;
                        break;
                      case '12':
                        y=4;
                        break;
                      case '24':
                        y=5;
                        break;
                      default:
                        break;
                    }

                    $('#' + pd).find('.time-grand').text(pname);
                    $('#' + pd).find('.product-reg a').attr('sl', y);

                    $('.modal').modal('hide');
                  });
                              </script>
                            </div>
                      </div>
                      <div class="product-reg">
                      <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $v['Node']['id']; ?>" sl="" class="dangky buttonstyle bld" rel="nofollow">Đăng Ký</a>
                      </div>
                  </div>
                </div>
                <?php } ?>
                <?php //} ?>
            </div>
            <?php ///} ?>
        </div>
    </div>
</div> 


<script type="text/javascript">
  $('.product-times').click(function() {
    var here = $(this).attr('id');
    var pname = $('h2.' + here).text();
    var ptimes = $('#hide-' + here).html();

    $('.modal .package-name').html(pname);
    $('.modal .package-list').html(ptimes);

    $('.modal').modal();
  });

  $('.product-reg a').click(function() {
    var v = $(this).attr('sl');
    if(v=="")
    {
      alert('Vui lòng chọn thời gian'); 
      return false;
    }

    var lnk = $(this).attr('href') + '&sl=' + v;
    document.location.href=lnk;

    return false;
  });
</script>

<?php 
  $email_compare = $settings['email-compare'];
  $email_compare = unserialize($email_compare);
?>
<div class="container-fluid product-extra product-extra2" id="t2">
    <div class="row">
        <div class="wrap-1200">
            <h2><?php echo $this->App->t('prdtssdvhs'); ?><?php echo $this->App->adm_link('lang', 'prdtssdvhs'); ?></h2>
            <?php //$k=0; foreach($tab as $t) { $k++; ?>
            <div id="product-extra-tab<?php //echo $k; ?>" class="product-extra-tab <?php //if($k>1) echo 'hide'; ?>">
                <?php //echo $this->App->t('bssdvds'); ?>    
                <table cellpadding="1" cellspacing="1" class="tblss hidden-xs">
                    <tr class="odd">
                    <td style="text-align: left">Gói dịch vụ</td>
                    <?php foreach($data as $v) : ?>
                    <td>
                        <?php echo $v['Node']['title']; ?>
                    </td>
                  <?php endforeach; ?>
                  </tr>
                  <?php $j=0; foreach($email_compare as $key=>$v) { ?>
                    <?php if($v['show'] == 1) { $j++; ?>
                    <tr <?php if($j==2) { echo 'class="odd"'; $j=0; } ?>>
                        <td><?php echo $v['title']; ?></td>
                        <?php foreach($data as $v) : ?>
                        <td>
                        <?php echo $v['Email'][$key]; ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                          <tr class="special">
                              <td></td>
                    <?php foreach($data as $v) : ?>
                      <td>
                      <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $v['Node']['id']; ?>" sl="" class="dangky btn btn-small btn-reg-ex2 bld" rel="nofollow">Đăng Ký</a>
                      </td>
                       <?php endforeach; ?>
                          </tr>
                </table>



                <?php 
                $i=0;
                $tbl_tag = 0;
                $n=ceil(count($data)/3);

                // echo $n; die;
                for($ii=0; $ii<$n; $ii++) 
                {
                  $i++;
                  $tbl_tag ++;
                  $min = 0;
                  $max = 0;

                  switch ($i) {
                    case '1':
                      $min = 1;
                      $max = 3;
                      break;
                    case '2':
                      $min = 4;
                      $max = 6;
                      break;
                    case '3':
                      $min = 7;
                      $max = 9;
                      break;
                    case '4':
                      $min = 10;
                      $max = 12;
                      break;
                    
                    default:
                      break;
                  }
                ?>
                <table cellpadding="1" cellspacing="1" class="tblss visible-xs">
                <tr class="odd">
                      <td style="text-align: left">Gói dịch vụ</td>
                      <?php $xk=0; foreach($data as $v) : $xk++; ?>
                      <?php if($xk<=$max && $xk >= $min): ?>
                      <td>
                      <?php echo $v['Node']['title']; ?>
                      </td>
                      <?php endif; ?>
                      <?php endforeach; ?>
                  </tr>

                  <?php $j=0; foreach($email_compare as $key=>$v) { ?>
                  <?php if($v['show'] == 1) { $j++; ?>
                    <tr <?php if($j==2) { echo 'class="odd"'; $j=0; } ?>>
                      <td><?php echo $v['title']; ?></td>
                      <?php $xk=0; foreach($data as $v) : $xk++; ?>
                      <?php if($xk<=$max && $xk >= $min): ?>
                      <td>
                      <?php echo $v['Email'][$key]; ?>
                      </td>
                      <?php endif; ?>
                      <?php endforeach; ?>
                  </tr>
                  <?php } ?>
                  <?php } ?>
                  <tr class="special">
                    <td></td>
                    <?php $xk=0; foreach($data as $v) : $xk++; ?>
                      <?php if($xk<=$max && $xk >= $min): ?>
                      <td>
                      <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $v['Node']['id']; ?>" sl="" class="dangky btn btn-small btn-reg-ex2 bld" rel="nofollow">Đăng Ký</a>
                    </td>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </tr>
                  </table>
                <?php } ?>










            </div>
            <?php //} ?>
        </div>
    </div>
</div>

<div class="container-fluid product-extra product-extra-space" <?php echo 'style="background-image: url('.$this->App->t('extra-space-email-img').');"'; ?>>
<div class="row">
<div class="wrap-1200">
    <?php 
    echo $this->App->t('email-extra-space');
    echo $this->App->adm_link('lang', 'email-extra-space', 'editor');
    ?> 

    <?php echo $this->App->adm_link('lang', 'extra-space-email-img', 'image'); ?>
</div>
</div>
</div>

<div class="container-fluid product-extra product-extra3" id="t3">
    <div class="row">
        <div class="wrap-1200" <?php echo 'style="background-image: url('.$this->App->t('28').');"'; ?>>
        <h2><?php echo $this->App->t('gtdvhstg_cntem'); ?><?php echo $this->App->adm_link('lang', 'gtdvhstg_cntem'); ?></h2>
        <?php 
            $content = $this->App->t('gtdvhstg_cntemcnt');
            $content_arr = explode("\n", $content);
            echo $this->App->adm_link('lang', 'gtdvhstg_cntemcnt', 'textarea');
            ?>
            <?php if(count($content_arr) > 0) { ?>
            <ul>
            <?php foreach($content_arr as $v) { ?>
            <?php if(trim($v) != '') { ?>
            <li><?php echo $v; ?></li>
            <?php } ?>
            <?php } ?>
            </ul>
            <?php } else { ?>
            <ul>
              <li><?php echo $content; ?></li>
            </ul>
            <?php } ?>


            <?php echo $this->App->adm_link('lang', '28', 'image'); ?>
        </div>
    </div>
</div>




<script type="text/javascript">
    $('.modal-close').click(function() {
      $('.modal').modal('hide');
    });
  </script>


  <script type="text/javascript">
    $('.product-item-detail').hover(function() {
        $('.product-item-detail').removeClass('active');
        $(this).addClass('active');
    });
</script>
<?php } ?>