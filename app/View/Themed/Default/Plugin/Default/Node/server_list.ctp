<?php 
$catroot = $this->requestAction(DOMAIN . 'default/node/find_root_category/' . $current_category['Category']['id']);
$cats = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $catroot . '/server,colo');
$ids = array();

foreach($cats as $v)
{
  $ids[] = $v['Category']['id'];
} 
$first_cat = $current_category;

if(!in_array($current_category['Category']['id'], $ids))
  $first_cat = $cats[0];
?>
<?php $cat2 = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $first_cat['Category']['id'] . '/colo,server'); ?>

<?php 
// pr($ids);
// pr($first_cat);
// pr($cat2);  
// die;
?>

<?php if(is_array($cat2) && count($cat2) > 0) { ?>
<?php 
//pr($cat2); die; ?>
<?php echo View::element('server_subcat', array('ids'=>$ids, 'first_cat'=>$first_cat, 'cat2'=>$cat2, 'cats'=>$cats)); ?>
<?php } else { ?>

<div class="container-fluid product-banner hidden-xs fixbackground-repon"  <?php echo 'style="background-image: url('. $this->App->t('18').'); background-size: contain;"' ?>>
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

    <?php echo $this->App->adm_link('lang', '18', 'image'); ?>
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
          <ul>
            <?php $k=0; foreach($cat2 as $t) : $k++; ?>
            <li class="li-<?php echo $k==1 ? 'unix ' : 'win'; ?>">
                <div class="li-tab">
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
  $data = $this->requestAction(DOMAIN . 'default/node/get_dynamic_rows/' . $first_cat['Category']['id'] . '/servers/Server/server_category/30');
?>

<div class="container-fluid product-list">
    <div class="row">
        <div class="wrap-1200">
            <div id="product-tab<?php //echo $k; ?>" class="product-list-tab <?php //if($k>1) echo 'hide'; ?>">
                <?php $n=count($data); $i=-1; foreach($data as $v) { $i++; ?>
                <?php ?>
                <div class="product-item col-sm-3" id="p-<?php echo $v['Node']['id']; ?>">
                    <div class="product-item-detail <?php if($v['Server']['featured'] == 1) echo 'active'; ?>">
                      <div class="product-price">
                      <span>Chỉ với</span> <?php echo number_format($v['Server']['price5y']); ?> <span><strong>đ/tháng</strong></span>
                      </div>
                      <div class="product-package">
                      <h2 class="pkg-<?php echo $v['Node']['id']; ?>"><?php echo $v['Node']['title']; ?></h2>
                      </div>
                      <div class="product-info">
                        <div class="row_item CPU">
                            CPU      
                            <span><?php echo $v['Server']['cpu']; ?></span>
                          </div>
                          <div class="row_item RAM">
                            RAM              
                            <span><?php echo $v['Server']['ram']; ?></span>
                          </div>
                          <div class="row_item HDD">
                            HDD              
                            <span><?php echo $v['Server']['hdd']; ?></span>
                          </div>
                          <div class="row_item bangthong">
                            Dữ liệu truyền              
                            <span><?php echo $v['Server']['bandwidth']; ?></span>
                          </div>
                          <div class="row_item bangthong">
                            WB Trong nước              
                            <span><?php echo $v['Server']['trongnc']; ?></span>
                          </div>
                          <div class="row_item bangthong">
                            WB Quốc tế              
                            <span><?php echo $v['Server']['qte']; ?></span>
                          </div>
                      </div>
                      <div class="product-times" id="pkg-<?php echo $v['Node']['id']; ?>">
                          	<span class="time-grand">Chọn gói thời gian</span>
                            <div class="hide" id="hide-pkg-<?php echo $v['Node']['id']; ?>">
	                          	<div class="col-sm-3 col-xs-12">
	                              	<div class="package-item" rel="1 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                    <?php
                                      $one_price = $v['Server']['price'] + $v['Server']['price_hide'];
                                    ?>
                                      1 tháng <span><?php echo number_format($one_price); ?> đ</span>/Tháng
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($one_price); ?> đ
                                    </div>
                                  </div>
	                          	</div>

	                          	<div class="col-sm-3 col-xs-12">
	                              	<div class="package-item" rel="3 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      3 tháng <span><?php echo number_format($v['Server']['price2y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($one_price); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $one_price * 3;
                                      $p2 = $v['Server']['price2y'] * 3;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Server']['price2y'] * 3); ?> đ
                                    </div>
                                  </div>
	                          	</div>

	                          	<div class="col-sm-3 col-xs-12">
	                              	<div class="package-item" rel="6 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      6 tháng <span><?php echo number_format($v['Server']['price3y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($one_price); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $one_price * 6;
                                      $p2 = $v['Server']['price3y'] * 6;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Server']['price3y'] * 6); ?> đ
                                    </div>
                                  </div>
	                          	</div>

	                          	<div class="col-sm-3 col-xs-12">
	                              	<div class="package-item" rel="12 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      12 tháng <span><?php echo number_format($v['Server']['price4y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($one_price); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $one_price * 12;
                                      $p2 = $v['Server']['price4y'] * 12;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Server']['price4y'] * 12); ?> đ
                                    </div>
                                  </div>
	                          	</div>

	                          	<div class="col-sm-3 col-xs-12">
	                              	<div class="package-item" rel="24 tháng" data="p-<?php echo $v['Node']['id']; ?>">
                                    <div class="package-price">
                                      24 tháng <span><?php echo number_format($v['Server']['price5y']); ?> đ</span>/Tháng
                                      <div class="clearfix"></div>
                                      <div class="price-off">
                                        <span><?php echo number_format($one_price); ?> đ</span>/Tháng
                                      </div>
                                      <div class="price-tietkiem">
                                      <?php
                                      $p1 = $one_price * 24;
                                      $p2 = $v['Server']['price5y'] * 24;
                                      $p3 = $p1-$p2;
                                      ?>
                                        Tiết kiệm: <span><?php echo number_format($p3); ?> đ</span>/Tháng
                                      </div>
                                    </div>
                                    <div class="package-total">
                                      Tổng: <?php echo number_format($v['Server']['price5y'] * 24); ?> đ
                                    </div>
                                  </div>
	                          	</div>

                          		<div class="clearfix"></div>

                              	<div class="package-extras">
                                <?php echo $this->App->t('server-plan-note'); ?>
                                <?php echo $this->App->adm_link('lang', 'server-plan-note', 'editor'); ?>
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
                <!--         <br />
                        <br /> -->
                        <a href="<?php echo DOMAIN; ?>tu-cau-hinh/?i=<?php echo $v['Node']['id']; ?>" sl="" class="tucauhinh bld" rel="nofollow"><span class="glyphicon glyphicon-cog"></span> Tự cấu hình</a>
                      </div>
                  </div>
                </div>
                <?php } ?>
            </div>
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

	$('.dangky').click(function() {
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

  $('.tucauhinh').click(function() {
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
            <li class="active" id="kttab-t1"><a href="#t1"><?php echo $this->App->t('prdtdvbx'); ?></a></li>
            <li id="kttab-t2"><a href="#t2"><?php echo $this->App->t('prdtssdv'); ?></a></li>
            <li id="kttab-t3"><a href="#t3"><?php echo $this->App->t('gtdvhstg_cntsvr'); ?></a></li>
            <li class="last" id="kttab-t4"><a href="#t4"><?php echo $this->App->t('prdtdtmc'); ?></a></li>
          </ul>
        </div>
    </div>
</div> 

<div class="container-fluid product-extra product-extra1" id="t1">
    <div class="row">
        <div class="wrap-1200">
            <h2><?php echo $this->App->t('prdtdvbx'); ?><?php echo $this->App->adm_link('lang', 'prdtdvbx'); ?></h2>
        <?php 
            $content = $this->App->t('prdtdvbx_cnt');
            $content_arr = explode("\n", $content);
            echo $this->App->adm_link('lang', 'prdtdvbx_cnt', 'textarea');
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
          
        </div>
    </div>
</div> 

<?php 
  $server_compare = $settings['server-compare'];
  $server_compare = unserialize($server_compare);
?>
<div class="container-fluid product-extra product-extra2" id="t2">
    <div class="row">
        <div class="wrap-1200">
            <h2><?php echo $this->App->t('prdtssdv'); ?><?php echo $this->App->adm_link('lang', 'prdtssdv'); ?></h2>
            <div id="product-extra-tab<?php //echo $k; ?>" class="product-extra-tab <?php //if($k>1) echo 'hide'; ?>">
                <?php //echo $this->App->t('bssdvds'); ?>    
                <table cellpadding="1" cellspacing="1" class="tblss  hidden-xs">
                    <tr class="odd">
                        <td style="text-align: left">Gói dịch vụ</td>
                        <?php foreach($data as $v) : ?>
                        <td>
                        <?php echo $v['Node']['title']; ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php $j=0; foreach($server_compare as $key=>$v) { ?>
                    <?php if($v['show'] == 1) { $j++; ?>
                    <tr <?php if($j==2) { echo 'class="odd"'; $j=0; } ?>>
                        <td><?php echo $v['title']; ?></td>
                        <?php foreach($data as $v) : ?>
                        <td>
                        <?php echo $v['Server'][$key]; ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php } ?>
                    <?php } ?>
                    <tr class="special">
                        <td></td>
                        <?php foreach($data as $v) : ?>
                        <?php //if($v->tab == $t->tab) : ?>
                        <td>
                        <a href="<?php echo DOMAIN; ?>cart/add/<?php echo $v['Node']['id']; ?>" sl="" class="dangky btn btn-small btn-reg-ex2 bld" rel="nofollow">Đăng Ký</a>
                        </td>
                        <?php //endif; ?>
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

                  <?php $j=0; foreach($server_compare as $key=>$v) { ?>
                  <?php if($v['show'] == 1) { $j++; ?>
                    <tr <?php if($j==2) { echo 'class="odd"'; $j=0; } ?>>
                      <td><?php echo $v['title']; ?></td>
                      <?php $xk=0; foreach($data as $v) : $xk++; ?>
                      <?php if($xk<=$max && $xk >= $min): ?>
                      <td>
                      <?php echo $v['Server'][$key]; ?>
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
        </div>
    </div>
</div>

<div class="container-fluid product-extra product-extra-space" <?php echo 'style="background-image: url('.$this->App->t('extra-space-server-img').');"'; ?>>
<div class="row">
<div class="wrap-1200">
    <?php 
    echo $this->App->t('server-extra-space');
    echo $this->App->adm_link('lang', 'server-extra-space', 'editor');
    ?> 

    <?php echo $this->App->adm_link('lang', 'extra-space-server-img', 'image'); ?>
</div>
</div>
</div>

<div class="container-fluid product-extra product-extra3" id="t3">
    <div class="row">
        <div class="wrap-1200" <?php echo 'style="background-image: url('.$this->App->t('19').');"'; ?>>
        <h2><?php echo $this->App->t('gtdvhstg_cntsvr'); ?><?php echo $this->App->adm_link('lang', 'gtdvhstg_cntsvr'); ?></h2>
        <?php 
            $content = $this->App->t('gtdvhstgsvr_cnt');
            $content_arr = explode("\n", $content);
            echo $this->App->adm_link('lang', 'gtdvhstgsvr_cnt', 'textarea');
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

            <?php echo $this->App->adm_link('lang', '19', 'image'); ?>
        </div>
    </div>
</div>

<div class="container-fluid product-extra product-extra4" id="t4">
    <div class="row">
        <div class="wrap-1200">
          <h2><?php echo $this->App->t('prdtdtmc'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmc'); ?></h2>

          <div class="clearfix"></div>

          <div class="col-sm-6">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
                  <?php echo $this->App->img($this->App->t('23'), $this->App->t('prdtdtmct1'), 72, 84); ?>
                  <?php echo $this->App->adm_link('lang', '23', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct1'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmct1'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd1'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd1', 'textarea'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 nomr">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
                  <?php echo $this->App->img($this->App->t('22'), $this->App->t('prdtdtmct2'), 72, 84); ?>
                  <?php echo $this->App->adm_link('lang', '22', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct2'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmct2'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd2'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd2', 'textarea'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
                  <?php echo $this->App->img($this->App->t('20'), $this->App->t('prdtdtmct3'), 72, 84); ?>
                  <?php echo $this->App->adm_link('lang', '20', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct3'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmct3'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd3'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd3', 'textarea'); ?></p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 nomr">
            <div class="dtmc-item">
              <div class="dtmctit col-sm-2">
                  <?php echo $this->App->img($this->App->t('21'), $this->App->t('prdtdtmct4'), 72, 84); ?>
                  <?php echo $this->App->adm_link('lang', '21', 'image'); ?>
              </div>
              <div class="dtmcdes col-sm-10">
                <strong><?php echo $this->App->t('prdtdtmct4'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmct4'); ?></strong>
                <p><?php echo $this->App->t('prdtdtmcd4'); ?><?php echo $this->App->adm_link('lang', 'prdtdtmcd4', 'textarea'); ?></p>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>

<div class="container-fluid page-content page-end product-extra5" id="t5">
<div class="row">
    <div class="wrap-1200">
      <h2><?php echo $this->App->t('dtkhac'); ?><?php echo $this->App->t('lang', 'dtkhac'); ?></h2>

      <!-- <div class="clearfix"></div> -->

      <div class="product-extra5-ul">
      <?php 
            $content = $this->App->t('dtkhac_cnt');
            echo $content;
            echo $this->App->adm_link('lang', 'dtkhac_cnt', 'editor'); 
            /*
            $content_arr = explode("\n", $content);
            echo $this->App->t('lang', 'dtkhac_cnt', 'textarea');
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
    </div>
    </div>
</div>
</div>

<script type="text/javascript">
  $('.li-tab a').click(function() {
    var tab = $(this).attr('rel');
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