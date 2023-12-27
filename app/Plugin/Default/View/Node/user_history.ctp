
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
                    <span>Lịch sử thanh toán</span>
                </div>

                    
                    <?php /*
                    <div class="content">
                        <table class="table table-bordered">
                            <tr style="background: #ececec;">
                                <th width="40">STT</th>
                                <th width="140">Ảnh đại diện</th>
                                <th>Tiêu đề</th>
                                <th width="120">Trạng thái</th>
                                <!-- <th width="40">Xóa</th> -->
                            </tr>
                            <?php if(count($this->data) > 0) { ?>
                            <?php $i = 0; foreach($this->data as $v) { $i++; ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <?php echo $this->App->img($v['UserPost']['image'], '', 0, 60); ?>
                                </td>
                                <td>
                                    <?php echo $v['UserPost']['title']; ?>
                                </td>
                                <td>
                                    <?php 
                                        $txt = 'Chờ duyệt';
                                        if($v['UserPost']['status'] == 1)
                                            $txt = 'Đã duyệt';

                                        echo $txt;
                                    ?>
                                </td>
                           <!--      <td>
                                    <a href="">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td> -->
                            </tr>
                            <?php } ?>
                            <?php } else {  ?>
                            <tr>
                                <td colspan="5" class="text-center">
                                    <a href="<?php echo DOMAIN; ?>user/postadd">
                                        <b><?php echo $this->App->t_a('chiasenow'); ?></b>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>
                    </div>
                    */ ?>
              

                    <div class="clearfix"></div>

                </div>
                <div class="col-sm-3"><?php echo View::element('sidebar-user'); ?></div>

            </div>
        </div>
    </div>
</div>
