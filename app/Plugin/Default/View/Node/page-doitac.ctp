<?php echo View::element('header-child'); ?>


<?php $bread_array = $this->App->breadarray($current_category); ?>
<!-- page danh muc sp -->
<div class="page-catalogue">
    <section class="banner-dmsp">
        <div class="bg-banner-dm" data-src="images/dmsp/banner-dm.jpg" data-sizes="" uk-img=""></div>
    </section>
    <section>
        <div class="uk-container uk-container-center">
            <div class="breadcrumb">
                <ul class="uk-breadcrumb">
                    <?php foreach($bread_array as $v) { ?>
                    <li><a href="<?php echo $v['link']; ?>"><?php echo $v['title']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            <div class="index-dmsp uk-margin-medium-top">
                <div uk-grid>
                    <div class="uk-width-1-4@m">
                        <div class="sidebar-left"><?php echo View::element('sidebar'); ?></div>
                    </div>
                    <div class="uk-width-3-4@m">
                        <div class="line-title-dmsp uk-flex uk-flex-between">
                            <h1 class="uk-text-uppercase"><?php echo $this->data['Category']['page_title']; ?><?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?></h1>
                        </div>
                        <div class="uk-grid">
                            <?php if(isset($banners['partner'])) { ?>
                                <?php foreach($banners['partner'] as $v) { ?>
                                <div class="uk-width-1-2 uk-width-1-3@m doitac-item">
                                    <li>
                                        <figure>
                                            <a href="<?php echo $v['Banner']['link']; ?>" title="">
                                                <img src="<?php echo DOMAIN . $v['Banner']['image']; ?>" alt=""   />
                                            </a>
                                            <a href="<?php echo $v['Banner']['link']; ?>" class="overlay" title=""></a>
                                        </figure>
                                    </li>
                                </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end page danh muc sp -->
<?php echo View::element('footer-child'); ?>
