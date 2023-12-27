<?php 
$catroot = $this->requestAction(DOMAIN . 'default/node/find_root_category/' . $current_category['Category']['id']);
$cats = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $catroot);
$ids = array();

foreach($cats as $v)
{
  $ids[] = $v['Category']['id'];
} 

$first_cat = $current_category;

// if(!in_array($current_category['Category']['id'], $ids))
//   $first_cat = $cats[0];
?>
<div class="container-fluid product-banner hidden-xs"  <?php echo 'style="background-image: url('. $this->App->t('32').');"' ?>>
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
  $data = $this->requestAction(DOMAIN . 'default/node/get_dynamic_rows/' . $first_cat['Category']['id'] . '/advs/Adv/adv_category/30');
?>

<div class="container-fluid product-list">
    <div class="row">
        <div class="wrap-1200">
        <?php $n=count($data); $i=-1; foreach($data as $v) { $i++; ?>
                <?php ?>
                <div class="product-item col-sm-3" id="p-<?php echo $v['Node']['id']; ?>">
                    <div class="product-item-detail <?php if($v['Adv']['featured'] == 1) echo 'active'; ?>">
                      <div class="product-price">
                      <span>Chỉ với</span> <?php echo number_format($v['Adv']['price5y']); ?> <span><strong>đ/tháng</strong></span>
                      </div>
                      <div class="product-package">
                      <h2 class="pkg-<?php echo $v['Node']['id']; ?>"><?php echo $v['Node']['title']; ?></h2>
                      </div>

                      <div class="product-info">
                          <div class="row_item noicon">
                            Số từ khóa              
                            <span><?php echo $v['Adv']['num']; ?></span>
                          </div>
                          <div class="row_item noicon">
                            Số mẫu quảng cáo      
                            <span><?php echo $v['Adv']['template']; ?></span>
                          </div>
                          <div class="row_item noicon">
                            Báo cáo             
                            <span><?php echo $v['Adv']['reports']; ?></span>
                          </div>
                      </div>
                </div>
            </div>
                <?php } ?>
        </div>
    </div>
</div> 


<div class="container-fluid product-extra product-extra2" id="t3">
    <div class="row">
        <div class="wrap-1200">
        <h2><?php echo $this->App->t('gtdvhstg_cntadv'); ?><?php echo $this->App->t('lang', 'gtdvhstg_cntadv'); ?></h2>
        <?php 
            $content = $this->App->t('gtdvhstg_adv');
            $content_arr = explode("\n", $content);
            echo $this->App->adm_link('lang', 'gtdvhstg_adv', 'textarea');
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

