<?php
$link_dangky = DOMAIN . 'dang-ky-ten-mien.html';
?>

<?php $domain_list_all = $this->requestAction(DOMAIN . 'default/node/getdomain/1'); ?>
<?php $domain_list = $this->requestAction(DOMAIN . 'default/node/getdomain'); ?>

<?php echo View::element('searchbox_domain'); ?>

<div class="container-fluid page-content page-end">
    <div class="row">
        <div class="wrap-1100">
          <div class="post post-domain">
          <div>
              <?php echo $this->App->t('tenmien_mota'); ?>
              <?php echo $this->App->adm_link('lang', 'tenmien_mota', 'editor'); ?>
          </div>

          <div id="domain-tbl">
<table border="0" cellpadding="0" cellspacing="1" class="domain">
	<tbody>
	<tr class="titlerow">
    	<td width="20%"><div class="fl data-pa data-attr-content_1000 data-attr-content_600" data-content_1000="Bảng Giá" data-content_600="Giá"><span>Tên miền Việt Nam</span></div></td>
        <td width="20%" class="tc setupfee">Phí khởi tạo</td>
        <td width="20%" class="tc">Phí duy trì /năm</td>
        <td width="20%" class="tc transfer">Transfer</td>
        <td width="20%"></td>
    </tr>

<?php foreach($domain_list_all as $v) : ?>
	<tr>
    	<td class="top_td" valign="middle" style="line-height:175%">		
        	<span id="vn"><?php echo $v['Node']['title']; ?></span>        
        </td>
        <td class="tc top_td setupfee" valign="middle">
            <div>
            <?php
            $createprice = 'Miễn phí';
            if($v['Domain']['price_create'] > 0)
                $createprice = number_format($v['Domain']['price_create']) . '<sup>đ</sup>';
            ?>
			<?php echo $createprice; ?>
            </div>
        </td>
        <td valign="middle" class="tc top_td setupfee">
        	<div style=" ">
			<?php echo number_format($v['Domain']['price_renew']); ?><sup>đ</sup>
            </div>
        </td>
        <td valign="middle" class="tc top_td setupfee">
        	<?php if($v['Domain']['price_transfer'] != 0) : ?>
        	<?php echo number_format($v['Domain']['price_renew']); ?><sup>đ</sup>	
        	<?php else : ?>
        	Miễn phí   
        	<?php endif; ?>     
        </td>
        <td valign="middle" class="tc top_td setupfee">
        	<a rel="nofollow" href="<?php echo $link_dangky . '?e=' . $v['Node']['title']; ?>" title="Đăng Ký" class="button1 boxshadow3 dangky bld small">
			Đăng Ký
			</a>
        </td>
    </tr>
   <?php endforeach; ?>
</tbody></table>
</div>



          <div>
              <?php echo $this->App->t('tenmien_mota2'); ?>
              <?php echo $this->App->adm_link('lang', 'tenmien_mota2', 'editor'); ?>
          </div>

          </div>
        </div>
    </div>
</div>


<?php echo View::element('nav-footer'); ?>