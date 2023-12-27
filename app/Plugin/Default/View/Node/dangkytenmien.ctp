<?php $domain_list_all = $this->requestAction(DOMAIN . 'default/node/getdomain/1'); ?>


<div class="container-fluid searchbar">
    <div class="row">
        <div class="wrap-1100">
            <div class="col-sm-7">
                <form action="<?php DOMAIN; ?>/whois-domain" method="get" class="searchdomainfrm">
                    <input type="text" name="search_key" class="search_key" placeholder="Nhập tên miền phù hợp với bạn" />
                    <button class="search_btn">Kiểm tra</button>
                </form>
            </div>
            <div class="col-sm-5">
                <?php if(count($domain_list_all) >0) : ?>
                <a href="#" class="jcarousel-control-prev" data-jcarouselcontrol="true"></a>
                <div class="jcarousel max4">
                    <ul>
                    <?php foreach($domain_list_all as $v) : ?>
                    <li>
                    <a href="#" title="<?php echo $v['Node']['title']; ?>">
                            <span class="extends"><?php echo $v['Node']['title']; ?> </span>
                          </a>  
                  
                          <div class="clearfix"></div>
                          <a href="#" title="<?php echo $v['Node']['title']; ?> <?php echo $v['Domain']['price_create']; ?>"><?php echo number_format($v['Domain']['price_create']); ?></a>  VNĐ
                    </li>
                  <?php endforeach; ?>
                    </ul>
                </div>
                <a href="#" class="jcarousel-control-next" data-jcarouselcontrol="true"></a>
            <?php endif; ?>

            <script type="text/javascript">
                $('.jcarousel').jcarousel({
                    vertical: false
                }).jcarouselAutoscroll({
                    interval: 3000,
                    target: '+=1',
                    autostart: true
                });
            </script>
            </div>
        </div>
    </div>
</div> 


<div class="container-fluid page-content page-end">
    <div class="row">
        <div class="wrap-1100">
          <div class="post">


<table border="0" cellpadding="0" cellspacing="0" width="100%" class="domain hidden-xs">
  <tr class="circle">
    <td width="25%">
      <div class="round"><span>1</span></div>
      <h1><?php echo $this->App->t('chkdminp'); ?><?php echo $this->App->adm_link('lang', 'chkdminp'); ?></h1>
    </td>
    <td width="50%">
      <div class="round"><span>2</span></div>
      <h1 class="circle"><?php echo $this->App->t('chkdmexy'); ?><?php echo $this->App->adm_link('lang', 'chkdmexy'); ?></h1>
    </td>
    <td width="25%">
    <div class="fr">
      <div class="round"><span>3</span></div>
      <h1><?php echo $this->App->t('chkdmktr'); ?><?php echo $this->App->adm_link('lang', 'chkdmktr'); ?></h1>
    </div>
    </td>
  </tr>
</table>



<div class="clearfix"></div>

  <div class="col-sm-3 nhapdanhsach">
        <textarea placeholder="Nhập danh sách Tên miền" required="required" name="d" class="listdomain" rows="5"></textarea>
        <div class="clearfix"></div>
        <span class="text-gray">
          <?php echo $this->App->t('chkdmntd'); ?>
          <?php echo $this->App->adm_link('lang', 'chkdmntd'); ?>
        </span>
    </div>
    <div class="col-sm-9">   
        <div id="tabs" class="ui-tabs">
        <?php foreach($domain_list_all as $v) : ?>
          <label class="fl tld" style="width:20%;margin:8px 0px;white-space: nowrap;">
              <input type="checkbox" name="ext[]" class="ext" <?php if(isset($_GET['e']) && $_GET['e'] == $v['Node']['title']) echo 'checked="checked"'; ?> value="<?php echo trim($v['Node']['title'], ' ,.'); ?>"> <?php echo $v['Node']['title']; ?>
            </label>
        <?php endforeach; ?>
        </div>
  <div class="clearfix"></div>
    <input type="submit" name="submit_check" value="Kiểm Tra" class="btn btn-pd checkdomain">   
    </div> 
    

<div class="clearfix fixmarginbottom"></div>


  <script type="text/javascript">
  $('.checkdomain').click(function() {
      var name = $('.listdomain').val();
      var ext = new Array();

      $('.ext').each(function() {
          if($(this).is(':checked'))
              ext.push($(this).val());
      });

      if(name == '' || ext.length == 0)
      {
          alert('Bạn chưa nhập tên miền hoặc chưa chọn tên miền mở rộng'); return;
      }

      var url = "<?php echo DOMAIN; ?>whois-domain/?d=" + name + "&e=" + ext.join(',');
      document.location.href = url;
  });
</script>



          </div>
        </div>
    </div>
</div> 

<?php echo View::element('nav-footer'); ?>