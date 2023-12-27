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
                    <span>Thông tin kết nối</span>
                </div>

                    

                    <div class="content">
                        <form action="" method="post">
                            <div class="add-item">
                                <div class="add-item-label">Tên Doanh nghiệp</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[fullname]" value="<?php echo $user['fullname']; ?>" required="required" />
                                </div>
                            </div>

                            <?php
                                $hangs = $this->requestAction('/default/node/get_hangs');
                            ?>
                            <div class="add-item">
                                <div class="add-item-label">LĨnh vực hoạt động </div>
                                <div class="add-item-body" required="required">
                                    <select name="data[hid]">
                                        <option value="">--- Chọn mục lục ---</option>
                                        <?php foreach($hangs as $k=>$v) { ?>
                                        <?php 
                                            $s = '';
                                            if($user['hang_id'] == $k) 
                                            {
                                                $s = 'selected="selected"'; 
                                            }

                                        ?>
                                        <option value="<?php echo $k; ?>" <?php echo $s; ?>><?php echo $v; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- <div class="add-item">
                                <div class="add-item-label">Mô tả</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[des]" value="<?php //echo $user['des']; ?>" required="required" />
                                </div>
                            </div> -->

                            <div class="add-item">
                                <div class="add-item-label">Địa chỉ</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[address]" value="<?php echo $user['address']; ?>" required="required" />
                                </div>
                            </div>

                            <?php
                                $citis = $this->requestAction('/default/node/get_city_lst');
                            ?>
                            <div class="add-item">
                                <div class="add-item-label">Tỉnh </div>
                                <div class="add-item-body" required="required">
                                    <select name="data[city_id]">
                                        <option value="">--- Chọn mục lục ---</option>
                                        <?php foreach($citis as $k=>$v) { ?>
                                        <?php 
                                            $s = '';
                                            if($user['city_id'] == $k) 
                                            {
                                                $s = 'selected="selected"'; 
                                            }

                                        ?>
                                        <option value="<?php echo $k; ?>" <?php echo $s; ?>><?php echo $v; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-label">Điện thoại</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[phone]" value="<?php echo $user['phone']; ?>" required="required" />
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-label">Email</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[email]" value="<?php echo $user['email']; ?>" required="required" />
                                </div>
                            </div>

                            <div class="add-item">
                                <div class="add-item-label">Nghành nghề chính</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[nganhnghe]" value="<?php echo $user['nganhnghe']; ?>" required="required" />
                                </div>
                            </div>
                            <div class="add-item">
                                <div class="add-item-label">Loại hình Doanh nghiệp</div>
                                <div class="add-item-body">
                                    <input type="text" name="data[loaihinh]" value="<?php echo $user['loaihinh']; ?>" required="required" />
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

                </div>
                <div class="col-sm-3"><?php echo View::element('sidebar-user'); ?></div>

            </div>
        </div>
    </div>
</div>
