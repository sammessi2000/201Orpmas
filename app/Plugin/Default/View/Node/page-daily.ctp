<?php 
    $mien = $this->requestAction('/default/node/get_mien');

    $gmien = isset($_GET['mien']) ? $_GET['mien'] : '';
    $gcity = isset($_GET['city']) ? $_GET['city'] : '';
    $gkey = isset($_GET['key']) ? $_GET['key'] : '';

    if($gmien != '')
        $city = $this->requestAction('/default/node/get_cities/' . $gmien);

    $data  = $this->requestAction('/default/node/get_agency/?mien=' . $gmien . '&city=' . $gcity . '&key='.$gkey);
?>

<?php echo View::element('header-child'); ?>


<?php $bread_array = $this->App->breadarray($current_category); ?>
<!-- page danh muc sp -->
<div class="page-catalogue">
    <section class="banner-dmsp">
            <?php echo View::element('banner-page'); ?>
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
                    <div class="uk-width-1-1">
                        <div class="line-title-dmsp uk-flex uk-flex-between">
                            <h1 class="uk-text-uppercase"><?php echo $this->data['Category']['page_title']; ?><?php echo $this->App->adm_link('category', $this->data['Node']['id']); ?></h1>
                        </div>
                        <div class="header-daily">
                            <div class="daily-header-lft">
                                <?php echo $this->App->t('htdly'); ?><?php echo $this->App->adm_link('lang', 'htdly'); ?>
                            </div>
                            <div class="daily-header">
                                <span class=""><?php echo $this->App->t('mien'); ?><?php echo $this->App->adm_link('lang', 'mien'); ?></span>
                                <select id="mien">
                                    <option value="">Tất cả</option>
                                    <?php foreach($mien as $k=>$v) { ?>
                                    <option value="<?php echo $k; ?>" <?php if($gmien == $k) echo 'selected'; ?>><?php echo $v; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="daily-header">
                                <span class=""><?php echo $this->App->t('thpho'); ?><?php echo $this->App->adm_link('lang', 'thpho'); ?></span>
                                <select id="city">
                                    <option value="">Tất cả</option>
                                    <?php foreach($city as $k=>$v) { ?>
                                    <option value="<?php echo $k; ?>" <?php if($gcity == $k) echo 'selected'; ?>><?php echo $v; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="uk-grid">
                            <?php if(isset($data['data']) && count($data['data']) > 0) { ?>
                            <?php $i=0; $odd = 0; foreach($data['data'] as $v) { $i++; $odd++; ?>
                            <div class="uk-width-1-2@m">
                                <div class="daily-item">
                                    <div class="daily-title"><?php echo $this->App->t('title', $v['Agency']); ?><?php echo $this->App->adm_link('agency', $v['Agency']['id']); ?></div>
                                    <div class="daily-phone"><?php echo $v['Agency']['hotline']; ?></div>
                                    <div class="daily-address">
                                    <?php echo $this->App->t('address', $v['Agency']); ?>
                                    </div>
                                    <div class="daily-map">
                                        <a href="<?php echo $v['Agency']['link']; ?>" target="_blank"><?php echo $this->App->t('readmap'); ?></a>
                                        <?php echo $this->App->adm_link('lang', 'readmap'); ?>
                                        <img src="<?php echo DOMAIN; ?>theme/default/images/map.png" />
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                            <?php } ?>

                        </div>

                        <div class="pagination cus-pagination">
                            <?php echo $data['pagination']; ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- end page danh muc sp -->

<?php echo View::element('footer-child'); ?>

<script type="text/javascript">
    $('#mien').change(function() {
        var v = $(this).val();
        var link = "<?php echo DOMAIN . $current_category['Node']['slug']; ?>.html?mien=" + v;

        document.location.href = link;
    });

    $('#city').change(function() {
        var mien = $('#mien').val();
        var city = $('#city').val();
        var link = "<?php echo DOMAIN . $current_category['Node']['slug']; ?>.html?mien=" + mien + '&city=' + city;

        document.location.href = link;
    });
</script>
