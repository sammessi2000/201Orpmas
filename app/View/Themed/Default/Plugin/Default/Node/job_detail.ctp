<?php $job = $this->requestAction('/default/node/get_jobs/', array('category_data' => $current_category));?>
<?php //pr($this->data); ?>
<?php //pr($job); ?>


<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <li class="breadcrumb-item"><a>Tuyển dụng</a>
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
    <?php echo $this->App->adm_link('lang','general_text_14','image'); ?>
    <div class="page-tuyendung">
        <div class="page-tuyendung-banner"
            style="background-image: url('<?php echo DOMAIN . $this->App->t('general_text_14'); ?>')">
            <div class="wrap-bannerdes">
                <div class="banner-des"><?php echo $this->App->t_a('general_text_15'); ?></div>
            </div>
        </div>

        <div class="wrap">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="page-title">
                            <span><?php echo $this->App->t_a('general_text_13'); ?></span>
                            <span><?php echo $this->App->t_a('general_text_12'); ?></span>
                        </div>
                        <div class="tuyendung-content">
                            <div class="tuyendung-title">
                                <span><?php echo $this->data['Job']['title']; ?></span>
                                <div class="showmore hidden-xs">
                                    <a href="mailto:<?php echo $this->App->t('company_email') ?>">
                                        Nộp đơn
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="tuyendung-des">
                            <?php $required = $this->data['Job']['yeucau'];
                        if ($required != '' && $this->App->is_valid_json($required)) {
                                $required = json_decode($required);
                        }
                        echo '<span class="tuyendung-info-title">Mô tả công việc</span>';
                        echo '<span>' . $this->App->t_a('general_text_17') . '</span>';
                        //pr($required);
                        foreach ($required as $val) {
                            if (isset($val->ten) && isset($val->giatri)) {
                                echo '<ul class="listinfo-tuyendung"> <li>' . $val->giatri . '</ul> </li>' ;
                            }
                        }
                        ?>
                            <?php $required = $this->data['Job']['hoso'];
                        if ($required != '' && $this->App->is_valid_json($required)) {
                                $required = json_decode($required);
                        }
                        echo '<span class="tuyendung-info-title">Yêu cầu ứng viên</span>';
                        echo '<span>' . $this->App->t_a('general_text_18') . '</span>';
                        //pr($required);
                        foreach ($required as $val) {
                            if (isset($val->ten) && isset($val->giatri)) {
                                echo '<ul class="listinfo-tuyendung"> <li>' . $val->giatri . '</ul> </li>' ;
                            }
                        }
                        ?>
                            <?php $required = $this->data['Job']['thongtin'];
                        if ($required != '' && $this->App->is_valid_json($required)) {
                                $required = json_decode($required);
                        }
                        echo '<span class="tuyendung-info-title">Quyền lợi ứng viên</span>';
                        echo '<span>' . $this->App->t_a('general_text_19') . '</span>';
                        //pr($required);
                        foreach ($required as $val) {
                            if (isset($val->ten) && isset($val->giatri)) {
                                echo '<ul class="listinfo-tuyendung"> <li>' . $val->giatri . '</ul> </li>' ;
                            }
                        }
                        ?>
                        </div>
                        <div class="showmore nopdon-mb">
                            <a href="mailto:<?php echo $this->App->t('company_email') ?>">
                                Nộp đơn
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 scroll-box">
                        <?php $i = 0; ?>
                        <?php foreach($job as $v){ ?>
                        <?php if($this->data['Job']['id'] == $v['Job']['id']){ ?>
                        <div class="tuyendung-box active">
                            <span class="box-tuyendung-title">
                                <?php echo $v['Job']['title']; ?>
                            </span>
                            <div class="box-tuyendung-info">
                                <span class="tuyendung-location">
                                    <?php echo $v['Job']['noi_lam_viec']; ?>
                                </span>
                                <span class="tuyendung-time">
                                    <?php echo $this->App->getDateDiff($v['Job']['created'],1,1) . ' trước'; ?>
                                </span>
                                <span class="tuyendung-salary">
                                    <?php echo $v['Job']['luong']; ?>
                                </span>
                                <span class="tuyendung-type">
                                    <?php echo $v['Job']['loai_cong_viec']; ?>
                                </span>
                            </div>
                        </div>
                        <?php $i++; }else{ ?>
                        <div class="tuyendung-box">
                            <a href="<?php echo DOMAIN . '/job/' . $v['Job']['id'] . '.html' ?>">
                                <span class="box-tuyendung-title">
                                    <?php echo $v['Job']['title']; ?>
                                </span>
                            </a>
                            <div class="box-tuyendung-info">
                                <span class="tuyendung-location">
                                    <?php echo $v['Job']['noi_lam_viec']; ?>
                                </span>
                                <span class="tuyendung-time">
                                    <?php echo $this->App->getDateDiff($v['Job']['created'],1,1) . ' trước'; ?>
                                </span>
                                <span class="tuyendung-salary">
                                    <?php echo $v['Job']['luong']; ?>
                                </span>
                                <span class="tuyendung-type">
                                    <?php echo $v['Job']['loai_cong_viec']; ?>
                                </span>
                            </div>
                        </div>
                        <?php } ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>