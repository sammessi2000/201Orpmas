<?php $bread_array = $this->App->breadarray($current_category); ?>

<div class="page-intro">
    <div class="line-breacrumb hidden-xs">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <?php foreach ($bread_array as $v) { ?>
                <?php if (empty($v['title'])) {     ?>
                <li class="breadcrumb-item"><a href="<?php echo DOMAIN; ?>"><?php echo 'Trang chủ'; ?></a>
                </li>
                <?php } else {     ?>
                <li class="breadcrumb-item"><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a>
                </li>
                <?php }     ?>
                <?php } ?>
            </ol>
        </nav>
    </div>
    <div class="page-banner">
        <?php if(isset($this->data['Category']['image'])) { ?>
        <div class="page-tuyendung-banner"
            style="background-image: url('<?php echo $this->data['Category']['image']; ?>')">
            <div class="wrap-bannerdes">
                <div class="banner-des"><?php echo $this->data['Category']['seo_title']; ?></div>
            </div>
        </div>
        <?php } ?>
    </div>

    <div class="wrap-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title">
                        <span><?php echo $this->data['Category']['page_title']; ?></span>
                        <span><?php echo $this->App->t('company_name'); ?></span>
                    </div>
                    <div class="page-content">
                        <?php echo $this->data['Category']['content']; ?>
                    </div>
                    <div class="page-teams">
                        <span class="teams-title">
                            <?php echo $this->App->t_a('general_text_1'); ?>
                        </span>
                        <div class="teams-wrap">
                            <?php if(isset($banners['teams'])) { ?>
                            <?php foreach($banners['teams'] as $v) { ?>
                            <div class="teams-section">
                                <div class="team-img-wrap">
                                    <img src="<?php echo $this->App->img_src($v['Banner']['image'], 350, 350); ?>"
                                        alt="">
                                </div>
                                <div class="team-content">
                                    <span>
                                        <?php echo $v['Banner']['title']; ?>
                                    </span>
                                    <span>
                                        <?php echo $v['Banner']['description']; ?>
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

</div>