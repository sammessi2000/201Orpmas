<script type="text/javascript" src="https://dev.vncdata.com/vawe/js/ckeditor/ckeditor.js"></script>

<div class="main single">
    <div class="wrap">
        <div class="row">
            <div class="col-sm-12">
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
                            <a itemprop="item" href="Tài khoản">
                                <span itemprop="name">Tài khoản</span>
                            </a> 
                            <i class="fa fa-angle-right"></i>
                            <meta itemprop="position" content="2">
                        </li>
                    </ol>
                </div>
            </div>

            <div class="col-sm-9">
                <div class="home-news-title hr-red">
                    <span>Thêm Sản phẩm</span>
                </div>

                    

                    <div class="content">
                        <form action="" method="post">
                            <div class="add-item">
                                <div class="add-item-label">Tên sản phẩm </div>
                                <div class="add-item-body">
                                    <input type="text" name="data[title]" required="required" />
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-label">Ảnh đại diện </div>
                                <div class="add-item-body">
                                    <input type="text" name="data[image]" id="userfile" required="required" style="max-width: 300px;" />
                                        <a onclick="javascript:window.open('<?php echo DOMAIN; ?>upload.php','userfile','width=600,height=300');window.history.go(1)" >
                                            <span class="btn btn-success">Chọn ảnh</span>
                                        </a>
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-label">Mô tả </div>
                                <div class="add-item-body">
                                    <textarea name="data[description]" required="required"></textarea>
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-body">
                                    <input type="submit" name="submit" value="Gửi sản phẩm" />
                                </div>
                            </div>
                        </form>
                    </div>
              

                    <div class="clearfix"></div>

                </div>
                <div class="col-sm-3"><?php echo View::element('sidebar-user'); ?></div>

            </div>
        </div>
    </div>
</div>
