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

<?php $cat2 = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $first_cat['Category']['id']); ?>

<?php if(!is_array($cat2) || count($cat2) <= 0) { ?>
<?php echo View::element('hosting_nosubcat', array('ids'=>$ids, 'first_cat'=>$first_cat, 'cat2'=>$cat2, 'cats'=>$cats)); ?>
<?php } else { ?>

<div class="container-fluid product-banner hidden-xs fixbackground-repon" <?php echo 'style="background-image: url('. $this->App->t('31').'); background-size: contain;"' ?>>
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

    <?php echo $this->App->adm_link('lang', '31', 'image'); ?>
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

<?php //$cat2 = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $first_cat['Category']['id']); ?>

<?php 
$c2_ids = array();
foreach($cat2 as $v)
{
  $c2_ids[] = $v['Category']['id'];
}

  if(!in_array($current_category['Category']['id'], $c2_ids))
  $first_tab = $cat2[0];
?>
<div class="container-fluid product-nbtab">
    <div class="row">
        <div class="wrap-1200">
          <ul>
            <?php $k=0; foreach($cat2 as $t) : $k++; ?>
            <li class="li-<?php echo $k==1 ? 'unix ' : 'win'; ?>">
                <div class="li-tab <?php if($t['Category']['id']==$first_tab['Category']['id']) echo 'selected'; ?>">
                  <div class="icon" style="background-image: url('<?php echo DOMAIN . $t["Category"]["image"]; ?>')"></div>
                  <a href="#" class="tab<?php echo $k; ?> 
                    <?php echo $k==1 ? 'unix ' : 'win'; ?> <?php if($k==1) echo 'selected'; ?>" rel="tab<?php echo $k; ?>" title="<?php echo $t['Node']['title']; ?>">
                    <span><?php echo $t['Node']['title']; ?></span>
                  </a>
                </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
    </div>
</div> 

<?php
// pr($first_cat);$category_id, $table = 'news', $alias = 'News', $catfield = 'category_id', $limit = 8)
  $data = $this->requestAction(DOMAIN . 'default/node/get_dynamic_rows/' . $first_cat['Category']['id'] . '/hostings/Hosting/hosting_category/30');
  // pr($data);
?>

<div class="container-fluid product-list">
    <div class="row">
        <div class="wrap-1200">
            <?php $k=0; foreach($cat2 as $t) { $k++; ?>
            <div id="product-tab<?php echo $k; ?>" class="product-list-tab <?php if($k>1) echo 'hide'; ?>">
                <?php $n=count($data); $i=-1; foreach($data as $v) { $i++; ?>
                <?php if($v['Hosting']['hosting_category'] == $t['Category']['id']) { ?>
                <?php ?>
                <div class="product-item col-sm-3" id="p-<?php echo $v['Node']['id']; ?>">
                    <div class="product-item-detail <?php if($v['Hosting']['featured'] == 1) echo 'active'; ?>">
                      <div class="product-price">
                      <span>Chỉ với</span> <?php echo number_format($v['Hosting']['price5y']); ?> <span><strong>đ/tháng</strong></span>
                      </div>
                      <div class="product-package">
                          <h2 class="pkg-<?php echo $v['Node']['id']; ?>"><?php echo $v['Node']['title']; ?></h2>
                      </div>
                      <div class="product-info">
                          <div class="row_item HDD">
                            Dung lượng              
                            <span><?php echo $v['Hosting']['space']; ?></span>
                          </div>
                          <div class="row_item bangthong">
                            Băng thông              
                            <span><?php echo $v['Hosting']['banwidth']; ?></span>
                          </div>
                          <div class="row_item email">
                            Địa chỉ Email      
                            <span><?php echo $v['Hosting']['email']; ?></span>
                          </div>
                          <div class="row_item ftp">
                            Tài khoản FTP              
                            <span><?php echo $v['Hosting']['ftp']; ?></span>
                          </div>
                          <div class="row_item mysql">
                            <?php if($v['Hosting']['mysql'] != '') : ?>
                              MySQL              
                              <span><?php echo $v['Hosting']['mysql']; ?></span>
                            <?php endif; ?>
                            <?php if($v['Hosting']['mssql'] != '') : ?>
                              MSSQL              
                              <span><?php echo $v['Hosting']['mssql']; ?></span>
                            <?php endif; ?>
                          </div>
                      </div>
                      <div class="product-times" id="pkg-<?php echo $v['Node']['id']; ?>">
                            <span class="time-grand">Chọn gói thời gian</span>
                          <div class="hide" id="hide-pkg-<?php echo $v['Node']['id']; ?>">
                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="1 năm" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      1 năm <span><?php echo number_format($v['Hosting']['price']); ?> đ</span>/Tháng
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Hosting']['price']); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="2 năm" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      2 năm <span><?php echo number_format($v['Hosting']['price2y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Hosting']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Hosting']['price'] * 24;
                                      $p2 = $v['Hosting']['price2y'] * 24;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Hosting']['price2y'] * 24); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="3 năm" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      3 năm <span><?php echo number_format($v['Hosting']['price3y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Hosting']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Hosting']['price'] * 36;
                                      $p2 = $v['Hosting']['price3y'] * 36;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Hosting']['price3y'] * 36); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="4 năm" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      4 năm <span><?php echo number_format($v['Hosting']['price4y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Hosting']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Hosting']['price'] * 48;
                                      $p2 = $v['Hosting']['price4y'] * 48;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Hosting']['price4y'] * 48); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="col-sm-3 col-xs-12">
                                  <div class="package-item" rel="5 năm" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      5 năm <span><?php echo number_format($v['Hosting']['price5y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($v['Hosting']['price']); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $v['Hosting']['price'] * 60;
                                      $p2 = $v['Hosting']['price5y'] * 60;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Hosting']['price5y'] * 60); ?> đ
                                    </div>
                                  </div>
                              </div>

                              <div class="clearfix"></div>

                                <div class="package-extras">
                                <?php echo $this->App->t('hosting-plan-note'); ?>
                                <?php echo $this->App->adm_link('lang', 'hosting-plan-note', 'editor'); ?>
                                
                              </div>

                              <script type="text/javascript">
                                $('.package-item').click(function() {
                                  var pname = $(this).attr('rel');
                                  var pd = $(this).attr('data');

                                  var arr = pname.split(' ');
                                  var num = arr[0];

                                  // if(num == '1') return false;

                                  var y = 1;

                                  switch(num)
                                  {
                                    case '2':
                                      y=2;
                                      break;
                                    case '3':
                                      y=3;
                                      break;
                                    case '4':
                                      y=4;
                                      break;
                                    case '5':
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
                <?php } ?>
            </div>
            <?php } ?>
        </div>
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


<div class="container-fluid product-kttab">
    <div class="row">
        <div class="wrap-1200">
          <ul>
            <li class="active" id="kttab-t1"><a href="#t1"><?php echo $this->App->t('prdtdvbxhst'); ?></a></li>
            <li id="kttab-t2"><a href="#t2"><?php echo $this->App->t('prdtssdvhs'); ?></a></li>
            <li id="kttab-t3"><a href="#t3"><?php echo $this->App->t('gtdvhstg_cnths'); ?></a></li>
            <li class="last" id="kttab-t4"><a href="#t4"><?php echo $this->App->t('prdtdtmchs'); ?></a></li>
          </ul>
        </div>
    </div>
</div> 

<div class="container-fluid product-extra product-extra1" id="t1">
    <div class="row">
        <div class="wrap-1200">
            <h2><?php echo $this->App->t('prdtdvbxhst'); ?></h2>
        <?php 
            $content = $this->App->t('prdtdvbxhs');
            $content_arr = explode("\n", $content);
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
            <?php } 
            echo $this->App->adm_link('lang', 'prdtdvbxhs', 'textarea');
            ?>
          
        </div>
    </div>
</div> 


<?php 
  $hosting_compare = $settings['hosting-compare'];
  $hosting_compare = unserialize($hosting_compare);
?>
<div class="container-fluid product-extra product-extra2" id="t2">
    <div class="row">
        <div class="wrap-1200">
            <h2><?php echo $this->App->t('prdtssdvhs'); ?><?php echo $this->App->adm_link('lang', 'prdtssdvhs'); ?></h2>
            <?php $k=0; foreach($cat2 as $t) { $k++; ?>
            <div id="product-extra-tab<?php echo $k; ?>" class="product-extra-tab <?php if($k>1) echo 'hide'; ?>">
                <table cellpadding="1" cellspacing="1" class="tblss hidden-xs">
                  <tr class="odd">
                        <td style="text-align: left">Gói dịch vụ</td>
                        <?php foreach($data as $v) : ?>
                        <?php if($v['Hosting']['hosting_category'] == $t['Category']['id']) : ?>
                        <td>
                        <?php echo $v['Node']['title']; ?>
                        </td>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </tr>

                  <?php $j=0; foreach($hosting_compare as $key=>$v) { ?>
                  <?php if($v['show'] == 1) { $j++; ?>
                    <tr <?php if($j==2) { echo 'class="odd"'; $j=0; } ?>>
                      <td><?php echo $v['title']; ?></td>
                      <?php foreach($data as $v) : ?>
                      <?php if($v['Hosting']['hosting_category'] == $t['Category']['id']) : ?>
                      <td>
                      <?php echo $v['Hosting'][$key]; ?>
                      </td>
                      <?php endif; ?>
                      <?php endforeach; ?>
                  </tr>
                  <?php } ?>
                  <?php } ?>
        					<tr class="special">
        						<td></td>
        						<?php foreach($data as $v) : ?>
                    <?php if($v['Hosting']['hosting_category'] == $t['Category']['id']) : ?>
        						<td>
                    <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $v['Node']['id']; ?>" sl="" class="dangky btn btn-small btn-reg-ex2 bld" rel="nofollow">Đăng Ký</a>
                    </td>
        						<?php endif; ?>
        						<?php endforeach; ?>
        					</tr>
                </table>



                <?php 
                $i=0;
                $tbl_tag = 0;
                $n=ceil(count($data)/6);

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
                      <?php $xk=0; foreach($data as $v) : ?>
                    <?php if($v['Hosting']['hosting_category'] == $t['Category']['id']) : $xk++; ?>
                      <?php if($xk<=$max && $xk >= $min): ?>
                      <td>
                      <?php echo $v['Node']['title']; ?>
                      </td>
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php endforeach; ?>
                  </tr>




                  <?php $j=0; foreach($hosting_compare as $key=>$v) { ?>
                  <?php if($v['show'] == 1) { $j++; ?>
                    <tr <?php if($j==2) { echo 'class="odd"'; $j=0; } ?>>
                      <td><?php echo $v['title']; ?></td>
                      <?php $xk=0; foreach($data as $v) : ?>
                    <?php if($v['Hosting']['hosting_category'] == $t['Category']['id']) : $xk++; ?>
                      <?php if($xk<=$max && $xk >= $min): ?>
                      <td>
                      <?php echo $v['Hosting'][$key]; ?>
                      </td>
                      <?php endif; ?>
                      <?php endif; ?>
                      <?php endforeach; ?>
                  </tr>
                  <?php } ?>

                  <?php } ?>
                  <tr class="special">
                    <td></td>
                    <?php $xk=0; foreach($data as $v) : ?>
                    <?php if($v['Hosting']['hosting_category'] == $t['Category']['id']) : $xk++; ?>
                      <?php if($xk<=$max && $xk >= $min): ?>
                      <td>
                      <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $v['Node']['id']; ?>" sl="" class="dangky btn btn-small btn-reg-ex2 bld" rel="nofollow">Đăng Ký</a>
                    </td>
                      <?php endif; ?>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  </tr>
                  </table>
                <?php } ?>


            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="container-fluid product-extra product-extra-space" <?php echo 'style="background-image: url('.$this->App->t('extra-space-hosting-img').');"'; ?>>
<div class="row">
<div class="wrap-1200">
    <?php 
    echo $this->App->t('hosting-extra-space');
    echo $this->App->adm_link('lang', 'hosting-extra-space', 'editor');
    ?> 

    <?php echo $this->App->adm_link('lang', 'extra-space-hosting-img', 'image'); ?>
</div>
</div>
</div>

<div class="container-fluid product-extra product-extra3" id="t3">
    <div class="row">
        <div class="wrap-1200" <?php echo 'style="background-image: url('.$this->App->t('28').');"'; ?>>
        <h2><?php echo $this->App->t('gtdvhstg_cnths'); ?><?php echo $this->App->adm_link('lang', 'gtdvhstg_cnths'); ?></h2>
        <?php 
            $content = $this->App->t('gtdvhstg_cnthscnt');
            $content_arr = explode("\n", $content);
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
            <?php  echo $this->App->adm_link('lang', 'gtdvhstg_cnthscnt', 'textarea'); ?>

        </div>
    </div>
    <?php echo $this->App->adm_link('lang', '28', 'image'); ?>
</div>

<div class="container-fluid product-extra product-extra4" id="t4">
    <div class="row">
        <div class="wrap-1200">
          <h2><?php echo $this->App->t('prdtdtmchs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmchs'); ?></h2>

          <div class="clearfix"></div>

          <div class="col-sm-6">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
              <?php echo $this->App->img($this->App->t('24'), $this->App->t('prdtdtmct1'), 72, 84); ?>
                  <?php echo $this->App->adm_link('lang', '24', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct1hs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmct1hs'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd1hs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd1hs', 'textarea'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 nomr">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
              <?php echo $this->App->img($this->App->t('25'), $this->App->t('prdtdtmct2'), 72, 84); ?>
                    <?php echo $this->App->adm_link('lang', '25', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct2hs'); ?><?php echo $this->App->t('lang', 'prdtdtmct2hs'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd2hs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd2hs', 'textarea'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
                  <?php echo $this->App->img($this->App->t('27'), $this->App->t('prdtdtmct3'), 72, 84); ?>
                  <?php echo $this->App->adm_link('lang', '27', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct3hs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmct3hs'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd3hs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd3hs', 'textarea'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 nomr">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
                  <?php echo $this->App->img($this->App->t('26'), $this->App->t('prdtdtmct4'), 72, 84); ?>
                  <?php echo $this->App->adm_link('lang', '26', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct4hs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmct4hs'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd4hs'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd4hs', 'textarea'); ?></p>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid page-content page-end product-extra5" id="t5">
<div class="row">
    <div class="wrap-1200">
      <h2><?php echo $this->App->t('dtkhachs'); ?><?php echo $this->App->adm_link('lang', 'dtkhachs'); ?></h2>

      <!-- <div class="clearfix"></div> -->

      <?php 
            $content = $this->App->t('dtkhac_cnths');
            echo $content;
            echo $this->App->adm_link('lang', 'dtkhac_cnths', 'editor'); /*
            $content_arr = explode("\n", $content);
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
            <?php } */ ?>

            <?php echo $this->App->adm_link('lang', 'dtkhac_cnths', 'textarea'); ?>
    </div>
</div>
</div>

<script type="text/javascript">
  var m_ac_id  = $('.banner-menu li.selected').attr('rel');
  m_ac_id  = m_ac_id - 1;
  $('.mmmenu' + m_ac_id).addClass('removeaftercontent');


  $('.li-tab').click(function() {
    var tab = $(this).find('a').attr('rel');

    $('.li-tab').removeClass('selected');
    $(this).addClass('selected');

    var ptab = $('#product-' + tab);
    var sstab = $('#product-extra-' + tab);

    $('.product-list-tab').addClass('hide');
    $(ptab).removeClass('hide');

    $('.product-extra-tab').addClass('hide');
    $(sstab).removeClass('hide');

    return false;
  });

  $('.product-kttab li a').click(function() {
    var tab = $(this).attr('href');
    var tt = $(tab).offset().top;

    $('body, html').animate({scrollTop: tt}, 1000);
    return false;
  });
</script>

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


<script type="text/javascript">
  var tabtop = $(".product-kttab").offset().top;

  function scrolltab()
  {
    var sctop = $('body').scrollTop();

    if((sctop - tabtop) >= -40)
    {
      $('.product-kttab').addClass('fixed-top');
      $('.banner').removeClass('fixed-top');
    }
    else
    {
      if(sctop > 40)
        $('.banner').addClass('fixed-top');
      else
        $('.banner').removeClass('fixed-top');

     $('.product-kttab').removeClass('fixed-top'); 
    }
  }

  $('.product-extra').on('scrollSpy:enter', function() {
    var id = $(this).attr('id');
    $('.product-kttab li').removeClass('active');
    $('#kttab-' + id).addClass('active');
  });

  // $('.product-extra').on('scrollSpy:exit', function() {
  //   console.log('exit:', $(this).attr('id'));
  //   var id = $(this).attr('id');
  //   $('.product-kttab li').removeClass('active');
  //   $('#kttab-' + id).addClass('active');
  // });

    $('.product-extra').scrollSpy();
scrolltab();

  $(window).scroll(function() {
    scrolltab();
  });
</script>
<?php } ?>