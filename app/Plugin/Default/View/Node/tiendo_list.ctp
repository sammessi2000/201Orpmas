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
                                    <?php $j=0; foreach($this->data as $v) { $j++; ?>
                                    <li>
                                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="dated <?php if($j==1) echo 'active'; ?>">
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
                                    <?php $tiendo = $this->data['0'];  ?>
                                    <h1><?php echo $this->App->t('title', $tiendo['Node']); ?></h1>

                                    <?php echo $this->App->adm_link('tiendo', $tiendo['Node']['id']); ?>

                                    <div class="news-info">
                                        <div class="date col-sm-6 np"><?php echo date('d/m/Y h:i', $tiendo['Node']['created']); ?></div>
                                        <div class="social col-sm-6 np">
                                               <div class="fb-like" data-href="<?php //echo DOMAIN . $this->data['Node']['slug']; ?>.html" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
                                                <div class="g-plusone" data-size="medium"></div>
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>

                                    <div class="news-detail-content">
                                        <?php echo $this->App->t('content', $tiendo['Tiendo']); ?>
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

<?php /*
<div class="wrap-news">
    <div class="main">
        <div class="page-title">
            <h1><?php echo $current_category['Node']['title']; ?></h1>
        </div>

        <?php $i=0; foreach($this->data as $v) { $i++; ?>
            <div class="news-list-item">
                <div class="col-sm-5 news-item-thumb">
                    <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html" class="thumb">
                        <?php echo $this->App->img($v['Tiendo']['image'], $v['Node']['title'], 640, 385); ?>
                    </a>
                </div>
                <div class="col-sm-7 news-item-des">
                    <h2>
                        <a href="<?php echo DOMAIN . $v['Node']['slug']; ?>.html">
                            <?php echo $this->App->t('title', $v['Node']); ?>
                        </a>
                    </h2>
                    <p><?php echo $this->App->word_limiter($this->App->t('description', $v['Tiendo']), 32); ?></p>
                </div>
            </div>
        <?php } ?>

        <div class="clearfix"></div>

        <div class="pagination">
            <?php
                $pages = $this->Paginator->numbers(array('separator'=>' '));
                $pages = str_replace('default/node/index/', '', $pages);
                $pages = str_replace('/.html', '.html', $pages);
                echo $pages;
            ?>
        </div>
    </div>
</div>
*/ ?>