

    <footer>
        <div class="uk-container uk-container-center">
            <div class="uk-grid-medium" uk-grid>
                <div class="uk-width-2-5@m">
                    <div class="ft-info">
                        <p>
                            <a href="<?php echo DOMAIN; ?>home">
                                <img src="<?php echo DOMAIN . $this->App->t('logo', '', 'vi'); ?>" />
                            </a>
                        </p>
                        <h2 class="uk-text-uppercase white">
                            <?php echo $this->App->t('company_name'); ?><?php echo $this->App->adm_link('lang', 'company_name'); ?>
                        </h2>
                        <p>
                            <b>HÀ NỘI:</b><br>
                            <?php echo nl2br($this->App->t('company_address1')); ?>
                            <?php echo $this->App->adm_link('lang', 'company_address1'); ?>
                        </p>
                        <p>
                            <b>HỒ CHÍ MINH:</b><br>
                            <?php echo nl2br($this->App->t('company_address2')); ?>
                            <?php echo $this->App->adm_link('lang', 'company_address2'); ?>
                        </p>
                    </div>
                </div>
                <div class="uk-width-3-5@m">
                    <div class="hide-mb uk-grid-medium" uk-grid>
                        <div class="uk-width-1-3@m">
                            <div class="ft-menu">
                                <div class="title uk-text-uppercase uk-margin-bottom">
                                    <a href="#" title="">
                                        <?php echo $this->App->t('footer-1'); ?>
                                        <?php echo $this->App->adm_link('lang', 'footer-1'); ?>
                                    </a>
                                </div>
                                <ul>
                                    <?php $i=0; foreach($categories_footer_1 as $v) { $i++; ?>
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
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-3@m">
                            <div class="ft-menu">
                                <div class="title uk-text-uppercase uk-margin-bottom">
                                    <a href="#" title="">
                                        <?php echo $this->App->t('footer-2'); ?>
                                        <?php echo $this->App->adm_link('lang', 'footer-2'); ?>
                                    </a>
                                </div>
                                <ul>
                                    <?php $i=0; foreach($categories_footer_2 as $v) { $i++; ?>
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
                                </ul>
                            </div>
                        </div>
                        <div class="uk-width-1-3@m">
                            <div class="ft-menu">
                                <div class="title uk-text-uppercase uk-margin-bottom">
                                    <a href="#" title="">
                                        <?php echo $this->App->t('footer-3'); ?>
                                        <?php echo $this->App->adm_link('lang', 'footer-3'); ?>
                                    </a>
                                </div>
                                <ul>
                                    <?php $i=0; foreach($categories_footer_3 as $v) { $i++; ?>
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
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="email-promo uk-flex uk-flex-right">
                        <form action="#" method="post">
                            <input type="email" name="email" value="" class="uk-input" placeholder="<?php echo $this->App->t('email-reg'); ?>" />
                            <button type="submit" name="submit" class="uk-button" /><?php echo $this->App->t('reg'); ?></button>
                            <?php echo $this->App->adm_link('lang', 'email-reg'); ?>
                            <?php echo $this->App->adm_link('lang', 'reg'); ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="end-ft">
            <div class="uk-container uk-container-center">
                <div class="uk-flex uk-flex-middle">
                    <div class="white uk-text-uppercase">
                        Copyright 2019 <a href="/" title="">Mofit</a>. All Rights Reserved
                    </div>
                    <div class="ft-social uk-margin-large-left white">
                        FOLLOW US
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
        </div>
    </footer>



    <script type="text/javascript">
        $(document).ready(function () {
            size_li = $("#home-cat-pro .list-home-pro .w-1-4").size();
            x=8;
            if(x >= size_li){
                $('#loadMore').css('display','none');
            }else{
                $('#home-cat-pro .list-home-pro .w-1-4:lt('+x+')').show();
                $('#loadMore span').click(function () {
                    x= (x+4 <= size_li) ? x+4 : size_li;
                    $('#home-cat-pro .list-home-pro .w-1-4:lt('+x+')').fadeIn('slow/400/fast', function() {});
                    if(x >= size_li){
                        $('#loadMore').css('display','none');
                    }
                });
            }
        });
    </script>