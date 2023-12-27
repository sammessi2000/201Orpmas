<?php
$rootID = $this->requestAction('/default/node/find_root_category/' . $current_category['Category']['id']);
$rootData = $this->requestAction('/default/node/get_category/' . $rootID);
$child = $this->requestAction('/default/node/get_child_category_of/' . $rootID);
?>
<?php /*
<div class="sidebar-left">
    <div class="sbleft-cata">
        <h2 class="uk-text-uppercase">
            <?php echo $this->App->t('title', $rootData['Node']); ?>
        </h2>
        <ul uk-accordion>
            <?php if(is_array($child) && count($child) > 0) { ?>
            <?php $i=0; foreach($child as $v) { $i++; ?>
            <?php 
                $link = DOMAIN . $lang_txt_link . $v['Node']['slug'] . '.html'; 
                if($v['Category']['type'] == 'link_inline')
                {
                    $node = $this->requestAction(DOMAIN . 'default/node/get_node/' . $v['Category']['link_inline']);
                    if(is_array($node) && count($node) > 0)
                        $link = DOMAIN . $lang_txt_link . $node['Node']['slug'] . '.html';
                    else
                        $link = DOMAIN . $lang_txt_link;
                }
                
                if($v['Category']['type'] == 'link')
                {
                    $link = $v['Category']['link'];       
                }
            ?>
                <?php  //pr($check); ?>
            <li>
                <a class="uk-accordion-title2" href="<?php echo $link; ?>"><?php echo $this->App->t('title', $v['Node']); ?></a>
            </li>
            <?php } ?>
            <?php } ?>
        </ul>
    </div>
</div>
*/ ?>
<div class="sidebar-box">
    <div class="sidebar">
        <div class="popular-courses">
            <h4><?php echo $this->App->t_a('general_text_22'); ?></h4>
            <?php if (is_array($this->data['related']) && count($this->data['related']) > 0) {
                $i = 0;
                foreach ($this->data['related'] as $v) {
                    $i++; ?>
                    <?php if ($i > 10) break; ?>
                    <div class="lastest-course-item">
                        <a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo  $this->App->t('title', $v['Node']); ?>">
                            <div class="lc-item-img in-line">
                                <img class="lazy" src="<?php echo BLANK_IMAGE; ?>" data-src="<?php echo DOMAIN . $v['News']['image']; ?>" alt="new-articles">
                            </div>
                        </a>
                        <div class="lc-item-content">
                            <h4><a href="<?php echo $this->App->get_node_link($v); ?>" title="<?php echo  $this->App->t('title', $v['Node']); ?>">
                                    <?php echo  $this->App->t('title', $v['Node']); ?>
                                </a>
                            </h4>
                            <p class="lc-date"><?php echo date('d/m/Y', $v['Node']['created']); ?></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>