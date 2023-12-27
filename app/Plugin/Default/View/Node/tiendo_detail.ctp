<style type="text/css">
    .body .mc-cycle {position: absolute; z-index: -1;}
    #maximage-wrap {overflow: visible; }
    .page-content {position: relative;}
</style>

<div class="container-fluid">
    <div class="row">
        <div id="maximage-wrap">
            <div class="maximage" id="maximage">
                <img src="<?php echo DOMAIN; ?>theme/default/img/news.jpg" />
            </div>

            <div class="container-fluid page-content">
                <div class="row">
                    <div class="wrap">
                        <div class="page-news page-tiendo">
                            <div class="page-tab-content">
                                <div class="page-news-tab">

                                <div class="col-sm-3 list-tien-do">
                                <div class="list-tiendo-title">
                                    Tiến độ dự án
                                </div>
                                <ul>
                                    <li class="last-tiendo">Tiếp tục cập nhật</li>
                                    <?php $data = $this->requestAction(DOMAIN . 'default/node/get_nodes/' . $this->data['CategoryLinked']['category_id'] . '/tiendo/1000'); ?>
                                    <?php $j=0; foreach($data as $v) { $j++; ?>
                                    <li>
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="dated <?php if($v['Node']['id'] == $this->data['Node']['id']) echo 'active'; ?>">
                                            <?php echo date('d/m/Y', $v['Node']['created']); ?>
                                        </a>
                                        <div class="clearfix"></div>
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                                            <?php echo $this->App->t('title', $v['Node']); ?>
                                        </a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                </div>

                                <div class="col-sm-9 tiendo-content">
                                    <h1><?php echo $this->App->t('title', $this->data['Node']); ?></h1>

                                    <?php echo $this->App->adm_link('tiendo', $this->data['Node']['id']); ?>

                                    <div class="news-info">
                                        <div class="date col-sm-6 np"><?php echo date('d/m/Y h:i', $this->data['Node']['created']); ?></div>
                                        <div class="social col-sm-6 np">
                                               <div class="fb-like" data-href="<?php echo DOMAIN . $this->data['Node']['slug']; ?>.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                                                <div class="g-plusone" data-size="medium"></div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="news-detail-content">
                                        <?php echo $this->App->t('content', $this->data['Tiendo']); ?>
                                    </div>
                                </div>
                                                
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>