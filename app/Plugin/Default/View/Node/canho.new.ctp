<?php 
    $root_id = $this->requestAction(DOMAIN . 'default/node/find_root_category/' . $current_category['Category']['id']);
    $extra_data = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $root_id . '/document,page');
?>

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
                        <div class="page-canho">
                            <div class="page-tab-list">
                                <?php /*<ul>
                                    <?php if(isset($extra_data) && is_array($extra_data) && count($extra_data) > 0) { ?>
                                        <?php $i=0; $n=count($extra_data); foreach($extra_data as $v) { $i++; ?>
                                            <li class="col-sm-4 <?php 
                                                if($i == 1) 
                                                    echo 'active';
                                                if($i==$n)
                                                    echo ' last';
                                            ?>">
                                                <a href="#t<?php echo $v['Category']['id']; ?>"><?php echo $this->App->t('title', $v['Node']); ?></a>
                                                <?php echo $this->App->adm_link('category', $v['Node']['id']); ?>
                                            </li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>*/ ?>
                                <ul>
                                    <li class="col-sm-4 active">
                                        <a href="#t1">Khối căn hộ duplex</a>
                                    </li>
                                    <li class="col-sm-4">
                                        <a href="#t2">Khối căn hộ thường</a>
                                    </li>
                                    <li class="col-sm-4 last">
                                        <a href="#t3">Khối căn hộ penthouse</a>
                                    </li>
                                </ul>
                            </div>
                            
                            <div class="clearfix"></div>

                            <div class="page-tab-content">
                                <?php /*<div class="page-news-tab">
                                <div class="page-news-tab-canho">
                                    <?php $data = $this->requestAction(DOMAIN . 'default/node/get_child_category_of/' . $root_id); ?>
                                    <?php $i=0; foreach($data as $v) { $i++; ?>
                                        <div id="t<?php echo $v['Category']['id']; ?>" class="page-tab-item <?php if($i==1) echo 'active'; ?> text-center">
                                            <img src="<?php echo DOMAIN . $v['Category']['image']; ?>" alt="<?php echo $v['Node']['title']; ?>" />

                                            <div class="thg1"></div>
                                            <div class="thg2"></div>
                                            <div class="thg3"></div>
                                            <div class="thg4"></div>
                                            <div class="thg5"></div>
                                            <div class="thg6"></div>
                                            <div class="thg7"></div>
                                            <div class="thg8"></div>
                                            <div class="thg9"></div>
                                            <div class="thg10"></div>
                                            <div class="thg11"></div>
                                            <div class="thg12"></div>
                                            <div class="thg12a"></div>
                                        </div>
                                    <?php } ?>
                                </div>
                                </div>*/ ?>
                                <div class="page-news-tab">
                                    <div class="page-news-tab-canho">
                                        <div id="t1" class="page-tab-item text-center active">
                                            <img src="<?php echo DOMAIN; ?>theme/default/img/duplex.jpg" alt="Khối căn hộ duplex" />
                                            <div class="dup1" id="c1"><?php echo $this->App->adm_link('canho', '1'); ?></div>
                                            <div class="dup2" id="c2"><?php echo $this->App->adm_link('canho', '2'); ?></div>
                                            <div class="dup3" id="c3"><?php echo $this->App->adm_link('canho', '3'); ?></div>
                                            <div class="dup4" id="c4"><?php echo $this->App->adm_link('canho', '4'); ?></div>
                                            <div class="dup5" id="c5"><?php echo $this->App->adm_link('canho', '5'); ?></div>
                                            <div class="dup6" id="c6"><?php echo $this->App->adm_link('canho', '6'); ?></div>
                                        </div>
                                        <div id="t2" class="page-tab-item text-center">
                                            <img src="<?php echo DOMAIN; ?>theme/default/img/thuong.jpg" alt="Khối căn hộ thường" />

                                            <div class="thg1" id="c7"><?php echo $this->App->adm_link('canho', '7'); ?></div>
                                            <div class="thg2" id="c8"><?php echo $this->App->adm_link('canho', '8'); ?></div>
                                            <div class="thg3" id="c9"><?php echo $this->App->adm_link('canho', '9'); ?></div>
                                            <div class="thg4" id="c10"><?php echo $this->App->adm_link('canho', '10'); ?></div>
                                            <div class="thg5" id="c11"><?php echo $this->App->adm_link('canho', '11'); ?></div>
                                            <div class="thg6" id="c12"><?php echo $this->App->adm_link('canho', '12'); ?></div>
                                            <div class="thg7" id="c13"><?php echo $this->App->adm_link('canho', '13'); ?></div>
                                            <div class="thg8" id="c14"><?php echo $this->App->adm_link('canho', '14'); ?></div>
                                            <div class="thg9" id="c15"><?php echo $this->App->adm_link('canho', '15'); ?></div>
                                            <div class="thg10" id="c16"><?php echo $this->App->adm_link('canho', '16'); ?></div>
                                            <div class="thg11" id="c17"><?php echo $this->App->adm_link('canho', '17'); ?></div>
                                            <div class="thg12" id="c18"><?php echo $this->App->adm_link('canho', '18'); ?></div>
                                            <div class="thg12a" id="c19"><?php echo $this->App->adm_link('canho', '19'); ?></div>
                                        </div>
                                        <div id="t3" class="page-tab-item text-center">
                                            <img src="<?php echo DOMAIN; ?>theme/default/img/penthouse.jpg" alt="Khối penthouse" />

                                            <div class="thg1" id="c20"><?php echo $this->App->adm_link('canho', '20'); ?></div>
                                            <div class="thg2" id="c21"><?php echo $this->App->adm_link('canho', '21'); ?></div>
                                            <div class="thg3" id="c22"><?php echo $this->App->adm_link('canho', '22'); ?></div>
                                            <div class="thg4" id="c23"><?php echo $this->App->adm_link('canho', '23'); ?></div>
                                            <div class="thg5" id="c24"><?php echo $this->App->adm_link('canho', '24'); ?></div>
                                            <div class="thg6" id="c25"><?php echo $this->App->adm_link('canho', '25'); ?></div>
                                            <div class="thg7" id="c26"><?php echo $this->App->adm_link('canho', '26'); ?></div>
                                            <div class="thg8" id="c27"><?php echo $this->App->adm_link('canho', '27'); ?></div>
                                            <div class="thg9" id="c28"><?php echo $this->App->adm_link('canho', '28'); ?></div>
                                            <div class="thg10" id="c29"><?php echo $this->App->adm_link('canho', '29'); ?></div>
                                            <div class="thg11" id="c30"><?php echo $this->App->adm_link('canho', '30'); ?></div>
                                            <div class="thg12" id="c31"><?php echo $this->App->adm_link('canho', '31'); ?></div>
                                            <div class="thg12a" id="c32"><?php echo $this->App->adm_link('canho', '32'); ?></div>
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

<script type="text/javascript">
    var height = 0;

    $(document).ready(function() {
        setTimeout(function() {
            $('.page-tab-item').each(function() {
                var h = $(this).height();
                if(h>height)
                    height = h;
            });

            $('.page-tab-item').css('height', height);
        }, 300);
    });

    $('.page-tab-list a').click(function() {
        var id = $(this).attr('href');
        $('.page-tab-list li').removeClass('active');
        $(this).parent().addClass('active');
        $('.page-tab-item').removeClass('active');
        $(id).addClass('active');

        return false;
    });
</script>