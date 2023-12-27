<?php 
    $hotline = $this->App->t('hotline');
    $hotline_number = preg_replace('/[^0-9]/', '', $hotline);

    $banner_images = array();

    if(isset($banners_pass))
        $banner_images = $banners_pass;

    $user = array();

    if($this->Session->check('user'))
        $user = $this->Session->read('user');
?>    
<header uk-sticky>
        <div class="uk-container uk-container-center">
            <div class="h-pc uk-flex uk-flex-between">
                <div class="logo">
                    <a href="<?php echo DOMAIN; ?>home">
                        <img src="<?php echo DOMAIN . $this->App->t('logo', '', 'vi'); ?>" />
                    </a>
                    <?php echo $this->App->adm_link('lang', 'logo', 'image'); ?>
                </div>
                <div class="logo-fixed">
                    <a href="<?php echo DOMAIN; ?>home">
                        <img src="<?php echo DOMAIN . $this->App->t('logo-fixed', '', 'vi'); ?>" />
                    </a>
                    <?php echo $this->App->adm_link('lang', 'logo-fixed', 'image'); ?>
                </div>
                <div class="h-right">
                    <div class="line-regit uk-margin-bottom">
                        <div class="uk-flex uk-flex-right uk-flex-middle">
                            <div class="phone uk-margin-medium-right uk-flex uk-flex-middle uk-animation-toggle" tabindex="0">
                                <i class="fa fa-phone uk-animation-shake"></i>
                                <a href="tel:<?php echo $hotline_number; ?>" title="">
                                    <?php echo $hotline; ?>
                                </a>
                            </div>
                            <div class="regit uk-margin-medium-right">
                                <?php if(is_array($user) && count($user) > 0) { ?>
                                    <a href="#" title="" class="dn">Hi, <?php echo $user['fullname']; ?></a>
                                    <a href="<?php echo DOMAIN; ?>logout" title="">Logout</a>
                                <?php } else { ?>
                                    <img src="<?php echo DOMAIN; ?>theme/default/images/lock.png" alt="">
                                    <a href="#" uk-toggle="target: #dangnhap"  title="" class="dn"><?php echo $this->App->t('log'); ?></a>
                                    <?php echo $this->App->adm_link('lang', 'log'); ?>
                                    <img src="<?php echo DOMAIN; ?>theme/default/images/user.png" alt="">
                                    <a href="#" uk-toggle="target: #dangky"  title=""><?php echo $this->App->t('reg'); ?></a>
                                    <?php echo $this->App->adm_link('lang', 'reg'); ?>
                                <?php } ?>
                            </div>
                            <select name="" id="select-lang">
                                <option value="vi" <?php if($lang == 'vi') echo 'selected="selected"'; ?>>VI</option>
                                <option value="en" <?php if($lang == 'en') echo 'selected="selected"'; ?>>EN</option>
                            </select>
                        </div>
                    </div>
                    <div class="uk-flex uk-flex-between">
                        <div class="main-menu">
                        <?php if(is_array($categories) && count($categories) > 0) { ?>
                        <ul>
                            <li>
                                <a href="<?php echo DOMAIN; ?>home">
                                    <?php echo $this->App->t('home'); ?>
                                </a>
                            </li>
                            <?php $i=0; foreach($categories as $v) { $i++; ?>
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
                            <li>
                                <a href="<?php echo $link; ?>" title="">
                                    <?php echo $this->App->t('title', $v['Node']); ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li>
                                <a href="<?php echo DOMAIN; ?>contact" title="">
                                    <?php echo $this->App->t('contact'); ?>
                                </a>
                                <?php echo $this->App->adm_link('lang', 'contact'); ?>
                            </li>
                        </ul>
                        <?php } ?>
                        </div>
                        <div class="h-cart-s uk-margin-large-left">
                            <a href="<?php echo $cart_number > 0 ? DOMAIN . 'cart/list' : '#'; ?>" title="Giỏ hàng" class="uk-display-inline-block uk-position-relative uk-margin-right">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?php echo $cart_number; ?></span>
                            </a>
                            <a href="#" title="<?php echo $this->App->t('search'); ?>">
                                <i class="fa fa-search"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="header-mobile">
            <div class="line-mb-logo uk-flex uk-flex-middle uk-flex-between">
                <div class="logo">
                    <a href="<?php echo DOMAIN; ?>home">
                        <img src="<?php echo DOMAIN . $this->App->t('logo', '', 'vi'); ?>" />
                    </a>
                </div>
                <div class="logo-fixed">
                    <a href="<?php echo DOMAIN; ?>home">
                        <img src="<?php echo DOMAIN . $this->App->t('logo-fixed', '', 'vi'); ?>" />
                    </a>
                </div>
                <form action="<?php echo DOMAIN; ?>search" method="get" class="search-mobile uk-margin-small-left">
                    <div class="uk-inline">
                        <button type="submit" class="uk-form-icon uk-form-icon-flip" href="" uk-icon="icon: search"></button>
                        <input class="uk-input" type="text" name="key" required>
                    </div>
                </form>
                <div class="h-cart-s uk-margin-small-left">
                    <a href="<?php echo $cart_number > 0 ? DOMAIN . 'cart/list' : '#'; ?>" title="Giỏ hàng" class="uk-display-inline-block uk-position-relative uk-margin-right">
                        <i class="fa fa-shopping-cart"></i>
                        <span><?php echo $cart_number; ?></span>
                    </a>
                </div>
                <button id="offcanvas" class="uk-button" type="button" uk-toggle="target: #offcanvas-nav">
                    <span class="uk-margin-small-right uk-icon" uk-icon="menu"></span>
                </button>
            </div>
            <div class="line-mb-rgt">
                <div class="uk-flex uk-flex-between uk-flex-middle">
                    <div class="phone uk-margin-small-right uk-flex uk-flex-middle uk-animation-toggle" tabindex="0">
                        <i class="fa fa-phone uk-animation-shake"></i>
                        <a href="tel:<?php echo $hotline_number; ?>" title="">
                            <?php echo $hotline; ?>
                        </a>
                    </div>
                    <div class="uk-flex">
                        <div class="regit uk-margin-small-right">
                            <img src="images/lock1.png" alt="">
                            <a href="#" title="" class="dn"><?php echo $this->App->t('log'); ?></a>
                            <img src="images/user1.png" alt="">
                            <a href="#" title=""><?php echo $this->App->t('reg'); ?></a>
                        </div>
                        <select name="" id="select-lang">
                            <option value="vi" <?php if($lang == 'vi') echo 'selected="selected"'; ?>>VI</option>
                            <option value="en" <?php if($lang == 'en') echo 'selected="selected"'; ?>>EN</option>
                        </select>
                    </div>
                </div>
            </div>
            <div id="offcanvas-nav" uk-offcanvas="overlay: true">
                <div class="uk-offcanvas-bar">
                    <ul class="uk-nav uk-nav-default">
                        <li>
                            <a href="<?php echo DOMAIN; ?>home">
                                <?php echo $this->App->t('home'); ?>
                            </a>
                        </li>
                        <?php $i=0; foreach($categories as $v) { $i++; ?>
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
                        <li class="<?php echo $v['Category']['id'] == $current_category['Category']['id'] ? 'uk-active' : ''; ?>">
                            <a href="<?php echo $link; ?>" title="">
                                <?php echo $this->App->t('title', $v['Node']); ?>
                            </a>
                        </li>
                        <?php } ?>
                        <li>
                            <a href="<?php echo DOMAIN; ?>contact" title="">
                                <?php echo $this->App->t('contact'); ?>
                            </a>
                            <?php echo $this->App->adm_link('lang', 'contact'); ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </header>

    <script type="text/javascript">
    $('#select-lang').change(function() {
        var v = $(this).val();
        document.location.href = "<?php echo DOMAIN; ?>?lang=" + v;
    });
    </script>