<?php
$breadcrum = $this->App->breadarray($current_category);
?>
<div class="container-fluid banner">
    <div class="row">
        <!-- <div class="wrap-1092"> -->
        <div class="wrap-1260">
            <div class="col-sm-12">
                <div class="bread">
                    <?php $i=0; $n=count($breadcrum); foreach($breadcrum as $v) : $i++; ?>
                        <a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a> 
                        <?php if($i<$n) echo '&raquo;'; ?>
                    <?php endforeach; ?>
                </div>
                <div class="page-title"><?php echo $current_category['Node']['title']; ?></div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid collect-archive page-archive">
    <div class="row">
        <!-- <div class="wrap-1200"> -->
        <div class="wrap-1260">
            <div class="col-sm-12">
            <div class="collect-wrap">
                <?php 
                    $images = explode(',', $this->data['Collection']['images']); 
                    $first_img = '';
                    if(isset($images[0])) $first_img = $images[0];
                ?>



                <div class="collect-title"><h1><?php echo $this->data['Node']['title']; ?><?php echo $this->App->adm_link('collection', $this->data['Node']['id']); ?></h1></div>
                <div class="collect-time"><?php echo date('d/m/Y', $this->data['Node']['created']); ?></div>

                <div class="collect-info">
                    <div class="collect-info-title"><?php echo $this->data['Node']['title']; ?></div>
                    <div class="collect-info-tbl">
                        <div class="col-sm-6">
                            <div class="collect-info-item">
                                <span>Chủ đầu tư: </span> <?php echo $this->data['Collection']['chudautu']; ?>
                            </div>
                            <div class="collect-info-item">
                                <span>Loại hình: </span> <?php echo $this->data['Collection']['loaihinh']; ?>
                            </div>
                            <div class="collect-info-item">
                                <span>Mặt tiền: </span> <?php echo $this->data['Collection']['mattien']; ?>
                            </div>
                            <div class="collect-info-item">
                                <span>Công năng: </span> <?php echo $this->data['Collection']['congnang']; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="collect-info-item">
                                <span>Đơn vị thiết kế: </span> <?php echo $this->data['Collection']['donvitk']; ?>
                            </div>
                            <div class="collect-info-item">
                                <span>Năm thực hiện: </span> <?php echo $this->data['Collection']['namthuchien']; ?>
                            </div>
                            <div class="collect-info-item">
                                <span>Địa chỉ: </span> <?php echo $this->data['Collection']['diachi']; ?>
                            </div>
                            <div class="collect-info-item">
                                <span>Số tầng: </span> <?php echo $this->data['Collection']['sotang']; ?>
                            </div>
                            <div class="collect-info-item">
                                <span>Diện tích: </span> <?php echo $this->data['Collection']['dientich']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="collect-info-images">
                        <?php foreach($images as $v) : ?>
                            <a href="<?php echo $v; ?>" class="fancybox" rel="fancy">
                                <?php echo $this->App->img($v, '', 200, 140); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="collect-content">
                    <?php echo $this->data['Collection']['content']; ?>
                </div>
                
                <div class="news-single-share">
                    <div class="fb-like" data-href="<?php echo DOMAIN . $this->data['Node']['slug']; ?>.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                    <div class="g-plusone" data-size="medium"></div>
                </div>

                <div class="collect-related">
                    <div class="collect-related-title">Các bài viết liên quan</div>
                    <div class="collect-related-content">
                        <?php foreach($this->data['related'] as $v) { ?>    
                        <div class="collect-related-item">
                            <div class="collect-related-item-content">
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                                    <?php echo $this->App->img($v['Collection']['image'], '', 200, 140); ?>
                                </a>
                                <div class="clearfix"></div>
                                <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" title="<?php echo $v['Node']['title']; ?>">
                                    <?php echo $v['Node']['title']; ?>
                                </a>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>

            </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    $('.fancybox').fancybox();
</script>