
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
                                <span itemprop="name">Tài khoản</span>
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

<div class="main single">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-9">
                <div class="home-news-title hr-red">
                    <span>Thay đổi mật khẩu</span>
                </div>

                    

                    <div class="content">
                        <form action="" method="post">
                            <div class="add-item">
                                <div class="add-item-label">Mật khẩu mới</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[pass]" value="" required="required" />
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-label">Xác nhận mật khẩu mới</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[repass]" value="" required="required" />
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-body">
                                    <input type="submit" name="submit" value="Lưu thông tin" />
                                </div>
                            </div>
                        </form>
                    </div>
              

                    <div class="clearfix"></div>

                <div class="col-sm-3"><?php echo View::element('sidebar-user'); ?></div>
                </div>

            </div>
        </div>
    </div>
</div>
