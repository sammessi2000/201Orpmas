<?php 
    $hotline = $this->App->t('hotline');
    $hotline_number = preg_replace('/[^0-9]/', '', $hotline);
?>    

<div class="uk-container uk-container-center">
        <header>
            <div class="uk-flex uk-flex-between">
                <div class="logo">
                    <a href="<?php echo DOMAIN; ?>home">
                        <img src="<?php echo DOMAIN . $this->App->t('logo', '', 'vi'); ?>" />
                    </a>
                    <?php echo $this->App->adm_link('lang', 'logo', 'image'); ?>
                </div>
                <div class="h-right">
                    <div class="line-regit uk-margin-bottom">
                        <div class="uk-flex uk-flex-right uk-flex-middle">
                            <div class="phone uk-flex uk-flex-middle uk-animation-toggle" tabindex="0">
                                <i class="fa fa-phone uk-animation-shake"></i>
                                <div class="uk-margin-small-left">
                                    <div class="white">
                                        <b>HOTLINE 24/7</b>
                                    </div>
                                    <div>
                                        <a href="tel:<?php echo $hotline_number; ?>" title="">
                                            <?php echo $hotline; ?>
                                        </a>
                                        <?php echo $this->App->adm_link('lang', 'hotline'); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-right">
                        <div class="main-menu">
                            <ul>
                                <li class="active">
                                    <a href="<?php echo DOMAIN; ?>home" title=""><?php echo $this->App->t('home'); ?></a>
                                    <?php echo $this->App->adm_link('lang', 'home'); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section id="index-intro">
            <div class="intro-pro">
                <div class="list-home-pro uk-grid-small" uk-grid>
                    <?php if(is_array($categories_intro) && count($categories_intro) > 0) { ?>
                    <?php $i=0; foreach($categories_intro as $v) { $i++; ?>
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

                        $s = 'w-1-4 uk-width-1-2@s uk-width-1-4@m';
                        $w = 260;
                        $h = 200;

                        if($i==5)
                        {
                            $s = 'w-1-4 uk-width-1-2@m';
                            $w = 537;
                        }
                    ?>
                    <div class="<?php echo $s; ?>">
                        <div class="bo-product">
                            <figure>
                                <a href="<?php echo $link; ?>" title="">
                                    <?php echo $this->App->img($v['Category']['image'], $v['Node']['title'], $w, $h); ?>
                                </a>
                            </figure>
                            <h3 class="uk-text-truncate">
                                <a href="<?php echo $link; ?>" title="">
                                    <?php echo $this->App->t('title', $v['Node']); ?>
                                </a>
                            </h3>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    </div>



    <div class="ft-fixed">
    <footer>
        <div class="uk-container uk-container-center">
            <div class="uk-flex uk-flex-between uk-flex-middle uk-text-uppercase">
                <div class="copyright uk-text-uppercase">
                    Copyright 2019 <a href="<?php echo DOMAIN; ?>" title="">Mofit</a>. All Rights Reserved
                </div>
                <div class="ft-social uk-margin-left">
                    <span>FOLLOW US</span>
                    <a href="<?php echo $settings['facebook']; ?>" title="Facebook">
                        <i class="fa fa-facebook-f"></i>
                    </a>
                    <a href="<?php echo $settings['twitter']; ?>" title="Twitter">
                        <i class="fa fa-twitter"></i>
                    </a>
                    <a href="<?php echo $settings['youtube']; ?>" title="Youtube">
                        <i class="fa fa-youtube-square"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <div class="end-ft-intro">
        <div class="uk-container uk-container-center">
            <div class="uk-grid-small uk-flex-middle" uk-grid>
                <div class="uk-width-2-5@m">
                    <div class="uk-text-uppercase white">
                        <a href="" title=""><?php echo $this->App->t('company_name'); ?><?php echo $this->App->adm_link('lang', 'company_name'); ?></a>
                    </div>
                </div>
                <div class="uk-width-3-5@m">
                    <ul class="uk-flex uk-flex-right white">
                        <li>
                            <div class="uk-flex uk-flex-middle uk-text-uppercase">
                                <img src="<?php echo DOMAIN; ?>theme/default/images/intro/ft1.png" alt="">
                                <div>
                                    <?php echo nl2br($this->App->t('mpgh')); ?><?php echo $this->App->adm_link('lang', 'mpgh'); ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-flex-middle uk-text-uppercase">
                                <img src="<?php echo DOMAIN; ?>theme/default/images/intro/ft2.png" alt="">
                                <div>
                                    <?php echo nl2br($this->App->t('dvnn')); ?><?php echo $this->App->adm_link('lang', 'dvnn'); ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-flex-middle uk-text-uppercase">
                                <img src="<?php echo DOMAIN; ?>theme/default/images/intro/ft3.png" alt="">
                                <div>
                                    <?php echo nl2br($this->App->t('ckch')); ?><?php echo $this->App->adm_link('lang', 'ckch'); ?>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="uk-flex uk-flex-middle uk-text-uppercase">
                                <img src="<?php echo DOMAIN; ?>theme/default/images/intro/ft4.png" alt="">
                                <div>
                                    <?php echo nl2br($this->App->t('bhtn')); ?><?php echo $this->App->adm_link('lang', 'bhtn'); ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>