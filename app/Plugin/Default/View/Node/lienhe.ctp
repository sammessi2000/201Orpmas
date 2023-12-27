<?php echo View::element('searchbox_domain'); ?>   

<div class="container-fluid page-content">
    <div class="row">
        <div class="wrap-1200">
          <div class="col-sm-6 np">
            <div class="contact-title"><?php echo$this->App->t('cntact_page_title'); ?></div>
            <div class="contact-content">
                <h2><?php echo$this->App->t('cntact_cnpb_title'); ?>:</h2>
                <?php 
                $content =$this->App->t('cntact_cnpb_cnt');
                $content_arr = explode("\n", $content);
                ?>
                <?php if(count($content_arr) > 0) { ?>
                <?php foreach($content_arr as $v) { ?>
                <?php if(trim($v) != '') { ?>
                <p class="add_contact"><?php echo $v; ?></p>
                <?php } ?>
                <?php } ?>
                <?php } else { ?>
                  <p class="add_contact"><?php echo $content; ?></p>
                <?php } ?> 
                <?php echo $this->App->adm_link('lang', 'cntact_cnpb_cnt', 'textarea'); ?>
              <?php 
                    $content =$this->App->t('cntact_cnpb_phone');
                    $content_arr = explode("\n", $content);
                    ?>
                    <?php if(count($content_arr) > 0) { ?>
                    <?php foreach($content_arr as $v) { ?>
                    <?php if(trim($v) != '') { ?>
                    <p class="phone_contact"><?php echo $v; ?></p>
                    <?php } ?>
                    <?php } ?>
                    <?php } else { ?>
                      <p class="phone_contact"><?php echo $content; ?></p>
                    <?php } ?>    
              <?php echo$this->App->t('lang', 'cntact_cnpb_phone', 'textarea'); ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="contact-title"><?php echo$this->App->t('cntact_page_title'); ?></div>
            <div class="contact-content">
                  <h2><?php echo$this->App->t('cntact_cnpn_title'); ?></h2>
                  <?php 
                      $content =$this->App->t('cntact_cnpn_cnt');
                      $content_arr = explode("\n", $content);
                      ?>
                      <?php if(count($content_arr) > 0) { ?>
                      <?php foreach($content_arr as $v) { ?>
                      <?php if(trim($v) != '') { ?>
                      <p class="add_contact"><?php echo $v; ?></p>
                      <?php } ?>
                      <?php } ?>
                      <?php } else { ?>
                        <p class="add_contact"><?php echo $content; ?></p>
                      <?php } ?>    
                <?php echo$this->App->adm_link('lang', 'cntact_cnpn_cnt', 'textarea'); ?>
                <?php 
                      $content =$this->App->t('cntact_cnpn_phone');
                      $content_arr = explode("\n", $content);
                      ?>
                      <?php if(count($content_arr) > 0) { ?>
                      <?php foreach($content_arr as $v) { ?>
                      <?php if(trim($v) != '') { ?>
                      <p class="phone_contact"><?php echo $v; ?></p>
                      <?php } ?>
                      <?php } ?>
                      <?php } else { ?>
                        <p class="phone_contact"><?php echo $content; ?></p>
                      <?php } ?>    
                <?php echo $this->App->adm_link('lang', 'cntact_cnpn_phone', 'textarea'); ?>
            </div>
          </div>
        </div>
    </div>
</div>  

<div class="container-fluid page-content page-end">
    <div class="row">
        <div class="wrap-1200">
            <div class="thongtinht"><?php echo$this->App->t('cntact_ttht_title'); ?></div>

            <div class="clearfix"></div>

            <div class="col-sm-6 np">
              <div class="dvkh-title"><?php echo$this->App->t('cntact_kt_title'); ?></div>
              <div class="dvkh-content">
                <ul>
                <?php 
                  $content =$this->App->t('cntact_kt_cnt');
                  $content_arr = explode("\n", $content);
                  echo $this->App->adm_link('lang', 'cntact_dvkh_cnt', 'textarea');
                  ?>
                  <?php if(count($content_arr) > 0) { ?>
                  <?php foreach($content_arr as $v) { ?>
                  <?php if(trim($v) != '') { ?>
                  <li><?php echo $v; ?></li>
                  <?php } ?>
                  <?php } ?>
                  <?php } else { ?>
                    <li><?php echo $content; ?></li>
                  <?php } ?>
              </ul>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="dvkh-title"><?php echo$this->App->t('cntact_dvkh_title'); ?></div>
              <div class="dvkh-content">
                  <ul>
                 <?php 
                  $content =$this->App->t('cntact_dvkh_cnt');
                  $content_arr = explode("\n", $content);
                  echo $this->App->adm_link('lang', 'cntact_dvkh_cnt', 'textarea');
                  ?>
                  <?php if(count($content_arr) > 0) { ?>
                  <?php foreach($content_arr as $v) { ?>
                  <?php if(trim($v) != '') { ?>
                  <li><?php echo $v; ?></li>
                  <?php } ?>
                  <?php } ?>
                  <?php } else { ?>
                    <li><?php echo $content; ?></li>
                  <?php } ?>
              </ul>
              </div>
            </div>

            <div class="col-sm-12 contact-bottom">
            <?php echo nl2br($this->App->t('cntact_bottom')); ?>
            </div>
        </div>
    </div>
</div>  
