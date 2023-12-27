<?php $domain_list_all = $this->requestAction(DOMAIN . 'default/node/getdomain/1'); ?>
<?php $domain_list = $this->requestAction(DOMAIN . 'default/node/getdomain'); ?>


<?php
$data_domain_arr = array();
$str_kq = '';

foreach($domain_list_all as $v)
{
  $data_domain_arr[$v['Node']['title']] = $v;
}
// print_r($data_domain_arr);
if(isset($_GET['d']) && isset($_GET['e']))
{
    $dm = explode(',', $_GET['d']);
    $e = explode(',', $_GET['e']);

    $d = array();
    foreach($dm as $v)
    {
      if(preg_match('/\./', $v))
      {
        $b = explode('.', $v);
        $d[] = $b[0];
      }
      else
      {
        $d[] = $v;
      }
    }

    $domain = array();
    foreach($d as $v)
    {
        foreach($e as $val)
            $domain[] = trim($v, ' ,.') . '.' . trim($val, ' ,.');
    }

    $return = array();
    $str = '<table cellpadding="0" cellspacing="1" border="0">';
    $str .= '<tr class="h">
        <td>Tên miền</td>
        <td>Trạng thái</td>
    </tr>';

    $i=0;
    $data_arr = array();
    foreach($domain as $v)
    {
        $i++;
        $kq = file_get_contents("http://www.whois.net.vn/whois.php?domain=".$v);
        $kq = preg_replace('/[^0-9]/', '', $kq);
        $ex = explode('.', $v);
        unset($ex[0]);
        $ext = implode('.', $ex);

        switch ($kq) {
            case 0:
                $data_arr[$v]['txt'] = "Bạn có thể đăng ký tên miền này";
                $data_arr[$v]['status'] = "available";
                break;
            case 1:
                $data_arr[$v]['txt'] = "Tên miền này đã được đăng ký.";
                $data_arr[$v]['status'] = "unavailable";
                break;
            default:
                $data_arr[$v]['txt'] = "Phần mở rộng bạn nhập không đúng";
                $data_arr[$v]['status'] = "unavailable";
                break;
        }
        $data_arr[$v]['ext'] = $ext;

        $odd = 'odd';
   
        if($i%2==0) 
            $odd = 'even';

        $str .= '<tr class="'.$odd.'">
            <td>'. $v .'</td>
            <td>'.$str_kq.'</td>
        </tr>';
    }

    $str .= '</table>';
}

?>

<?php echo View::element('searchbox_domain'); ?>


<div class="container-fluid page-content page-end page-whois">
    <div class="row">
        <div class="wrap-1100">
          <div class="post">
            <h2 class="title"><?php echo $this->App->t('chkdm'); ?><?php echo $this->App->adm_link('lang', 'chkdm'); ?></h2>
            <p style="margin: 0px;"><?php echo $this->App->t('chkdm_des'); ?><?php echo $this->App->adm_link('lang', 'chkdm_des', 'textarea'); ?></p>              

            <div class="ketqua">
              <table class="ketqua-list" cellspacing="1">
              <?php $stt=0; foreach($data_arr as $k=>$v) : $stt++; ?>
              <tr>
                <td><span class="<?php echo $v['status']; ?>"><?php echo $k; ?></span></td>
                <td>
                    <?php if($v['status'] == 'available') : ?>
                    <a href="<?php echo DOMAIN; ?>cart/add/<?php echo substr(md5($k), 0, 15) . rand(0,100); ?>?domain=<?php echo $k; ?>" class="fr <?php echo $v['status']; ?>">Đăng ký</a> 
                    <?php endif; ?>
                </td>
              </tr>
              <?php endforeach; ?>
              </table>
            </div>




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
          <?php echo $this->App->t('chkdmntd'); ?><?php echo $this->App->adm_link('lang', 'chkdmntd', 'textarea'); ?>
        </span>
    </div>
    <div class="col-sm-9">   
        <div id="tabs" class="ui-tabs">
        <?php foreach($domain_list_all as $v) : ?>
          <label class="fl tld" style="width:20%;margin:8px 0px;white-space: nowrap;">
              <input type="checkbox" name="ext[]" class="ext" checked="checked" value="<?php echo trim($v['Node']['title'], ' ,.'); ?>"> <?php echo $v['Node']['title']; ?>
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


