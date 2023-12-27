<div id="body_content">
    <div class="page_path">
        <div id="breadcrumb" class="block-breadcrumb-mb">
            <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo DOMAIN; ?>">
                        <span itemprop="name">Trang chủ</span>
                    </a> 
                    <i class="fa fa-angle-right"></i>
                    <meta itemprop="position" content="1">
                </li>
                
                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                    <a itemprop="item" href="<?php echo DOMAIN; ?>/cart/list">
                        <span itemprop="name">Cảm ơn</span>
                    </a> 
                    <meta itemprop="position" content="2">
                </li>
            </ol>
        </div>
    </div>

    <div class="clear"></div>
    
    <div style="margin-bottom: 50px; font-weight: bold; text-align: center; line-height: 24px;">
        <p><?php echo $this->App->t_a('cart-success', 'editor'); ?></p>
    </div>
</div>