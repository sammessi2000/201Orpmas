
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
                    <span>Link giới thiệu</span>
                </div>

                    
                    <div class="content">
                        <table class="table table-bordered">
                            <tr style="background: #ececec;">
                                <th width="40">STT</th>
                                <th width="140">Họ và tên</th>
                                <th width="140">Ngày đăng ký</th>
                                <th>Hoa hồng nhận được</th>
                                <th width="120">Trạng thái</th>
                            </tr>
                            <?php if(count($this->data) > 0) { ?>
                            <?php $i = 0; foreach($this->data as $v) { $i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <?php echo $v['Customer']['fullname']; ?>
                                </td>
                                <td>
                                    <?php echo date('d/m/Y', $v['Customer']['created']); ?>
                                </td>
                                <td>
                                    <?php 
                                        $txt = '';
                                        // if($v['UserPost']['status'] == 1)
                                        //     $txt = 'Đã duyệt';

                                        echo $txt;
                                    ?>
                                </td>
                                <td>
                                </td>
                            </tr>
                            <?php } ?>
                            <?php } else {  ?>
                            <?php } ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <a href="#" onclick="open_message('Link giới thiệu của bạn là', '<?php echo DOMAIN; ?>register?r=<?php echo $user['id']; ?>')">
                                        <b>Lấy link giới thiệu</b>
                                    </a>
                                </td>
                            </tr>
                        </table>
                    </div>
              

                    <div class="clearfix"></div>

                </div>
                <div class="col-sm-3"><?php echo View::element('sidebar-user'); ?></div>

            </div>
        </div>
    </div>
</div>
