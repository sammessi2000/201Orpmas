
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
                                <span itemprop="name">Đăng nhập</span>
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
    <div class="wrap-form">
        <div class="row">
            <div class="col-sm-12">    
            <div id="modal-login">
                <div class="logo2">
                    <img src="<?php echo DOMAIN; ?>theme/default/img/logo2.svg" alt="" />
                </div>
                <form action="<?php echo DOMAIN; ?>login" method="post" autocomplete="off" class="frmlogin">
                    <div class="input-text input-text-user">
                        <span></span>
                        <input type="text" name="username" required="required" placeholder="Tên đăng nhập" readonly onfocus="this.removeAttribute('readonly');" />
                    </div>
                    <div class="input-text">
                        <span></span>
                        <input type="password" name="password" required="required" placeholder="Mật khẩu" readonly onfocus="this.removeAttribute('readonly');" />
                    </div>

                    <input type="submit" name="submit" value="Đăng nhập" />
                </form>

                <div class="navi">
                    <div class="reg">
                        <a href="<?php echo DOMAIN; ?>register">
                            Đăng ký tài khoản
                            <!-- <span></span> -->
                        </a>
                    </div>
                </div>
            
            </div>
            </div>
        </div>
    </div>
</div>