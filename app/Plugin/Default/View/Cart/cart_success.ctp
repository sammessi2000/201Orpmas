<?php $bread_array = $this->App->breadarray($current_category); ?>
<?php
    // pr($current_category);
?>

<div class="archive" id="breadcrumb">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12 col-xs-12">
                 <div class="block-breadcrumb-mb">
                    <ol  itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="<?php echo DOMAIN; ?>">
                                <span itemprop="name">Trang chủ</span>
                            </a> 
                            <i class="fa fa-angle-right"></i>
                            <meta itemprop="position" content="1">
                        </li>

                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="Tài khoản">
                                <span itemprop="name">Đăng ký</span>
                            </a> 
                            <i class="fa fa-angle-right"></i>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main archive">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
                <div class="home-news-title hr-red">
                    <span>Đăng ký tài khoản</span>
                </div>

                <div class="dktcong">
                	<?php echo $this->App->t_a('cart-success', 'editor'); ?>
                </div>
            </div>
        	</div>
        </div>
    </div>
